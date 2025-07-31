<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacroIndicators extends Model
{
    //
    protected $table    = "macro_indicators";
    protected $id       = "ma_id";
    protected $fillable = [
        "ma_id","theindicator","ma_value","smalltext","trend","theyear","status","created_at","updated_at"
    ];
}
