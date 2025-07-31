<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class financetbl extends Model
{
    //
    protected $table    = "financetbls";
    protected $id       = "fid";
    protected $fillable = [
        "masterid","amountdisbursed","created_at","updated_at"
    ];
}
