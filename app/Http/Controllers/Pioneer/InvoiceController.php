<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Escrow;
use App\Models\Notification;
use App\Models\Job;
use App\Models\Invoice;
use App\Mail\Pioneer\AdminNotifyInvoice;
use App\Mail\Pioneer\DestinationNotifyInvoice;
use Illuminate\Support\Facades\Mail;


class InvoiceController extends Controller
{
    public $path ='pioneer.modules.invoice.';

    public function create($job_id){
        $job = Job::where('_id',$job_id)->first();        
        return view($this->path.'create')->with('job',$job);
    }

    public function save($job_id,Request $request){        
        $j= Job::where('_id',$job_id)->first();
        $description = $request->description;
        $data = array();
        if($request->type=='Fixed'){
            foreach($description as $key=>$d){
                $d = array('description' =>$d, 'qty' => 'N/A', 'amount' =>$request->amount[$key]);
                array_push($data,$d);
            }    
        }else{
            foreach($description as $key=>$d){
                $d = array('description' =>$d, 'qty' => $request->qty[$key], 'amount' =>$request->amount[$key]);
                array_push($data,$d);
            }    
        }
        
        $i = new Invoice();
        $i->data = json_encode($data);
        $i->job_id = $job_id;
        $i->type = $request->type;
        $i->created_by = Auth::user()->_id;
        $i->paid = 0;
        $i->total_amount = (int)$request->total_amount; 
        $i->save();

        $n = new Notification();
        $n->message = 'Invoice Raise';
        $n->type = "Invoice Raise";
        $n->to = $j->created_by;
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->job_id = $job_id;
        $n->save();

        $n = new Notification();
        $n->message = 'Invoice Raise';
        $n->type = "Invoice Raise";
        $n->to = admin()->_id;
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->job_id = $job_id;
        $n->save();

        
        Mail::to(admin()->email)->send(new AdminNotifyInvoice(admin(),$j,$i));
        Mail::to($j->created_user->email)->send(new DestinationNotifyInvoice($j->created_user,$j,$i));

        return redirect()->route('pioneer.hire.job.detail',$job_id)->with(['message' => 'Invoice Created Successfully.', 'message_type' => 'success', 'notification'=>'success']);
    }

    public function invoices(){
        $job = Job::where('hire_person',Auth::user()->_id)->get();
        return view($this->path.'invoices')->with('job',$job);
    }

    public function invoice_list(Request $request){
        
        $limit = !empty($request->list) ? (int)$request->list : 10;
        $invoice = Invoice::where('created_by',Auth::user()->_id)->where(function($t) use($request){
            if(!empty($request->job)){
                $t->where('job_id',$request->job);
            }
            if($request->paid=='all'){
                //$t->where('paid',(int)$request->paid);
            }else{
                $t->where('paid',(int)$request->paid);
            }
        });
        
        $vv = view($this->path.'list')
                ->with('invoice',$invoice->paginate($limit))
                ->with('list',$limit)
                ->with('count',$invoice->count());
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
        dd($request);
    }
}