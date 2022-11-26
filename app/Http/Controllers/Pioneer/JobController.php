<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Applicant;
use App\User;
use App\Models\Notification;
use App\Models\Rating;
use App\Models\Dispute;
use App\Mail\Pioneer\AdminDispute;
use App\Mail\Pioneer\DestinationDispute;
use App\Mail\Pioneer\DestinationRating;
use App\Mail\Pioneer\ProposalSubmit;
use Illuminate\Support\Facades\Mail;
class JobController extends Controller
{
    public $path ='pioneer.modules.';

    /*public function apply_job(){        
        return view($this->path.'apply-job');
    }*/
       public function apply_job($id){
        $job = Job::where('_id',$id);        
        if($job->count()>0){
            $job= $job->first();
            if($job->pioneer_applicant_user!=null){
                return redirect()->back();
            }
            return view($this->path.'apply-job')->with('job',$job);
        }
        abort(404);
    }

    public function proposal_submit(Request $request,$id){
        $app_check = Applicant::where('job_id',$id)->where('submit_by',Auth::user()->_id);
        if($app_check->count() == 0){
        $j = Job::where('_id',$id)->first();
        $a = new Applicant();
        $a->job_id = $id;
        $a->proposal = $request->proposal;
        $a->submit_by = Auth::user()->_id;
        $a->interested = 0;
        $a->proposal_to = $j->created_by;
        $a->save();

        $n = new Notification();
        $n->message = 'Proposal Send';
        $n->type = 'Proposal Send';
        $n->to = $j->created_by;
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->applicant_id = $a->_id;
        $n->save();  
        Mail::to($j->created_user->email)->send(new ProposalSubmit($j->created_user,$j));      


        return redirect()->route('pioneer.jobs')->with(['message' => 'Proposal submitted Successfully.', 'message_type' => 'success','notification' =>"send"]); 
    }else{
        return redirect()->route('pioneer.jobs')->with(['message' => 'Already Proposal Submitted.', 'message_type' => 'error',
    ]); 
    } 


    }

    public function proposal_jobs(Request $request){
        $job_id = Applicant::where('submit_by',Auth::user()->_id)->pluck('job_id')->toArray();
        $job = Job::whereIn('_id',$job_id)->where('hire_status',0)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.proposal-jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function proposal_closed_jobs(Request $request){
        $job_id = Applicant::where('submit_by',Auth::user()->_id)->pluck('job_id')->toArray();
        $job = Job::whereIn('_id',$job_id)->where('hire_status',1)->where('hire_person','!=',Auth::user()->_id)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.proposal-closed-jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function hire_job(Request $request){
        $job_id = Applicant::where('submit_by',Auth::user()->_id)->pluck('job_id')->toArray();
        
        $job = Job::whereIn('_id',$job_id)->where('hire_status',1)->where('hire_person',Auth::user()->_id)->where('close_job',0)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.hire-job')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function closed_job(Request $request){
        $job_id = Applicant::where('submit_by',Auth::user()->_id)->pluck('job_id')->toArray();
        $job = Job::whereIn('_id',$job_id)->where('hire_status',1)->where('hire_person',Auth::user()->_id)->where('close_job',1)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.closed-job')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function closed_job_detail($id){
        $job = Job::where('_id',$id)->where('hire_status',1)->where('hire_person',Auth::user()->_id);        
        if($job->count()>0){
            $job= $job->first();
            $rating_destination = Rating::where('job_id',$job->_id)->where('by',Auth::user()->_id)->first();
            $rating_pioneer = Rating::where('job_id',$job->_id)->where('by',$job->created_by)->first();
            $dispute_pioneer = Dispute::where('job_id',$job->_id)->where('by',Auth::user()->_id)->first();
            return view($this->path.'job.closed_job_detail')->with('job',$job)->with('rating_destination',$rating_destination)->with('rating_pioneer',$rating_pioneer)->with('dispute_pioneer',$dispute_pioneer);
        }
        abort(404);
    }

    public function proposal($job_id){
        $job = Job::where('_id',$job_id);        
        if($job->count()>0){
            $job= $job->first();
            return view($this->path.'job.proposal')->with('job',$job);
        }
        abort(404);
    }

    public function hire_job_detail($job_id){
       $job = Job::where('_id',$job_id)->where('hire_status',1)->where('close_job',0)->where('hire_person',Auth::user()->_id);        
        if($job->count()>0){
            $job= $job->first();
            
            return view($this->path.'job.hire_job_detail')->with('job',$job);
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
            $r->to = $job->created_by;
            $r->by = Auth::user()->_id;
            $r->save();

            $n = new Notification();
            $n->message = 'Rating';
            $n->type = 'Rating';
            $n->to = $job->created_by;
            $n->by = Auth::user()->_id;
            $n->job_id = $job->_id;
            $n->read_status = 0;
            $n->save();
            Mail::to($job->created_user->email)->send(new DestinationRating($job->created_user,$job));            
            return redirect()->route('pioneer.closed.job.detail',$id)->with(['message' => 'Rating Submitted Successfully.', 'message_type' => 'success']); 
        }else{
               return redirect()->route('pioneer.closed.job.detail',$id); 
        }
    }

    public function dispute_job($id,Request $request){
        $dis = Dispute::where('job_id',$id)->where('by',Auth::user()->_id);
        if($dis->count() ==0){
            $job = Job::where('_id',$id)->first();

            $d = new Dispute();
            $d->dispute = $request->dispute;
            $d->job_id = $id;
            $d->to = $job->created_by;
            $d->by= Auth::user()->_id;
            $d->save();    

            $n = new Notification();
            $n->message = 'Dispute Send';
            $n->type = 'Dispute';
            $n->to = $job->created_by;
            $n->by = Auth::user()->_id;
            $n->job_id = $job->_id;
            $n->read_status = 0;
            $n->save();  

            $n = new Notification();
            $n->message = 'Dispute Send';
            $n->type = 'Dispute';
            $n->to = admin()->_id;
            $n->by = Auth::user()->_id;
            $n->read_status = 0;
            $n->job_id = $job->_id;
            $n->save();  


            Mail::to(admin()->email)->send(new AdminDispute(admin(),$job));
            Mail::to($job->created_user->email)->send(new DestinationDispute($job->created_user,$job));

            return redirect()->route('pioneer.closed.job.detail',$id)->with(['message' => 'Dispute Raised Successfully.', 'message_type' => 'success','notification' =>"send"]); 
        }
        

    }
}    
 