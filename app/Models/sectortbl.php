<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sectortbl extends Model
{
    //
    protected $table = "sectortbls";
    protected $id    = "sectorid";
    protected $fillable = ["thesector","created_at","updated_at"];
}
