<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class the_deep_values extends Model
{
    //
    protected $table    = "the_deep_values";
    protected $id       = "dv_id";
    protected $fillable = [
        "fkoutputid","thedisaggregation","baseline","target","thestatus","created_at","updated_at"
    ];
}