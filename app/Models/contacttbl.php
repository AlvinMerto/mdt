<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contacttbl extends Model
{
    //
    protected $table    = "contacttbls";
    protected $id       = "contactid";
    protected $fillable = [
        "masterid","leadname","officeaddr","contactinfo_lead","m_e_chiefname","contactinfo_me","created_at","updated_at"
    ];

}
