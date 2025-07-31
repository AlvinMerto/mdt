<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\TheOutcome;

class TheAgenda extends Model
{
    //
    protected $table    = "the_agendas";
    protected $id       = "agendaid";
    protected $fillable = [
        "agendatitle","agendaname","thegoal","thequote","status","thelogo","created_at","updated_at"
    ];

    public function get_outcomes() {
        return $this->hasMany(TheOutcome::class,"fkagendaid","agendaid");
    }
}
