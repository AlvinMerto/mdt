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
        Schema::create('contacttbls', function (Blueprint $table) {
            $table->increments("contactid");
            $table->integer("masterid");
            $table->string("leadname");
            $table->string("officeaddr");
            $table->string("contactinfo_lead");
            $table->string('m_e_chiefname');
            $table->string("contactinfo_me");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacttbls');
    }
};
