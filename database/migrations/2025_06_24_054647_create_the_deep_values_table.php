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
        Schema::create('the_deep_values', function (Blueprint $table) {
            $table->increments("dv_id");
            $table->integer("fkoutputid");
            $table->string("thedisaggregation");
            $table->string("baseline");
            $table->string("target");
            $table->string("thestatus");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_deep_values');
    }
};
