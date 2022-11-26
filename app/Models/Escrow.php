<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
class Escrow extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "escrows";

    public function job(){
      return $this->hasOne('App\Models\Job','_id','job_id');
    }
    
}
