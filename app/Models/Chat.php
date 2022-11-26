<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Chat extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "chats";

    public function sendTo_user(){
      return $this->hasOne('App\User','_id','send_to');
    }

    public function sendBy_user(){
      return $this->hasOne('App\User','_id','send_by');
    }

    public function job(){
      return $this->hasOne('App\Models\Job','_id','job_id');
    }

    public function applicant(){
     return $this->hasOne('App\Models\Applicant','_id','applicant_id'); 
    }

/*    public function applicant(){
     return $this->hasOne('App\Models\Applicant','_id','applicant_id')->orderBy('created_at')->groupBy('applicant_id'); 
    }*/
}
