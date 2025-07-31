<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class geolocation extends Model
{
    //
    protected $table    = "geolocation";
    protected $id       = "geolocationid";
    protected $fillable = ["md_projectsid","lat","lng","columnplace","typeofobj","updated_at","created_at"];
}
