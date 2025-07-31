<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\TheValues;

class TheOutcome extends Model
{
    //
    protected $table    = "the_outcomes";
    protected $id       = "outcomeid";
    protected $fillable = [
        "fkagendaid","theoutcome","thevalue","status","created_at","updated_at"
    ];

    function get_values() {
        return $this->hasMany(TheValues::class,"valuesid","outcomeid");
    }
}
