<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_sectortbl extends Model
{
    //
    protected $table = "sub_sectortbls";
    protected $id    = "subsectorid";
    protected $fillable = ["thesubsector","created_at","updated_at"];

}
