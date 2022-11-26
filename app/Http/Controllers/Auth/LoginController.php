<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected function authenticated(Request $request, $user)
    {
        if($request->role!=$user->role){
            auth()->logout();
            return redirect()->back()->with(['message' => 'No User Found.', 'message_type' => 'danger']);
        }
        if($user->email_verification==0){
            $role = $user->role;
            auth()->logout();
            return redirect()->route('login_role',$role)->with(['message' => 'E-mail has not been verified yet.', 'message_type' => 'danger']);
        }

        if($user->status==0){
            $role = $user->role;
            auth()->logout();
            return redirect()->route('login_role',$role)->with(['message' => 'Account Deactivated by Admin.', 'message_type' => 'danger']);
        }

        if($user->role=='destination'){
            if(Auth::user()->step==1){
                return redirect()->route('destination.register.step1');
            }elseif(Auth::user()->step==2){
                return redirect()->route('destination.register.step2');
            }elseif(Auth::user()->step==3){
                return redirect()->route('destination.register.step3');
            }
           return redirect()->route('destination.home');      
        }elseif($user->role=='pioneer'){
            if(Auth::user()->step==1){
                return redirect()->route('destination.register.step1');
            }elseif(Auth::user()->step==2){
                return redirect()->route('destination.register.step2');
            }elseif(Auth::user()->step==3){
                return redirect()->route('destination.register.step3');
            }
           return redirect()->route('pioneer.home');
        }elseif($user->role=='admin'){
            return redirect()->route('admin.dashboard');
        }else{
            return redirect('/');
        }
        
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function showLoginForm($role=null){

        return view('customAuth.modules.login')->with('role',$role);
    }

    public function home_page(){        
        return view('home_page');
    }

    

    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }





}
