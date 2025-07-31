<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterData extends Model
{
    //

    protected $table = "master_data";
    protected $id    = "masterid";
    protected $fillable = [
        'development_partner',
        'title',
        'description',
        'plan',
        'program',
        'project',
        'policy_and_procedure',
        'financial_mechanism',
        'class',
        'personal_services',
        'maintenance_and_other_operating_expense',
        'capital_outlays',
        'technical_assistance',
        'emergency_relief',
        'technical_cooperation',
        'capital_grants',
        'mixed_grants',
        'others',
        'loan',
        'sector',
        'sub_sector',
        'sector_function',
        'sub_sector_impact_output',
        'thrust_1_sdg',
        'thrust_2_bimp_eaga',
        'thrust_3_pdp_2023_2028',
        'neda_classification',
        'mindanao_9_point_agenda',
        'mindanao_2030',
        'target_location',
        'general_location',
        "status"
    ];
}
