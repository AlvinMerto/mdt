<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class scoretbl extends Model
{
    //
    protected $table    = "scoretbls";
    protected $id       = "scoreid";
    protected $fillable = [
        "masterid","thescore","thesdg","created_at","updated_at"
    ];

}
