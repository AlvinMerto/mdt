<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class additioninfotbl extends Model
{
    //

    protected $table    = "additioninfotbls";
    protected $id       = "addinfoid";
    protected $fillable = [
        "masterid","briefers","photos","created_at","updated_at"
    ];
}
