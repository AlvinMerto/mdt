<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevPartners extends Model
{
    //
    protected $table    = "dev_partners";
    protected $id       = "id";
    protected $fillable = [
        "devpartner","abbr","logo","pin","created_at","updated_at"
    ];
}
