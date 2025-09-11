<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

class UniversalFunction extends Model
{
    function canEdit() {
        return true;
    }
}
