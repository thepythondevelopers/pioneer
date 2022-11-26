<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Auth\Passwords\CanResetPassword;
use Auth;
use Illuminate\Support\Facades\Mail;

class User extends Eloquent implements Authenticatable,CanResetPasswordContract
{
    use AuthenticatableTrait;
    use Notifiable;
    use CanResetPassword;

    

    protected $connection = 'mongodb';
    //use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token){ // $this->notify(new MyCustomResetPasswordNotification($token)); <--- remove this line, use Mail instead like below:

    $data = [ $this->email ]; 
    Mail::send('emails.reset-password', [ 'name' => $this->name, 'reset_url' => route('password.reset', ['token' => $token, 'email' => $this->email]), ], function($message) use($data){ $message->subject('Reset Password Request'); $message->to($data[0]); }); }

    public function pioneer_previous_jobs(){
      return \App\Models\Job::where('hire_person',$this->_id)->count();
    }

    public function rating_count(){
        $r =  \App\Models\Rating::where('to',$this->_id)->get()->avg('rating');
        
        return $r ;
         
    }
}
