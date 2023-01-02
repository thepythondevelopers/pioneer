<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Mail\Admin\AccountActivate;
use App\Mail\Admin\AccountDeactivate;
use App\Mail\Admin\AccountVerify;
use Illuminate\Support\Facades\Mail;
use App\Models\Job;
use App\Models\Notification;
use App\Models\Applicant;
use App\Models\Rating;
use App\Models\Dispute;
use Illuminate\Support\Str;
class PioneerController extends Controller
{
    public $path ='admin.modules.pioneer.';

    public function index(){        
        return view($this->path.'index');
    }

    public function list(Request $request)
    {   
        $limit = !empty($request->list) ? (int)$request->list : 10;

        $pioneer = User::where('role','pioneer')
        ->where(function($t) use($request){
            if(!empty($request->search)){
                $t->orWhere('first_name','LIKE','%'.$request->search.'%');
                $t->orWhere('last_name','LIKE','%'.$request->search.'%');
                $t->orWhere('email','LIKE','%'.$request->search.'%');
            }
        })->orderBy('created_at','desc');

        $vv = view($this->path.'list')
                ->with('pioneer',$pioneer->paginate($limit))
                ->with('list',$limit)
                ->with('count',$pioneer->count());
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function edit($id){
        $user = User::where('_id',$id)->first();
       
        return view($this->path.'edit')->with('user',$user);
    }
    
     public function update($id,Request $request){
       
        $logo_path = 'image_data/logo/pioneer/';
      


      $certificate_path = 'image_data/certificate/pioneer/';
      

      $user = User::where('_id',$id)->first();
       
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->mobile_number = (int)$request->mobile_number;

      $user->company = $request->company;
      $user->address1 = $request->address1;
        $user->address2 = $request->address2;
    $user->town_city = $request->town_city;
    $user->national_insurance_number = $request->national_insurance_number;
    $user->about_us = $request->about_us;
    $user->postcode = $request->postcode;
      
      if (!empty($request->logo)){
          (isset($user->logo) && $user->logo!='null') ? unlink(public_path($user->logo)) : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->logo->getClientOriginalExtension();
          $logo = $time.".".$ext;
          $request->logo->move(public_path('image_data/logo/pioneer'),$logo);
          $logo = $logo_path.$logo;
          
          $user->logo = $logo;
      }

      if (!empty($request->certificate1)){
          (isset($user->certificate1) && $user->certificate1!='null') ? unlink(public_path($user->certificate1)) : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate1->getClientOriginalExtension();
          $certificate1 = $time.".".$ext;
          $request->certificate1->move(public_path('image_data/certificate/pioneer'),$certificate1);
          $certificate1 = $certificate_path.$certificate1;

          $user->certificate1 = $certificate1;
      }

      if (!empty($request->certificate2)){
          (isset($user->certificate2) && $user->certificate2!='null') ? unlink(public_path($user->certificate2)) : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate2->getClientOriginalExtension();
          $certificate2 = $time.".".$ext;
          $request->certificate2->move(public_path('image_data/certificate/pioneer'),$certificate2);
          $certificate2 = $certificate_path.$certificate2;

          $user->certificate2 = $certificate2;
    }
    
    if (!empty($request->certificate3)){
          (isset($user->certificate3) && $user->certificate3!='null') ? unlink(public_path($user->certificate3)) : '';
         $time = strtotime('now').Str::random(40);
      $ext = $request->certificate3->getClientOriginalExtension();
      $certificate3 = $time.".".$ext;
      $request->certificate3->move(public_path('image_data/certificate/pioneer'),$certificate3);
      $certificate3 = $certificate_path.$certificate3;
        
      $user->certificate3 = $certificate3;
    }

    if (!empty($request->certificate4)){
        (isset($user->certificate4) && $user->certificate4!='null') ? unlink(public_path($user->certificate4)) : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate4->getClientOriginalExtension();
        $certificate4 = $time.".".$ext;
        $request->certificate4->move(public_path('image_data/certificate/pioneer'),$certificate4);
        $certificate4 = $certificate_path.$certificate4;

        $user->certificate4 = $certificate4;
    }

    // if (!empty($request->certificate5)){
    //     (isset($user->certificate5) && $user->certificate5!='null') ? unlink(public_path($user->certificate5)) : '';
    //     $time = strtotime('now').Str::random(40);
    //     $ext = $request->certificate5->getClientOriginalExtension();
    //     $certificate5 = $time.".".$ext;
    //     $request->certificate5->move(public_path('image_data/certificate/pioneer'),$certificate5);
    //     $certificate5 = $certificate_path.$certificate5;

    //     $user->certificate5 = $certificate5;
    // }  
        
      $user->save();
             return redirect()->route('admin.pioneer.index')->with(['message' => 'Record Updated Successfully.', 'message_type' => 'success']);
    }

    public function view($id){
        $user = User::where('_id',$id)->first();
        return view($this->path.'view')->with('user',$user);
    }

    public function status(Request $request){
        $user = User::where('_id',$request->id)->first();
        $user->status = (int)$request->status;
        $user->save();
        (int)$request->status == 1 ? Mail::to($user->email)->send(new AccountActivate($user->first_name,$user->last_name)) : Mail::to($user->email)->send(new AccountDeactivate($user->first_name,$user->last_name));
        return response()->json([
           'status' => 1,
           'message' => 'Status Change Successfully.'
        ]);
    }

       public function open_jobs($id,Request $request){
        
        $job_id = Applicant::where('submit_by',$id)->pluck('job_id')->toArray();
        $job = Job::whereIn('_id',$job_id)->where('hire_status',0)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);

        $vv = view($this->path.'job.open-jobs')->with('job',$job)->with('user_id',$id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function open_job_detail($job_id,$user_id){
        $job = Job::where('_id',$job_id);        
        if($job->count()>0){
            $job= $job->first();
            $applicant = Applicant::where('job_id',$job_id)->where('submit_by',$user_id)->first();
            return view($this->path.'job.detail.open-job-detail')->with('job',$job)->with('applicant',$applicant);
        }
        abort(404);
    }

    public function closed_proposal_jobs($user_id,Request $request){
        $job_id = Applicant::where('submit_by',$user_id)->pluck('job_id')->toArray();
        $job = Job::whereIn('_id',$job_id)->where('hire_status',1)->where('hire_person','!=',$user_id)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.proposal-closed-jobs')->with('job',$job)->with('user_id',$user_id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function closed_proposal_job_detail($job_id,$user_id){
        $job = Job::where('_id',$job_id);        
        if($job->count()>0){
            $job= $job->first();
            $applicant = Applicant::where('job_id',$job_id)->where('submit_by',$user_id)->first();
            return view($this->path.'job.detail.closed-proposal-job-detail')->with('job',$job)->with('applicant',$applicant);
        }
        abort(404);
    }

    public function pioneer_job($user_id){        
        return view($this->path.'job.jobs')->with('user_id',$user_id);
    }
    public function hire_job($id,Request $request){
        $job_id = Applicant::where('submit_by',$id)->pluck('job_id')->toArray();
        
        $job = Job::whereIn('_id',$job_id)->where('hire_status',1)->where('hire_person',$id)->where('close_job',0)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.hire-job')->with('job',$job)->with('user_id',$id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function hire_job_detail($job_id,$user_id){
        $job = Job::where('_id',$job_id)->where('hire_status',1)->where('close_job',0)->where('hire_person',$user_id);        
        if($job->count()>0){
            $job= $job->first();
            
            return view($this->path.'job.detail.hire_job_detail')->with('job',$job);
        }
        abort(404);
    }

    public function closed_job($id,Request $request){
        $job_id = Applicant::where('submit_by',$id)->pluck('job_id')->toArray();
        $job = Job::whereIn('_id',$job_id)->where('hire_status',1)->where('hire_person',$id)->where('close_job',1)->where(function($d) use($request){
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc')->paginate(10);
        
        $vv = view($this->path.'job.closed-job')->with('job',$job)->with('user_id',$id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function closed_job_detail($job_id,$user_id){
        $job = Job::where('_id',$job_id)->where('hire_status',1)->where('hire_person',$user_id);        
        if($job->count()>0){
            $job= $job->first();
            $rating_destination = Rating::where('job_id',$job_id)->where('by',$user_id)->first();
            $rating_pioneer = Rating::where('job_id',$job_id)->where('by',$job->created_by)->first();
            $dispute_pioneer = Dispute::where('job_id',$job_id)->where('by',$user_id)->first();
            return view($this->path.'job.detail.closed_job_detail')->with('job',$job)->with('rating_destination',$rating_destination)->with('rating_pioneer',$rating_pioneer)->with('dispute_pioneer',$dispute_pioneer);
        }
        abort(404);
    }

    public function verification(Request $request){
        if((int)$request->status==1){
        $user = User::where('_id',$request->id)->first();
        $user->admin_verification = (int)$request->status;
        $user->save();

        $n = new Notification();
        $n->type= 'Account Verified';
        $n->user = $user->_id;
        $n->to = $user->_id;
        $n->by = admin()->_id;
        $n->message = 'Account Verified';
        $n->read_status = 0;
        $n->save();

        Mail::to($user->email)->send(new AccountVerify($user->first_name,$user->last_name));
        return response()->json([
           'status' => 1,
           'message' => 'Account Verify Successfully.'
        ]);
    }
    }
}
