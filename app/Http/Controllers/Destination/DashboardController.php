<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Notification;
class DashboardController extends Controller
{
    public $path ='destination.modules.';


    public function home(){  

        $user = Auth::user();      
        return view($this->path.'home.home')->with('user',$user);
    }

    public function list(){
        $job = Job::where('created_by',Auth::user()->_id)->where('hire_status',0)->orderBy('created_at','desc')->paginate(10);

        $vv = view($this->path.'home.job-list')
                ->with('job',$job);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
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

    

    public function invoices(){       

        return view($this->path.'invoices');
    }

    


    






    
}
