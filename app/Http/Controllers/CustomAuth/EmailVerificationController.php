<?php

namespace App\Http\Controllers\CustomAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;
use Illuminate\Support\Str;
use App\User;

class EmailVerificationController extends Controller
{
	
	public function email_verify($token){
        $user = User::where('email_token',$token);
        if($user->count() > 0){
        	$user = $user->first();
        	$role=$user->role;
        	if($user->email_verification==0){
        		$user->email_verification = 1;
        		$user->save();
        		return redirect()->route('login_role',$role)->with(['message' => 'E-mail Verified Successfully.', 'message_type' => 'success']);
                
        	}
        	return abort(404);
        }else{
        	return abort(404);
        }
    }

}