<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use App\Models\Notification;
use Illuminate\Support\Str;
use App\User;
use App\Mail\Destination\AdminNotifySignup;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
	 public $path ='destination.modules.registration.';

    public function register_step1(){   
    $user = Auth::user();               
     return view($this->path.'step1')->with('user',$user);
   } 

   public function register_step1_save(Request $request){   
                
      $logo_path = 'image_data/logo/destination/';
      


      $certificate_path = 'image_data/certificate/destination/';
      

      $user = Auth::user();
       
      /*$user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->mobile_number = (int)$request->mobile_number;
      $user->company_name = $request->company_name;
      $user->vat_number = (int)$request->vat_number;
      $user->trading = $request->trading;*/

      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->mobile_number = (int)$request->mobile_number;
      $user->company = $request->company;
    $user->website_address = $request->website_address;
    $user->address1 = $request->address1;
    $user->main_contact_name = $request->main_contact_name;
    $user->address2 = $request->address2;
    $user->town_city = $request->town_city;
    $user->finance_name = $request->finance_name;
    $user->country = $request->country;
    $user->finance_email = $request->finance_email;
    $user->postcode = $request->postcode;
    $user->postcode = $request->postcode;
    $user->about_us = $request->about_us;

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
        $user->step = 2;

        /*$user->title = $request->title;
        $user->position = $request->position;
        $user->website = $request->website;
        $user->billing_address = $request->billing_address;
        $user->company_number = $request->company_number;*/
      $user->save();

    return redirect()->route('destination.register.step2');

   } 

   public function register_step2(){                  
    if(Auth::user()->step==1){
        return redirect()->route('destination.register.step1');        
    } 
   	$service = Service::where('type','looking_for')->get();
    return view($this->path.'step2')->with('service',$service);
   } 

    public function register_step2_save(Request $request){                  
      
        $user = Auth::user();
        $service = json_encode($request->service);
        $user->service = $service;
        $user->step = 3;
        $user->save();
        return redirect()->route('destination.register.step3');
   } 

   public function register_step3(){ 
    if(Auth::user()->step==1){
        return redirect()->route('destination.register.step1');        
    }elseif(Auth::user()->step==2){
        return redirect()->route('destination.register.step2');
    } 
   	$service = Service::where('type','offer')->get();                 
   	return view($this->path.'step3')->with('service',$service);
   } 

    public function register_step3_save(Request $request){ 
        $user = Auth::user();
        $user->offer = json_encode($request->offer);
        $user->step = 0;
        $user->save();
        $role = Auth::user()->role;

        $n = new Notification();
        $n->type= 'Destination Signup';
        $n->user = $user->_id;
        $n->to = admin()->_id;
        $n->by = $user->_id;
        $n->message = 'Destination Signup';
        $n->read_status = 0;
        $n->save();

        Mail::to(admin()->email)->send(new AdminNotifySignup(admin(),$user));

        if(Auth::user()->email_verification==1){
          return redirect()->route('destination.home')->with(['message' => 'Registration Process Completed Successfully.', 'message_type' => 'success','notification' =>"send"]);  
        }
        auth()->logout();
        return redirect()->route('login_role',$role)->with(['message' => 'E-mail has not been verified yet.', 'message_type' => 'danger']);
   }


}	