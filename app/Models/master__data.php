<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\thrusttbl;

class master__data extends Model
{
    //
    protected $table    = "master__data";
    protected $id       = "masterid";
    protected $fillable = [
        "development_partner",
        "title",
        "description",
        "sector",
        "sub_sector",
        "scope",
        "type_of_financing",
        "sub_type",
        "minda_status",
        "project_start",
        "project_end",
        "status",
        "project_link",
        "source",
        "ma_thrust",
        "sdg_thrust",
        "pdp_thrust",
        "layertype",
        "attachedtolayer",
        "created_at",
        "updated_at"
    ];

    function agenda() {
        return $this->hasMany(thrusttbl::class);
    }
}
