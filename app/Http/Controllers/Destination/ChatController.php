<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Job;
use App\Models\Chat;
use App\Models\Escrow;
use App\Models\Applicant;
use Illuminate\Support\Str;
use DB;
use App\Models\Notification;
use App\Mail\Destination\AdminNotifyEscrow;
use App\Mail\Destination\PioneerHireJob;
use Illuminate\Support\Facades\Mail;
class ChatController extends Controller
{
    public $path ='destination.modules.chat.';

    public function chat(Request $request,$job_id=0,$user_id=0){        
        $job_id = $job_id!=0 ? $job_id : $request->job_id;
        $user_id= $user_id!=0 ? $user_id: $request->user_id;
        return view($this->path.'chat')->with('job_id',$job_id)->with('user_id',$user_id);
    }

    public function chat_message(Request $request){
        
        $job_id = $request->job_id;
        $user_id= $request->user_id;
        $job = Job::where('_id',$job_id)->first();
        $applicant = Applicant::where('job_id',$job_id)->where('submit_by',$user_id)->first();
        $applicant_id = $applicant!=null ? $applicant->_id : '';
        $chat = Chat::orWhere(function($query) use($user_id) {
                        $query->where('send_to',Auth::user()->_id)->where('send_by',$user_id); 
                })->orWhere(function($query) use($user_id) {
                        $query->where('send_to',$user_id)->where('send_by',Auth::user()->_id); 
                })->where('job_id',$job_id)->get()->groupBy(function($item) {
                    return $item->created_at->format('M  jS Y');
                });
             
        $vv = view($this->path.'chat-message')->with('job',$job)->with('send_to',$user_id)->with('job_id',$job_id)->with('chat',$chat)->with('applicant_id',$applicant_id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render(),
           'check' => $job_id
        ]);
    }

    public function user_list(Request $request){
        $search = $request->search;
            
            $job_id = Job::where('created_by',Auth::user()->_id)->pluck('_id')->toArray();
            
            $chat_list = Chat::whereIn('job_id',$job_id)->whereHas('sendBy_user', function ($query) use ($search) {
    $query->when($search, function ($query) use ($search) {                
                            $query->where('first_name','LIKE','%'.$search.'%');
                });
})->orderBy('created_at','desc')->get()->groupBy('applicant_id');
    //        dd($chat_list);
            /*dd($chat_list);
            $chat_list_a = array();
            foreach($chat_list as $key=>$c){
                array_push($chat_list_a,$key);
            }
            $user_list =array();
            foreach ($chat_list_a as $key => $id) {
                $data= Applicant::where('_id',$id)->with(['applicant' => function ($query) use ($search){ 
                    $query->when($search, function ($query) use ($search) {                
                            $query->where('first_name','LIKE','%'.$search.'%');
                });
            },'job'])->first();
                if($data->applicant!=null){
                    array_push($user_list,$data);    
                }
                
            }*/

            
        $vv = view($this->path.'user-list')->with('user_list',$chat_list);
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function chat_save(Request $request){
        $c = new Chat();
        $c->job_id = $request->job_id;
        $c->send_to = $request->send_to;
        $c->send_by = $request->send_by;
        $c->message = $request->message;
        $c->applicant_id = $request->applicant_id;
        $c->read_status = 0;
        $c->save();

/*        $n = new Notification();
        $n->message = 'New Message';
        $n->type = 'Chat';
        $n->to = $request->send_to;
        $n->by = $request->send_by;
        $n->read_status = 0;
        $n->applicant_id = $request->applicant_id;
        $n->job_id = $request->job_id;
        $n->save();*/  
    }

    public function chat_html(Request $request){
       $html =  chat_html($request);
       return response()->json([
           'status' => 1,
           'html' => $html
        ]);
    }

    public function chat_count(){
      $count =   Chat::where('send_to',Auth::user()->_id)->where('read_status',0)->count();
      $count = $count==0 ? '' : $count;
      return response()->json([
           'status' => 1,
           'count' => $count
        ]);
    }

    public function hire_applicant_job(Request $request){
        $job = Job::where('_id',$request->job_id);
        if($job->count() > 0){
            $j = $job->first();
            if($j->hire_status!=1){
                $j->hire_status = 1;
                $j->hire_type = $request->type;
                $j->hire_person = $request->hire_applicant_id;
                $j->save();
                
                $e = new Escrow();
                $e->job_id = $request->job_id;
                $e->escrow_amount = (int)$request->price;
                $e->hire_type = $request->type;        
                $e->admin_status = 0;    
                $e->save();

                $n = new Notification();
                $n->message = 'Escrow Message';
                $n->type = "Hire";
                $n->to = $request->hire_applicant_id;
                $n->by = Auth::user()->_id;
                $n->read_status = 0;
                $n->job_id = $request->job_id;
                $n->save();

                $n = new Notification();
                $n->message = 'Escrow Message';
                $n->type = "Escrow";
                $n->to = admin()->_id;
                $n->by = Auth::user()->_id;
                $n->read_status = 0;
                $n->job_id = $request->job_id;
                $n->save();

                Mail::to($j->hire_user->email)->send(new PioneerHireJob($j->hire_user,$j));
                Mail::to(admin()->email)->send(new AdminNotifyEscrow(admin(),$e));

                return response()->json([
                    'status' => 1,
                    'message' => 'Applicant is hired.'
                ]);
            }    
        }
    }    
}    