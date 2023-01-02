<?php

namespace App\Http\Controllers\Destination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\CmsPage;
use Illuminate\Support\Str;
class SettingController extends Controller
{
    public $path ='destination.modules.setting.';

    public function setting(){        
        $user = Auth::user();
        return view($this->path.'setting')->with('user',$user);
    }

    public function setting_password_change(Request $request){
        $email = Auth::user()->email;
        $old_password = $request->old_password;

         $user = User::where('email', '=', $email)->first();
         if (!Hash::check($old_password, $user->password)) {
            return response()->json(['status' => 0,'message' => 'Previous Password Not Match.']);        
         }

        
        $user->password = Hash::make($request->new_password);
        $user->save();
        return response()->json(['status' => 1,'message' => 'Password Changed Successfully.']);

    }

    public function terms(){        
        
        
        $term = CmsPage::where('type','term_condition')->get();
        return view($this->path.'terms')->with('term',$term);
    }

    public function about(){        
        
        $about = CmsPage::where('type','about')->get();
        
        return view($this->path.'about')->with('about',$about);
    }

    public function profile_update(Request $request){
        $logo_path = 'image_data/logo/destination/';
        $certificate_path = 'image_data/certificate/destination/';


      
      

      $user = Auth::user();
       

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
    $user->about_us = $request->about_us;



      /*$user->mobile_number = (int)$request->mobile_number;
      $user->company_name = $request->company_name;
      $user->vat_number = (int)$request->vat_number;
      $user->trading = $request->trading;
      $user->address = $request->address;*/        

      if (!empty($request->logo)){
          (isset($user->logo) && $user->logo!='null') ? (file_exists(public_path($user->logo)) ? unlink(public_path($user->logo)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->logo->getClientOriginalExtension();
          $logo = $time.".".$ext;
          $request->logo->move(public_path('image_data/logo/destination'),$logo);
          $logo = $logo_path.$logo;          
          $user->logo = $logo;
       
      }

        if (!empty($request->certificate1)){
          (isset($user->certificate1) && $user->certificate1!='null') ? (file_exists(public_path($user->certificate1)) ? unlink(public_path($user->certificate1)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate1->getClientOriginalExtension();
          $certificate1 = $time.".".$ext;
          $request->certificate1->move(public_path('image_data/certificate/destination'),$certificate1);
          $certificate1 = $certificate_path.$certificate1;
          $user->certificate1 = $certificate1;
        }
        
        if (!empty($request->certificate2)){
          (isset($user->certificate2) && $user->certificate2!='null') ? (file_exists(public_path($user->certificate2)) ? unlink(public_path($user->certificate2)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate2->getClientOriginalExtension();
          $certificate2 = $time.".".$ext;
          $request->certificate2->move(public_path('image_data/certificate/destination'),$certificate2);
          $certificate2 = $certificate_path.$certificate2;
          $user->certificate2 = $certificate2;
        
    }

    if (!empty($request->certificate3)){
          (isset($user->certificate3) && $user->certificate3!='null') ? (file_exists(public_path($user->certificate3)) ? unlink(public_path($user->certificate3)) : '') : '';
         $time = strtotime('now').Str::random(40);
      $ext = $request->certificate3->getClientOriginalExtension();
      $certificate3 = $time.".".$ext;
      $request->certificate3->move(public_path('image_data/certificate/destination'),$certificate3);
      $certificate3 = $certificate_path.$certificate3;
      $user->certificate3 = $certificate3;
         
    }


    if (!empty($request->certificate4)){
        (isset($user->certificate4) && $user->certificate4!='null') ? ( file_exists(public_path($user->certificate4)) ? unlink(public_path($user->certificate4)) : '') : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate4->getClientOriginalExtension();
        $certificate4 = $time.".".$ext;
        $request->certificate4->move(public_path('image_data/certificate/destination'),$certificate4);
        $certificate4 = $certificate_path.$certificate4;
        $user->certificate4 = $certificate4;
            
    }

      
    
    /*$user->title = $request->title;
        $user->position = $request->position;
        $user->website = $request->website;
        $user->billing_address = $request->billing_address;
        $user->company_number = $request->company_number;*/

      
        
      $user->save();
      return response()->json(['status' => 1,'message' => 'Profile Updated Successfully.']);
    }

    public function logo_update(Request $request){
        $logo_path = 'image_data/logo/destination/';
      $user = Auth::user();
        if (!empty($request->logo)){
          (isset($user->logo) && $user->logo!='null') ? (file_exists(public_path($user->logo)) ? unlink(public_path($user->logo)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->logo->getClientOriginalExtension();
          $logo = $time.".".$ext;
          $request->logo->move(public_path('image_data/logo/destination'),$logo);
          $logo = $logo_path.$logo;
          
          $user->logo = $logo;
          $user->save();
      }

      return response()->json(['status' => 1,'message' => 'Uploaded Successfully.']);
    }

    public function certificate1_update(Request $request){
        $certificate_path = 'image_data/certificate/destination/';
      $user = Auth::user();
        if (!empty($request->certificate1)){
          (isset($user->certificate1) && $user->certificate1!='null') ? (file_exists(public_path($user->certificate1)) ? unlink(public_path($user->certificate1)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate1->getClientOriginalExtension();
          $certificate1 = $time.".".$ext;
          $request->certificate1->move(public_path('image_data/certificate/destination'),$certificate1);
          $certificate1 = $certificate_path.$certificate1;

          $user->certificate1 = $certificate1;
          $user->save();
      }
      return response()->json(['status' => 1,'message' => 'Uploaded Successfully.']);
    }

    public function certificate2_update(Request $request){
        $certificate_path = 'image_data/certificate/destination/';
      $user = Auth::user();
        if (!empty($request->certificate2)){
          (isset($user->certificate2) && $user->certificate2!='null') ? (file_exists(public_path($user->certificate2)) ? unlink(public_path($user->certificate2)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate2->getClientOriginalExtension();
          $certificate2 = $time.".".$ext;
          $request->certificate2->move(public_path('image_data/certificate/destination'),$certificate2);
          $certificate2 = $certificate_path.$certificate2;

          $user->certificate2 = $certificate2;
        $user->save();
    }
      return response()->json(['status' => 1,'message' => 'Uploaded Successfully.']);
    }

    public function certificate3_update(Request $request){
        $certificate_path = 'image_data/certificate/destination/';
      $user = Auth::user();
        if (!empty($request->certificate3)){
          (isset($user->certificate3) && $user->certificate3!='null') ? (file_exists(public_path($user->certificate3)) ? unlink(public_path($user->certificate3)) : '') : '';
         $time = strtotime('now').Str::random(40);
      $ext = $request->certificate3->getClientOriginalExtension();
      $certificate3 = $time.".".$ext;
      $request->certificate3->move(public_path('image_data/certificate/destination'),$certificate3);
      $certificate3 = $certificate_path.$certificate3;
        
      $user->certificate3 = $certificate3;
         $user->save();
    }
      return response()->json(['status' => 1,'message' => 'Uploaded Successfully.']);
    }

    public function certificate4_update(Request $request){
        $certificate_path = 'image_data/certificate/destination/';
      $user = Auth::user();
        if (!empty($request->certificate4)){
        (isset($user->certificate4) && $user->certificate4!='null') ? ( file_exists(public_path($user->certificate4)) ? unlink(public_path($user->certificate4)) : '') : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate4->getClientOriginalExtension();
        $certificate4 = $time.".".$ext;
        $request->certificate4->move(public_path('image_data/certificate/destination'),$certificate4);
        $certificate4 = $certificate_path.$certificate4;

        $user->certificate4 = $certificate4;
            $user->save();
    }
      return response()->json(['status' => 1,'message' => 'Uploaded Successfully.']);
    }

    public function bank_details(Request $request){
        dd($request);
    }    

    public function payment_details(Request $request){
        dd($request);
    }

    public function image_remove(Request $request){
      $user = Auth::user();
      switch ($request->type) {
        case  'certificate1':
             file_exists(public_path($user->certificate1)) ? unlink(public_path($user->certificate1)) : '';
            $user->certificate1 = null;
            $user->save();
            break;
        case 'certificate2':
            file_exists(public_path($user->certificate2)) ? unlink(public_path($user->certificate2)) : '';
            $user->certificate2 = null;
            $user->save();
            break;
        case 'certificate3':
            file_exists(public_path($user->certificate1)) ? unlink(public_path($user->certificate1)) : '';
            $user->certificate1 = null;
            $user->save();
            break;
        case 'certificate4':
            file_exists(public_path($user->certificate4)) ? unlink(public_path($user->certificate4)) : '';
            $user->certificate4 = null;
            $user->save();
            break;
        
        default:
            error.insertAfter(element);
    }
     return response()->json(['status' => 1,'message' => 'Image Removed Successfully.']);
    }    
}    