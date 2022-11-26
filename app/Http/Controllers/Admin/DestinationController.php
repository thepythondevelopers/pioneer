<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Job;
use App\Models\Applicant;
use App\Models\Rating;
use App\Models\Dispute;
use App\Models\Notification;
use App\Mail\Admin\AccountActivate;
use App\Mail\Admin\AccountDeactivate;
use App\Mail\Admin\AccountVerify;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
class DestinationController extends Controller
{
    public $path ='admin.modules.destination.';

    public function index(){        
        return view($this->path.'index');
    }

    public function list(Request $request)
    {   
        $limit = !empty($request->list) ? (int)$request->list : 10;

        $destination = User::where('role','destination')
        ->where(function($t) use($request){
            if(!empty($request->search)){
                $t->orWhere('first_name','LIKE','%'.$request->search.'%');
                $t->orWhere('last_name','LIKE','%'.$request->search.'%');
                $t->orWhere('email','LIKE','%'.$request->search.'%');
            }
        })->orderBy('created_at','desc');

        $vv = view($this->path.'list')
                ->with('destination',$destination->paginate($limit))
                ->with('list',$limit)
                ->with('count',$destination->count());
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
        
        $logo_path = 'image_data/logo/destination/';
      


      $certificate_path = 'image_data/certificate/destination/';
      

      $user = User::where('_id',$id)->first();
       

      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->mobile_number = (int)$request->mobile_number;
      $user->company_name = $request->company_name;
      $user->vat_number = (int)$request->vat_number;
      $user->trading = $request->trading;
      $user->address = $request->address;        

      if (!empty($request->logo)){
          (isset($user->logo) && $user->logo!='null') ? unlink(public_path($user->logo)) : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->logo->getClientOriginalExtension();
          $logo = $time.".".$ext;
          $request->logo->move(public_path('image_data/logo/destination'),$logo);
          $logo = $logo_path.$logo;
          
          $user->logo = $logo;
      }

      if (!empty($request->certificate1)){
          (isset($user->certificate1) && $user->certificate1!='null') ? unlink(public_path($user->certificate1)) : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate1->getClientOriginalExtension();
          $certificate1 = $time.".".$ext;
          $request->certificate1->move(public_path('image_data/certificate/destination'),$certificate1);
          $certificate1 = $certificate_path.$certificate1;

          $user->certificate1 = $certificate1;
      }

      if (!empty($request->certificate2)){
          (isset($user->certificate2) && $user->certificate2!='null') ? unlink(public_path($user->certificate2)) : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate2->getClientOriginalExtension();
          $certificate2 = $time.".".$ext;
          $request->certificate2->move(public_path('image_data/certificate/destination'),$certificate2);
          $certificate2 = $certificate_path.$certificate2;

          $user->certificate2 = $certificate2;
    }
    
    if (!empty($request->certificate3)){
          (isset($user->certificate3) && $user->certificate3!='null') ? unlink(public_path($user->certificate3)) : '';
         $time = strtotime('now').Str::random(40);
      $ext = $request->certificate3->getClientOriginalExtension();
      $certificate3 = $time.".".$ext;
      $request->certificate3->move(public_path('image_data/certificate/destination'),$certificate3);
      $certificate3 = $certificate_path.$certificate3;
        
      $user->certificate3 = $certificate3;
    }

    if (!empty($request->certificate4)){
        (isset($user->certificate4) && $user->certificate4!='null') ? unlink(public_path($user->certificate4)) : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate4->getClientOriginalExtension();
        $certificate4 = $time.".".$ext;
        $request->certificate4->move(public_path('image_data/certificate/destination'),$certificate4);
        $certificate4 = $certificate_path.$certificate4;

        $user->certificate4 = $certificate4;
    }  
        
        $user->title = $request->title;
        $user->position = $request->position;
        $user->website = $request->website;
        $user->billing_address = $request->billing_address;
        $user->company_number = $request->company_number;

      $user->save();
       return redirect()->route('admin.destination.index')->with(['message' => 'Record Updated Successfully.', 'message_type' => 'success']);
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

    public function destination_job($user_id){        
        return view($this->path.'job.jobs')->with('user_id',$user_id);
    }

    public function open_jobs(Request $request,$user_id){

        $job = Job::where('close_job',0)->where('hire_status',0)->where('created_by',$user_id)->orderBy('created_at','desc')->paginate(10);
        $vv = view($this->path.'job.open_jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function open_job_detail($job_id){
        $j = Job::where('_id',$job_id)->where('close_job',0)->where('hire_status',0);
        if($j->count() > 0){
            $j = $j->first();
            $a = Applicant::where('job_id',$job_id)->get();
            return view($this->path.'job.detail.open_job_detail')->with('job',$j)->with('applicant',$a);
        }else{
            abort(404);
        }
    }

    public function hire_jobs(Request $request,$user_id){
        $job = Job::where('hire_status',1)->where('close_job',0)->where('created_by',$user_id)->orderBy('created_at','desc')->paginate(10);
        $vv = view($this->path.'job.hire_jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function hire_job_detail($job_id){
        $j = Job::where('_id',$job_id)->where('hire_status',1)->where('close_job',0);
        if($j->count() > 0){
            $job = $j->first();
            return view($this->path.'job.detail.hire_job_detail')->with('j',$job);

            
        }else{
            abort(404);
        }
    }

    public function closed_jobs(Request $request,$user_id){
        $job = Job::where('close_job',1)->where('created_by',$user_id)->orderBy('created_at','desc')->paginate(10);
        $vv = view($this->path.'job.closed_jobs')->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function closed_job_detail($job_id){
        $j = Job::where('_id',$job_id)->where('close_job',1);
        if($j->count() > 0){
            $job = $j->first();
            $rating_pioneer = Rating::where('job_id',$job_id)->where('by',$job->created_by)->first();
            $rating_destination = Rating::where('job_id',$job_id)->where('by',$job->hire_person)->first();
            $dispute_pioneer = Dispute::where('job_id',$job_id)->where('by',$job->hire_person)->first();
            return view($this->path.'job.detail.closed_job_detail')->with('j',$job)->with('rating_pioneer',$rating_pioneer)->with('rating_destination',$rating_destination)->with('dispute_pioneer',$dispute_pioneer);

            
        }else{
            abort(404);
        }
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
