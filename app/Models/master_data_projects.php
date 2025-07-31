<?php

namespace App\Models;

use App\Models\DevPartners;
use Illuminate\Database\Eloquent\Model;

class master_data_projects extends Model
{
    protected $table    = "master_data_projects";
    protected $id       = "md_projects";
    protected $fillable = [
        'master_dataid',
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
