<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Master_Data extends Model
{
    protected $table    = "master__data";
    protected $id       = "masterid";
    protected $fillable = [
        "development_partner",
        "title",
        "description",
        "sector",
        "sub_sector",
        "scope",
        "exactaddr",
        "brgy",
        "muni_city",
        "prov",
        "reg",
        "briefers",
        "m_e",
        "logframe",
        "hgdg_score",
        "cost_att_gender_us",
        "tagging",
        "climate_change",
        "women",
        "pwds",
        "ip",
        "type_of_financing",
        "sub_type",
        "loan",
        "grant",
        "update_as_of",
        "implementing_agency",
        "region_national",
        "other_partner_agency",
        "project_start",
        "project_end",
        "status",
        "project_link",
        "source",
        "create_at",
        "updated_at"
    ];
}
