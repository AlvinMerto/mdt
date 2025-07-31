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
        Schema::create('master__data', function (Blueprint $table) {
            $table->increments("masterid");
            $table->integer("development_partner");
            $table->string("title");
            $table->string("description");
            $table->string("sector")->nullable();
            $table->string("sub_sector")->nullable();
            $table->string("scope")->nullable();
            $table->string("exactaddr")->nullable();
            $table->string("brgy")->nullable();
            $table->string("muni_city")->nullable();
            $table->string("province")->nullable();
            $table->string("region")->nullable();
            $table->string("briefers")->nullable();
            $table->string("m_e")->nullable();
            $table->string("logframe")->nullable();
            $table->string("hgdg_score")->nullable();
            $table->string("cost_att_gender_us")->nullable();
            $table->string("tagging")->nullable();
            $table->string("climate_change")->nullable();
            $table->string("women")->nullable();
            $table->string("pwds")->nullable();
            $table->string("ip")->nullable();
            $table->string("type_of_financing")->nullable();
            $table->string("sub_type")->nullable();
            $table->string("loan")->nullable();
            $table->string("grant")->nullable();
            $table->string("update_as_of")->nullable();
            $table->string("implementing_agency")->nullable();
            $table->string("region_national")->nullable();
            $table->string("other_partner_agency")->nullable();
            $table->string("project_start")->nullable();
            $table->string("project_end")->nullable();
            $table->string("status")->nullable();
            $table->string("project_link")->nullable();
            $table->string("source")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master__data');
    }
};
