<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
class Invoice extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "invoices";

    public function job(){
      return $this->hasOne('App\Models\Job','_id','job_id');
    }
    
}
