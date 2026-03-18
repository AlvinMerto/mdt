<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportGeneration extends Model
{
    //

    protected $table      = "report_generations";
    protected $primaryKey = "reportid";
    protected $fillable   = [
        "outcomeid","empid","thetitle","thereport","thefile","status","created_at","updated_at"
    ];
}
