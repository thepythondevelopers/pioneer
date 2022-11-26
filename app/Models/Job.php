<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
class Job extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "jobs";

    public function created_user(){
      return $this->hasOne('App\User','_id','created_by');
    }

    public function hire_user(){
      return $this->hasOne('App\User','_id','hire_person');
    }

    public function pioneer_applicant_user(){
      return $this->hasOne('App\Models\Applicant','job_id','_id')->where('submit_by',Auth::user()->_id); 
    }

    public function hire_user_applicant(){
      return $this->hasOne('App\Models\Applicant','job_id','_id')->where('submit_by',$this->hire_person);
    }

    public function total_amount_spent(){
      return \App\Models\Invoice::where('job_id',$this->_id)->where('paid',1)->get()->sum('total_amount');
    }
}
