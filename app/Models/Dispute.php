<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Auth;
class Dispute extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "disputes";


    
}
