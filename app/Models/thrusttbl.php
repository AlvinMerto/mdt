<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class thrusttbl extends Model
{
    //
    protected $table = "thrusttbls";
    protected $id    = "thrustid";
    protected $fillable = [
        "masterid","darr","women","pwds","ips","ma_thrust","created_at","updated_at"
    ];

    function masterdata() {
        return $this->belongsTo(master__data::class);
    }

}
