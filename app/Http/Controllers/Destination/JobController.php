<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Escrow;
use App\Models\Location;
use App\Models\Invoice;
use App\Models\Notification;
use App\Models\Rating;
use App\Models\Dispute;
use App\User;
use App\Mail\Destination\PioneerRating;
use App\Mail\Destination\JobClosed;
use App\Mail\Destination\ProposalAccepted;
use App\Mail\Destination\ProposalRejected;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public $path ='destination.modules.';

    public function create_job(){        
        $location = Location::get();
        return view($this->path.'create-job')->with('location',$location);
    }

    public function save_job(Request $request){
        
        $j = new Job();
        $j->title = $request->title;
        $j->job_type = $request->job_type;
        $j->description = $request->description;
        $j->address = $request->address;
        $j->start_date = $request->value_from_start_date;
        $j->end_date = $request->value_from_end_date;
        $j->location = $request->location;
        $j->hour_rate = $request->hour_rate;
        $j->shift_start_time = $request->shift_start_time;
        $j->shift_end_time = $request->shift_end_time;
        $j->duration = $request->duration;
        $j->person_name = $request->person_name;
        $j->contact_email = $request->contact_email;
        $j->contact_number = $request->contact_number;
        $j->hire_status = 0;
        $j->created_by = Auth::user()->_id;
        $j->close_job = 0;
        $j->save();
        /*$pioneer_id = User::where('role','pioneer')->pluck('_id')->toArray();
        if(!empty($pioneer_id)){
            foreach($pioneer_id as $key=>$p_id){
                $n = new Notification();
                $n->message = 'New Job Created';
                $n->type = 'Job Created';
                $n->to = $p_id;
                $n->by = Auth::user()->_id;
                $n->job_id = $j->_id;
                $n->read_status = 0;
                $n->save();        
            }
            
        }*/
        
        return redirect()->route('destination.home')->with(['message' => 'Job Created Successfully.', 'message_type' => 'success', 'job_emit'=>'success']);
    }

    public function open_job_detail($id){
        $job = Job::where('_id',$id)->where('created_by',Auth::user()->_id)->where('hire_status',0);        
        if($job->count()>0){
            $job= $job->first();
            return view($this->path.'job_detail.open_job_detail')->with('job',$job);
        }
        abort(404);
    }

    public function suspend_job($id){
        $job = Job::where('_id',$id)->where('created_by',Auth::user()->_id)->where('hire_status',0);        
        if($job->count()>0){
            $job= $job->first();
            $job->hire_status = 1;
            $job->hire_type = '';
            $job->hire_person = 0;
            $job->close_job =1;
            $job->save();
            return redirect()->route('destination.jobs')->with(['message' => 'Job Suspended Successfully.', 'message_type' => 'success']);
        }
        abort(404);
    }

    public function job_applicant($id){

        $applicant = Applicant::where('job_id',$id)->paginate(6);

        $vv = view($this->path.'job_detail.applicant')
                ->with('applicant',$applicant)
                ->with('job_id',$id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function initialize_chat(Request $request){
        $app = Applicant::where('job_id',$request->job_id)->where('submit_by',$request->applicant_id)->first();
        $app->interested = 1;
        $app->save();

        $job = Job::where('_id',$request->job_id)->first();
        $submit_user = User::where('_id',$app->submit_by)->first();
        $n = new Notification();
        $n->message = "New Message";
        $n->type = "Proposal Accepted";
        $n->to = $app->submit_by;
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->applicant_id = $app->_id;
        $n->job_id = $app->job_id;
        $n->save();

        Mail::to($submit_user->email)->send(new ProposalAccepted($submit_user,$job));

        return response()->json([
           'status' => 1,
           'route' => route('destination.chat.param',[$request->job_id,$request->applicant_id])
        ]);
        
    }


    public function reject_applicant(Request $request){

        $app = Applicant::where('job_id',$request->job_id)->where('submit_by',$request->applicant_id)->first();

        $app->interested = 2;
        $app->save();

        $job = Job::where('_id',$request->job_id)->first();
        $submit_user = User::where('_id',$app->submit_by)->first();
        $n = new Notification();
        $n->message = "New Message";
        $n->type = "Proposal Rejected";
        $n->to = $app->submit_by;
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->applicant_id = $app->_id;
        $n->job_id = $app->job_id;
        $n->save();

        Mail::to($submit_user->email)->send(new ProposalRejected($submit_user,$job));

        
        return redirect()->route('destination.proposal',[$request->job_id,$app->_id])->with(['message' => 'Application Rejected.', 'message_type' => 'success','notification' =>"send"]);
        
    }

    public function proposal($job_id,$applicant_id){
        $job = Job::where('_id',$job_id);        
        if($job->count()>0){
            $job= $job->first();
            $applicant = Applicant::where('_id',$applicant_id)->first();
            return view($this->path.'job.proposal')->with('job',$job)->with('applicant',$applicant);
        }
        abort(404);
    }

    public function jobs(){        
        return view($this->path.'job.jobs');
    }

    public function open_jobs(Request $request){
        $job = Job::where('close_job',0)->where('hire_status',0)->where('created_by',Auth::user()->_id)->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.open_jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function hire_jobs(Request $request){
        $job = Job::where('hire_status',1)->where('close_job',0)->where('created_by',Auth::user()->_id)->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.hire_jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    

    public function closed_jobs(Request $request){
        $job = Job::where('close_job',1)->where('created_by',Auth::user()->_id)->orderBy('created_at','desc')->paginate(10);
        $vv = view($this->path.'job.closed_jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    /*public function on_going_job_detail($id){
        $job = Job::where('_id',$id)->where('created_by',Auth::user()->_id)->where('close_job',0);        
        if($job->count()>0){
            $job= $job->first();
            return view($this->path.'on_going_job_detail')->with('j',$job);
        }
        abort(404);
    }*/

    public function hire_job_detail($id){
        $job = Job::where('_id',$id)->where('created_by',Auth::user()->_id)->where('close_job',0)->where('hire_status',1);        
        if($job->count()>0){
            $job= $job->first();
            return view($this->path.'job_detail.hire_job_detail')->with('j',$job);
        }
        abort(404);
    }

    public function job_close_status($id){
        $job = Job::where('_id',$id)->where('created_by',Auth::user()->_id);
        if($job->count()>0){
            $i = Invoice::where('job_id',$id)->where('paid',0);
            if($i->count()>0){
                return response()->json([
                   'status' => 2,
                   'message' => 'Invoice Are not Cleared Yet.'
                ]);      
            }
            $j=$job->first();
            $j->close_job = 1;
            $j->save();

            $n = new Notification();
            $n->message = 'Job Closed';
            $n->type = 'Job Closed';
            $n->to = $j->hire_person;
            $n->by = Auth::user()->_id;
            $n->job_id = $j->_id;
            $n->read_status = 0;
            $n->save();

            Mail::to($j->hire_user->email)->send(new JobClosed($j->hire_user,$j));

            return response()->json([
           'status' => 1,
           'message' => 'Job Closed',
           'url'=> route('destination.job.closed.detail',$id)
        ]); 
        }else{
           return response()->json([
           'status' => 2,
           'message' => 'Job Not Found'
        ]); 
        }
    }

    public function job_history(){        
        return view($this->path.'job_history');
    }

    public function closed_job_detail($id){
        $job = Job::where('_id',$id)->where('created_by',Auth::user()->_id)->where('close_job',1);        
        if($job->count()>0){
            $job= $job->first();
            
            $rating_pioneer = Rating::where('job_id',$id)->where('by',Auth::user()->_id)->first();
            $rating_destination = Rating::where('job_id',$id)->where('by',$job->hire_person)->first();
            $dispute_pioneer = Dispute::where('job_id',$job->_id)->where('by',$job->hire_person)->first();
            return view($this->path.'job_detail.closed_job_detail')->with('j',$job)->with('rating_pioneer',$rating_pioneer)->with('rating_destination',$rating_destination)->with('dispute_pioneer',$dispute_pioneer);
        }
        abort(404);
        
    }

    public function rating_pioneer_job($id,Request $request){

        $rating = Rating::where('job_id',$id)->where('by',Auth::user()->_id);
        $job = Job::where('_id',$id)->first();
        if($rating->count() ==0){
            $r = new Rating();
            $r->rating = $request->rating;
            $r->comment = $request->comment;
            $r->job_id = $id;
            $r->to = $job->hire_person;
            $r->by = Auth::user()->_id;
            $r->save();

            $n = new Notification();
            $n->message = 'Rating';
            $n->type = 'Rating';
            $n->to = $job->hire_person;
            $n->by = Auth::user()->_id;
            $n->job_id = $job->_id;
            $n->read_status = 0;
            $n->save();   
            Mail::to($job->hire_user->email)->send(new PioneerRating($job->hire_user,$job));
            return redirect()->route('destination.job.closed.detail',$id)->with(['message' => 'Rating Submitted Successfully.', 'message_type' => 'success','notification' =>"send"]); 
        }else{
              return redirect()->route('destination.job.closed.detail',$id); 
        }
    }

    public function job_spending_detail($id){
        $job = Job::where('_id',$id)->where('hire_status',1)->where('created_by',Auth::user()->_id);
        if($job->count()>0){
            $job= $job->first();
            $invoice = Invoice::where('job_id',$id);
            $escrow = Escrow::where('job_id',$id)->first();
            $amount_spent = Invoice::where('job_id',$id)->where('paid',1)->sum('total_amount');
            $amount_pending = Invoice::where('job_id',$id)->where('paid',0)->sum('total_amount');
            return view($this->path.'job_detail.job_spending_detail')->with('job',$job)->with('invoice',$invoice)->with('escrow',$escrow)->with('amount_spent',$amount_spent)->with('amount_pending',$amount_pending);
        }else{
            abort(404);
        }
    }

    public function applicant_profile($id){
        $user = User::where('_id',$id);
        if($user->count()>0){
            return view($this->path.'job.profile')->with('user',$user->first());
        }else{
            abort(404);
        }
    }

}    