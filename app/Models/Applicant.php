<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Applicant extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "applicants";

    public function applicant(){
      return $this->hasOne('App\User','_id','submit_by');
    }

    public function job(){
      return $this->hasOne('App\Models\Job','_id','job_id');
    }

    public function proposal_to_user(){
        return $this->hasOne('App\User','_id','proposal_to');
    }

    public function applicant_chat(){
        return $this->hasMany('App\Models\Chat','applicant_id','_id')->orderBy('created_at');
    }
}
