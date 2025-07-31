<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theregion_polys extends Model
{
    //
    protected $table    = "theregion_polys";
    protected $id       = "polyid";
    protected $fillable = [
        "region","polygon","created_at","updated_at"
    ];
}
