<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class CmsPage extends Eloquent
{
    protected $connection = 'mongodb';
    protected $table = "cms_pages";
}
