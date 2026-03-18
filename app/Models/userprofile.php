<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userprofile extends Model
{
    //
    protected $table      = "userprofiles";
    protected $primaryKey = "profileid";
    protected $fillable   = [
        "userid","agencyid","powerlevel","created_at","updated_at"
    ];

    // power level
    // 0 = super administrator regardless of the agency id
    // 1 = administrator respective to the agency id
}
