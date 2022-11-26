<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Illuminate\Support\Str;
use App\User;
use App\Models\Notification;
use App\Mail\Pioneer\AdminNotifySignup;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
	 public $path ='pioneer.modules.registration.';

    public function register_step1(){   
    $user = Auth::user();               
     return view($this->path.'step1')->with('user',$user);
   } 

   public function register_step1_save(Request $request){   
    
      $logo_path = 'image_data/logo/pioneer/';
      

      $certificate_path = 'image_data/certificate/pioneer/';
      
      
      $user = Auth::user();
       
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->mobile_number = (int)$request->mobile_number;
      $user->dob = $request->dob;
      $user->address = $request->address;
      //$user->trading = $request->trading;
      $user->title = $request->title;
      $user->utr_number = $request->utr_number; 

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

    if (!empty($request->certificate5)){
        (isset($user->certificate5) && $user->certificate5!='null') ? unlink(public_path($user->certificate5)) : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate5->getClientOriginalExtension();
        $certificate5 = $time.".".$ext;
        $request->certificate5->move(public_path('image_data/certificate/pioneer'),$certificate5);
        $certificate5 = $certificate_path.$certificate5;

        $user->certificate5 = $certificate5;
    }  
    $user->step = 2;
      $user->save();

    return redirect()->route('pioneer.register.step2');

   } 

   public function register_step2(){
   if(Auth::user()->step==1){
        return redirect()->route('pioneer.register.step1');        
    } 
   	$service = Service::where('type','looking_for_pioneer')->get();
    return view($this->path.'step2')->with('service',$service);
   } 

    public function register_step2_save(Request $request){                  
      
        $user = Auth::user();
        $service = json_encode($request->service);
        $user->service = $service;
        $user->step = 3;
        $user->save();
        return redirect()->route('pioneer.register.step3');
   } 

   public function register_step3(){ 
    if(Auth::user()->step==1){
        return redirect()->route('pioneer.register.step1');        
    }elseif(Auth::user()->step==2){
        return redirect()->route('pioneer.register.step2');
    }
   	$service = Service::where('type','offer')->get();                 
   	return view($this->path.'step3')->with('service',$service);
   } 

    public function register_step3_save(Request $request){ 
      
        $user = Auth::user();
        $user->hour = (int)$request->hour;
        $user->rate_of_pay = (int)$request->rate_of_pay;
        $user->job_type = (int)$request->job_type;
        $user->location = (int)$request->location;
        $user->step = 0;
        $user->save();
        $role = Auth::user()->role;

        $n = new Notification();
        $n->type= 'Pioneer Signup';
        $n->user = $user->_id;
        $n->to = admin()->_id;
        $n->by = $user->_id;
        $n->message = 'Pioneer Signup';
        $n->read_status = 0;
        $n->save();

        Mail::to(admin()->email)->send(new AdminNotifySignup(admin(),$user));

        if(Auth::user()->email_verification==1){
          return redirect()->route('pioneer.home')->with(['message' => 'Registration Process Completed Successfully.', 'message_type' => 'success','notification' =>"send"]);  
        }
        auth()->logout();
        return redirect()->route('login_role',$role)->with(['message' => 'E-mail has not been verified yet.', 'message_type' => 'danger']);
        
   } 
}	