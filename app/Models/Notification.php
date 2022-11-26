<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Notification extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "notifications";

    public function sendByUser(){
        return $this->hasOne('App\User','_id','by');
    }

    public function applicant(){
        return $this->hasOne('App\Models\Applicant','_id','applicant_id');
    }

    public function job(){
        return $this->hasOne('App\Models\Job','_id','job_id');
    }


}
