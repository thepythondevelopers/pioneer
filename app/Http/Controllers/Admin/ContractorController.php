<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Escrow;
use App\Models\Notification;
use App\Models\Job;
use App\Models\Invoice;
use App\Mail\Admin\PioneerInvoicePaidNotify;
use App\Mail\Admin\DestinationInvoicePaidNotify;
use App\Mail\Admin\PioneerEscrowReceivedNotify;
use App\Mail\Admin\DestinationEscrowReceivedNotify;
use Illuminate\Support\Facades\Mail;

class ContractorController extends Controller
{
    public $path ='admin.modules.contractor.';


    public function index(){        
        return view($this->path.'index');
    }

    public function list(Request $request)
    {   
        $limit = !empty($request->list) ? (int)$request->list : 10;

        $job_id = Escrow::orderBy('created_at','desc')->pluck('job_id')->unique();
        
        $job = Job::whereIn('_id',$job_id)->orderBy('created_at','desc');
        
        $vv = view($this->path.'list')
                ->with('job',$job->paginate($limit))
                ->with('list',$limit)
                ->with('count',$job->count());
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    }

    public function invoice($id){        
        $invoice = Invoice::where('job_id',$id)->orderBy('_id','desc')->get();
        return view($this->path.'invoice')->with('invoice',$invoice);
    }

    public function escrow($id){        
        $payment = Escrow::where('job_id',$id)->orderBy('_id','desc')->get();
        return view($this->path.'escrow')->with('payment',$payment);
    }

    public function escrow_status(Request $request){
        $es = Escrow::where('_id',$request->id)->first();
        $job_id = $es->job_id;
        $job = Job::where('_id',$job_id)->first();
        if($es->admin_status==0){
            $es->admin_status = 1;
            $es->save();

            $n = new Notification();
            $n->type = "Escrow Recieved";
            $n->to = $job->created_by;
            $n->by = Auth::user()->_id;
            $n->read_status = 0;
            $n->message = 'Escrow Payment is confirmed by Admin';
            $n->escrow_id = $request->id;
            $n->job_id = $job_id;
            $n->save();

            $n = new Notification();
            $n->type = "Escrow Recieved";
            $n->to = $job->hire_person;
            $n->message = 'Escrow Payment is recieved by Admin';
            $n->by = Auth::user()->_id;
            $n->read_status = 0;
            $n->escrow_id = $request->id;
            $n->job_id = $job_id;
            $n->save();

            Mail::to($job->hire_user->email)->send(new PioneerEscrowReceivedNotify($job->hire_user,$job,$es));
            Mail::to($job->created_user->email)->send(new DestinationEscrowReceivedNotify($job->created_user,$job,$es));
        }
        return response()->json([
           'status' => 1,
           'message' => 'Status Change Successfully.'
        ]);
    }

    public function invoice_pay($id,Request $request){
        $i = Invoice::where('_id',$id)->first();
        $job = Job::where('_id',$i->job_id)->first();
        $i->paid = 1;
        $i->paid_date = date("d M Y");
        $i->save();

        $n = new Notification();
        $n->type = "Invoice Paid";
        $n->to = $job->created_by;
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->message = 'Invoice Paid by Admin';
        $n->invoice_id = $id;
        $n->job_id = $job->_id;
        $n->save();

        $n = new Notification();
        $n->type = "Invoice Paid";
        $n->to = $job->hire_person;
        $n->message = 'Invoice Paid by Admin';
        $n->by = Auth::user()->_id;
        $n->read_status = 0;
        $n->invoice_id = $id;
        $n->job_id = $job->_id;
        $n->save();

        Mail::to($job->hire_user->email)->send(new PioneerInvoicePaidNotify($job->hire_user,$job,$i));
        Mail::to($job->created_user->email)->send(new DestinationInvoicePaidNotify($job->created_user,$job,$i));

        return response()->json([
           'status' => 1,
           'message' => 'Invoice Paid Successfully.'
        ]);
    }    

}    