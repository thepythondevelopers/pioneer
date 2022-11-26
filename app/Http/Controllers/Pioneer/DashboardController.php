<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Location;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\Applicant;
class DashboardController extends Controller
{
    public $path ='pioneer.modules.';

    public function home(){        
        $user =Auth::user();
        $location = Location::get();
        //$new_job = Job::where('created_at', '>=', Carbon::now()->subMinutes(180)->toDateTimeString())->count();
        return view($this->path.'home.home')->with('user',$user)->with('location',$location);
    }

    public function list(Request $request){
        $job_ids = Applicant::where('submit_by',Auth::user()->_id)->pluck('job_id')->toArray();

        $job = Job::whereNotIn('_id',$job_ids)->where(function($d) use($request){
          if($request->title!=null){
              $d->where('title','LIKE','%'.$request->title.'%');
            }
            if($request->description!=null){
              $d->where('description','LIKE','%'.$request->description.'%');
            }
            if($request->location!=null){
              $d->where('location',$request->location);
            }
            if($request->job_type!=null){
              $d->where('job_type',$request->job_type);
            }
            if($request->main_search!=null){
              $d->where('title','LIKE','%'.$request->main_search.'%');
              $d->where('description','LIKE','%'.$request->main_search.'%');
            }
          
        })->orderBy('created_at','desc');
        
        $vv = view($this->path.'home.job-list')->with('job',$job->paginate(10));
        return response()->json([
           'status' => 1,
           'html' => $vv->render(),
           'count' => $job->count()
        ]);
    }






    public function jobs(){        
        return view($this->path.'job.jobs');
    }

    public function invoices(){        
        return view($this->path.'invoices');
    }

    public function notification(){        
        $notification = Notification::where('to',Auth::user()->_id)->orderBy('created_at','desc')->get()->groupBy(function($item) {
                    return $item->created_at->format('M  jS Y');
                });  
        Notification::where('to',Auth::user()->_id)->where('read_status',0)->update(['read_status'=>1]);    
        return view($this->path.'notification')->with('notification',$notification);
    }

    public function notification_count(){       
        $count = Notification::where('to',Auth::user()->_id)->where('read_status',0)->count();
        return response()->json([
           'status' => 1,
           'count' => $count
        ]);

    }    

    


    
    





    
}
