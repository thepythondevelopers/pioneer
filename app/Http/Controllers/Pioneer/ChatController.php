<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\Job;
use App\Models\Chat;
use App\Models\Applicant;
use Illuminate\Support\Str;
use App\Models\Notification;
use DB;
class ChatController extends Controller
{
    public $path ='pioneer.modules.chat.';

    public function chat(Request $request,$job_id=0,$user_id=0){      
       $job_id = $job_id!=0 ? $job_id : $request->job_id;
        $user_id= $user_id!=0 ? $user_id: $request->user_id;  
        return view($this->path.'chat')->with('job_id',$job_id)->with('user_id',$user_id);
    }

    public function chat_message(Request $request){
        
        $job_id = $request->job_id;
        $user_id= $request->user_id;
        $job = Job::where('_id',$job_id);
        if($job->count() > 0){
            $created_by = $job->first()->created_by;
        }else{
            $created_by = 0;
        }
        
        $applicant = Applicant::where('job_id',$job_id)->where('submit_by',Auth::user()->_id);
        if($applicant->count() > 0){
            $applicant_id = $applicant->first()->_id;
        }else{
            $applicant_id = 0;
        }
        $chat = Chat::orWhere(function($query) use($job,$created_by) {
                        $query->where('send_to',Auth::user()->_id)->where('send_by',$created_by); 
                })->orWhere(function($query) use($job,$created_by) {
                        $query->where('send_to',$created_by)->where('send_by',Auth::user()->_id); 
                })->where('job_id',$job_id)->get()->groupBy(function($item) {
                    return $item->created_at->format('M  jS Y');
                });
               
        $vv = view($this->path.'chat-message')->with('job',$job->first())->with('send_to',$created_by)->with('job_id',$job_id)->with('chat',$chat)->with('applicant_id',$applicant_id);
        return response()->json([
           'status' => 1,
           'html' => $vv->render(),
           'check' => $job_id
        ]);
    }

    public function user_list(Request $request){
        $search = $request->search;
            $applicant_id = Applicant::where('submit_by',Auth::user()->_id)->where('interested',1)->pluck('_id')->toArray();
            $chat_list = Chat::whereIn('applicant_id',$applicant_id)->whereHas('sendBy_user', function ($query) use ($search) {
    $query->when($search, function ($query) use ($search) {                
                            $query->where('first_name','LIKE','%'.$search.'%');
                });
})->orderBy('created_at','desc')->get()->groupBy('applicant_id');
            /*$chat_list_a = array();
            foreach($chat_list as $key=>$c){
                array_push($chat_list_a,$key);
            }*/
            
            /*$user_list= Applicant::whereIn('_id',$chat_list_a)->with(['proposal_to_user' => function ($query) use ($search){ 
                    $query->when($search, function ($query) use ($search) {                
                            $query->where('first_name','LIKE','%'.$search.'%');
                });
            },'job'])->get();*/
            /*$user_list =array();
            
            foreach ($chat_list_a as $key => $id) {
                $data= Applicant::where('_id',$id)->with(['proposal_to_user' => function ($query) use ($search){ 
                    $query->when($search, function ($query) use ($search) {                
                            $query->where('first_name','LIKE','%'.$search.'%');
                });
            },'job'])->first();
                if($data->proposal_to_user!=null){
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

        /*$n = new Notification();
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

}    