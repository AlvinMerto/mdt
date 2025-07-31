<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheValues extends Model
{
    //
    protected $table    = "the_values";
    protected $id       = "valuesid";
    protected $fillable = [
        "fkoutputid",
        "fkdeepvalueid",
        "fkoutcomeid",
        "thekpi",
        "baseline",
        "current",
        "target","frequency","type","theyear","thelocation","status","created_at","updated_at"
    ];

}
