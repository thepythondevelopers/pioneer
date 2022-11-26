<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Service extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "services";
}
