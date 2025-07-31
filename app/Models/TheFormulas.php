<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TheFormulas extends Model
{
    //

    function weighted_value() { 
       // return "((the_values.current-the_values.baseline)/(the_values.target-the_values.baseline)*100)*the_outputs.theweight"; 
       return "((the_values.current-the_deep_values.baseline)/(the_deep_values.target-the_deep_values.baseline)*100)*the_outputs.theweight"; 
    }

    function achievement_percentage_value() {
         return "(the_values.current-the_deep_values.baseline)/(the_deep_values.target-the_deep_values.baseline)*100";
    }
}
