<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sub_financing extends Model
{
    //
    protected $table = "sub_financings";
    protected $id    = "subfinanceid";
    protected $fillable = ["subfinance","created_at","updated_at"];

}
