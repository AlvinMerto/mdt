<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class theprojectsupdates extends Model
{
    //
    protected $table    = "theprojectsupdates";
    protected $id       = "updateid";
    protected $fillable = [
        "masterid","updatefrom","theupdate","created_at","updated_at"
    ];
}
