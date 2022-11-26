<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;
use App\Models\Service;
use App\Mail\EmailVerification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{
    public $path ='customAuth.modules.';

    public function destination_register(){                  
     return view($this->path.'destination_register');
   } 

    public function destination_register_save(Request $request)
    {
        
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $email_token = Str::random(40);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'destination';
        $user->email_verification = 0; //0=>False 1=>True/Active
        $user->email_token = $email_token ;
        $user->status = 1;
        $user->step = 1;
        $user->save();
        Mail::to($request->email)->send(new EmailVerification($email_token,$request->first_name,$request->last_name));
        $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
            return redirect()->route('destination.register.step1')->with(['message' => 'E-mail has been sent on your id for verification.', 'message_type' => 'error']);
        }
        
        
    }

    public function checkUserEmail(Request $request){

        $user = User::where('email',$request->email);
        echo $text = $user->count() > 0 ? 'false' : 'true';
    }

    public function pioneer_register(){                  
     return view($this->path.'pioneer_register');
   } 

    public function pioneer_register_save(Request $request)
    {
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $email_token = Str::random(40);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'pioneer';
        $user->email_verification = 0; //0=>False 1=>True/Active
        $user->email_token = $email_token ;
        $user->status = 1;
        $user->step = 1;
        $user->save();
        Mail::to($request->email)->send(new EmailVerification($email_token,$request->first_name,$request->last_name));
        $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
            return redirect()->route('pioneer.register.step1')->with(['message' => 'E-mail has been sent on your id for verification.', 'message_type' => 'error']);
        }
        
        
    }
}
