<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Rating extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "ratings";



}
