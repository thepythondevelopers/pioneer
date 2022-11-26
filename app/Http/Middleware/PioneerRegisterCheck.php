<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class PioneerRegisterCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
          if(!Auth::check()){
               return redirect()->route('home_page');
          }

          if(Auth::user()->role!='pioneer'){
               return redirect()->route('home_page');
          }
          if(Auth::user()->status==0){
            $role = Auth::user()->role;
                auth()->logout();
            return redirect()->route('login_role',$role)->with(['message' => 'Account Deactivated by Admin.', 'message_type' => 'danger']);
        }

           if(Auth::user()->step==0){
               return redirect()->route('pioneer.home');     
            }
 
           


        return $next($request);
    }
}
