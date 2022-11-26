<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
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
     
        
        if(Auth::user() && Auth::user()->role=='destination'){
           if(Auth::user()->step==1){
                return redirect()->route('destination.register.step1');
            }elseif(Auth::user()->step==2){
                return redirect()->route('destination.register.step2');
            }elseif(Auth::user()->step==3){
                return redirect()->route('destination.register.step3');
            }

           return redirect()->route('destination.home'); 
        }

        if(Auth::user() && Auth::user()->role=='pioneer'){
           if(Auth::user()->step==1){
                return redirect()->route('pioneer.register.step1');
            }elseif(Auth::user()->step==2){
                return redirect()->route('pioneer.register.step2');
            }elseif(Auth::user()->step==3){
                return redirect()->route('pioneer.register.step3');
            }
           return redirect()->route('pioneer.home'); 
        }

        if(Auth::user() && Auth::user()->role=='admin'){
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
