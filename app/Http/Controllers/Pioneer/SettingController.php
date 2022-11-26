<?php

namespace App\Http\Controllers\Pioneer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Models\CmsPage;
use Illuminate\Support\Str;
class SettingController extends Controller
{
    public $path ='pioneer.modules.setting.';

    public function setting(){        
        $user = Auth::user();
        return view($this->path.'account')->with('user',$user);
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
        
        $logo_path = 'image_data/logo/pioneer/';
      


      $certificate_path = 'image_data/certificate/pioneer/';
      

      $user = Auth::user();
       
      $user->first_name = $request->first_name;
      $user->last_name = $request->last_name;
      $user->mobile_number = (int)$request->mobile_number;
      $user->dob = $request->dob;
      $user->address = $request->address;

      $user->title = $request->title;
      $user->utr_number = $request->utr_number; 
        
       if (!empty($request->logo)){
          (isset($user->logo) && $user->logo!='null') ? (file_exists(public_path($user->logo)) ? unlink(public_path($user->logo)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->logo->getClientOriginalExtension();
          $logo = $time.".".$ext;
          $request->logo->move(public_path('image_data/logo/pioneer'),$logo);
          $logo = $logo_path.$logo;
          
          $user->logo = $logo;
       
      } 
      if (!empty($request->certificate1)){
          (isset($user->certificate1) && $user->certificate1!='null') ? (file_exists(public_path($user->certificate1)) ? unlink(public_path($user->certificate1)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate1->getClientOriginalExtension();
          $certificate1 = $time.".".$ext;
          $request->certificate1->move(public_path('image_data/certificate/pioneer'),$certificate1);
          $certificate1 = $certificate_path.$certificate1;

          $user->certificate1 = $certificate1;
       
      }

      if (!empty($request->certificate2)){
          (isset($user->certificate2) && $user->certificate2!='null') ? (file_exists(public_path($user->certificate2)) ? unlink(public_path($user->certificate2)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate2->getClientOriginalExtension();
          $certificate2 = $time.".".$ext;
          $request->certificate2->move(public_path('image_data/certificate/pioneer'),$certificate2);
          $certificate2 = $certificate_path.$certificate2;

          $user->certificate2 = $certificate2;
        
    }

    if (!empty($request->certificate3)){
          (isset($user->certificate3) && $user->certificate3!='null') ? (file_exists(public_path($user->certificate3)) ? unlink(public_path($user->certificate3)) : '') : '';
         $time = strtotime('now').Str::random(40);
      $ext = $request->certificate3->getClientOriginalExtension();
      $certificate3 = $time.".".$ext;
      $request->certificate3->move(public_path('image_data/certificate/pioneer'),$certificate3);
      $certificate3 = $certificate_path.$certificate3;
        
      $user->certificate3 = $certificate3;
     
    }

    if (!empty($request->certificate4)){
        (isset($user->certificate4) && $user->certificate4!='null') ? ( file_exists(public_path($user->certificate4)) ? unlink(public_path($user->certificate4)) : '') : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate4->getClientOriginalExtension();
        $certificate4 = $time.".".$ext;
        $request->certificate4->move(public_path('image_data/certificate/pioneer'),$certificate4);
        $certificate4 = $certificate_path.$certificate4;

        $user->certificate4 = $certificate4;
        
    }

    if (!empty($request->certificate5)){
        (isset($user->certificate5) && $user->certificate5!='null') ? ( file_exists(public_path($user->certificate5)) ? unlink(public_path($user->certificate5)) : '') : '';
        $time = strtotime('now').Str::random(40);
        $ext = $request->certificate5->getClientOriginalExtension();
        $certificate5 = $time.".".$ext;
        $request->certificate5->move(public_path('image_data/certificate/pioneer'),$certificate5);
        $certificate5 = $certificate_path.$certificate5;

        $user->certificate5 = $certificate5;
        
    }
        
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

      if (!empty($request->certificate1)){
          (isset($user->certificate1) && $user->certificate1!='null') ? (file_exists(public_path($user->certificate1)) ? unlink(public_path($user->certificate1)) : '') : '';
          $time = strtotime('now').Str::random(40);
          $ext = $request->certificate1->getClientOriginalExtension();
          $certificate1 = $time.".".$ext;
          $request->certificate1->move(public_path('image_data/certificate/destination'),$certificate1);
          $certificate1 = $certificate_path.$certificate1;

          $user->certificate1 = $certificate1;
       
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
}    