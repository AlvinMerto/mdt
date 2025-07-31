<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class implementingtbl extends Model
{
    //
    protected $table    = "implementingtbls";
    protected $id       = "impid";
    protected $fillable = [
        "masterid","leadagency","region_national","otherpartneragency","created_at","updated_at"
    ];
}
