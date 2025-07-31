<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheOutput extends Model
{
    //
    protected $table        = "the_outputs";
    protected $id           = "outputid";
    protected $fillable     = [
        "fkoutcomeid",
        "kpi",
        "theweight",
        "frequency",
        "thetype",
        "theyear",
        "thelocation",
        "baseline",
        "target",
        "status",
        "definition",
        "source",
        "created_at",
        "updated_at"
    ];

}
