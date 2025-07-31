<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('master_data_projects', function (Blueprint $table) {
            $table->increments("md_projects");
            $table->string("master_dataid");
            $table->string('title');
            $table->string('description');
            $table->string('plan');
            $table->string('program');
            $table->string('project');
            $table->string('policy_and_procedure');
            $table->string('financial_mechanism');
            $table->string('class');
            $table->string('personal_services');
            $table->string('maintenance_and_other_operating_expense');
            $table->string('capital_outlays');
            $table->string('technical_assistance');
            $table->string('emergency_relief');
            $table->string('technical_cooperation');
            $table->string('capital_grants');
            $table->string('mixed_grants');
            $table->string('others');
            $table->string('loan');
            $table->string('sector');
            $table->string('sub_sector');
            $table->string('sector_function');
            $table->string('sub_sector_impact_output');
            $table->string('thrust_1_sdg');
            $table->string('thrust_2_bimp_eaga');
            $table->string('thrust_3_pdp_2023_2028');
            $table->string('neda_classification');
            $table->string('mindanao_9_point_agenda');
            $table->string('mindanao_2030');
            $table->string('target_location');
            $table->string('general_location');
            $table->enum("status",["pipeline","on-going","completed","on-hold"]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_data_projects');
    }
};
