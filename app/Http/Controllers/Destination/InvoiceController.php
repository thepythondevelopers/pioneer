<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Escrow;
use App\Models\Notification;
use App\Models\Job;
use App\Models\Invoice;


class InvoiceController extends Controller
{
    public $path ='destination.modules.invoice.';

    

    public function invoices(){
        $job = Job::where('created_by',Auth::user()->_id)->get();
        return view($this->path.'invoices')->with('job',$job);
    }

    public function invoice_list(Request $request){
        
        $limit = !empty($request->list) ? (int)$request->list : 10;
        $job_id = Job::where('created_by',Auth::user()->_id)->pluck('_id')->toArray();
        if($request->type=='invoice'){
            $invoice = Invoice::whereIn('job_id',$job_id)->where(function($t) use($request){
                if(!empty($request->job)){
                    $t->where('job_id',$request->job);
                }
                if($request->paid=='all'){
                    //$t->where('paid',(int)$request->paid);
                }else{
                    $t->where('paid',(int)$request->paid);
                }
            })->orderBy('_id', 'DESC');
            
            $vv = view($this->path.'list')
                    ->with('invoice',$invoice->paginate($limit))
                    ->with('list',$limit)
                    ->with('count',$invoice->count());
        }else{
            $escrow = Escrow::whereIn('job_id',$job_id)->where(function($t) use($request){
                if(!empty($request->job)){
                    $t->where('job_id',$request->job);
                }
                if($request->paid=='all'){
                    //$t->where('paid',(int)$request->paid);
                }else{
                    $t->where('admin_status',(int)$request->paid);
                }
            });
            
            $vv = view($this->path.'escrow_list')
                    ->with('escrow',$escrow->paginate($limit))
                    ->with('list',$limit)
                    ->with('count',$escrow->count());
        }        
        return response()->json([
           'status' => 1,
           'html' => $vv->render()
        ]);
    
    }
}