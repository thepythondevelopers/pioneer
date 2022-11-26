<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Job;
use App\Models\Notification;
use Carbon\Carbon;
use DB;
class DashboardController extends Controller
{
    public $path ='admin.modules.';

    public function dashboard(){        
        
        $pioneer = User::where('role','pioneer')->orderBy('created_at', 'desc')->take(5)->get();
        $destination = User::where('role','destination')->orderBy('created_at', 'desc')->take(5)->get();
        
        $pioneer_count =  User::where('role','pioneer')->count();
        $destination_count =  User::where('role','destination')->count();
        $contracts =  Job::where('hire_status',1)->count();
        $job_count =  Job::count();       
        // $pioneer_today = User::where('role','pioneer')->where('created_at', '>=' ,Carbon::yesterday())->count();
        // $pioneer_week =  User::where('role','pioneer')->whereBetween('created_at', 
        //                 [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        //             )->count();
        // $pioneer_month = User::where('role','pioneer')->whereBetween('created_at', 
        //                 [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
        //             )->count();
        // $pioneer_quarter = User::where('role','pioneer')->where('created_at', '>=' ,Carbon::now()->subDays(90))->count();
        // $pioneer_six_month = User::where('role','pioneer')->where('created_at', '>=' ,Carbon::now()->subDays(180))->count();
        // $pioneer_year = User::where('role','pioneer')->whereBetween('created_at', 
        //                 [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]
        //             )->count();

        // $destination_today = User::where('role','destination')->where('created_at', '>=' ,Carbon::yesterday())->count();
        // $destination_week =  User::where('role','destination')->whereBetween('created_at', 
        //                 [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        //             )->count();
        // $destination_month = User::where('role','destination')->whereBetween('created_at', 
        //                 [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
        //             )->count();
        // $destination_quarter = User::where('role','destination')->where('created_at', '>=' ,Carbon::now()->subDays(90))->count();
        // $destination_six_month = User::where('role','destination')->where('created_at', '>=' ,Carbon::now()->subDays(180))->count();
        // $destination_year = User::where('role','destination')->whereBetween('created_at', 
        //                 [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]
        //             )->count();

        // $job_today = JOb::where('created_at', '>=' ,Carbon::yesterday())->count();
        // $job_week =  JOb::whereBetween('created_at', 
        //                 [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        //             )->count();
        // $job_month = JOb::whereBetween('created_at', 
        //                 [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()]
        //             )->count();
        // $job_quarter = JOb::where('created_at', '>=' ,Carbon::now()->subDays(90))->count();
        // $job_six_month = JOb::where('created_at', '>=' ,Carbon::now()->subDays(180))->count();
        // $job_year = JOb::whereBetween('created_at', 
        //                 [Carbon::now()->startOfYear(), Carbon::now()->endOfYear()]
        //             )->count();

/*        $users = User::whereBetween(
             'created_at', array(
                 Carbon::createFromDate(2020, 10, 1),
                 Carbon::createFromDate(2022, 10, 31)
             )
         )->get();
        dd($users);*/

                 
        return view($this->path.'dashboard')->with('destination',$destination)
                                            ->with('pioneer',$pioneer)->with('pioneer_count',$pioneer_count)->with('destination_count',$destination_count)->with('contracts',$contracts)->with('job_count',$job_count);

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

    public function p_d_graph(Request $request){
        $date = strtotime("+1 day", strtotime($request->value_from_end_date));
        $end_date = date("d-m-Y", $date);
        $u = User::where('role','!=','admin')->whereBetween(
             'created_at', array(
                 Carbon::createFromDate($request->value_from_start_date),
                 Carbon::createFromDate($end_date)
             )
            )->get()->groupBy(function($item) {
                    return $item->created_at->format('M  Y');
                });
                $k= []; 
                $destination = [];
                $pioneer = [];
                
        foreach ($u as $key => $value) {
                 array_push($k, $key);
                 $d_a = [];
                 $p_a =[];
                 foreach($value as $d=>$v){
                    if($v->role=='destination'){
                        array_push($d_a, $v);
                    }elseif($v->role=='pioneer'){
                        array_push($p_a, $v);
                    }
                    
                    
                 }
                 array_push($destination, count($d_a));
                    array_push($pioneer, count($p_a));
             }     
     return response()->json([
           'status' => 1,
           'key' => $k,
           'destination' => $destination,
           'pioneer' => $pioneer
        ]);        
    }

    public function contract_graph(Request $request){
                $date = strtotime("+1 day", strtotime($request->value_from_end_date1));
        $end_date = date("d-m-Y", $date);
        $contracts = Job::where('hire_status',1)->whereBetween(
             'created_at', array(
                 Carbon::createFromDate($request->value_from_start_date1),
                 Carbon::createFromDate($end_date)
             )
            )->get()->groupBy(function($item) {
                    return $item->created_at->format('M  Y');
                });
            
            $k =array();
            $contracts_a = array();
            foreach ($contracts  as $key => $value) {
                 array_push($k, $key);
                 array_push($contracts_a, count($value));
            }     
        return response()->json([
           'status' => 1,
           'key' => $k,
           'contracts' => $contracts_a
        ]);            
    }
    
}
