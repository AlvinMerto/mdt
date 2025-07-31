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
        Schema::create('the_values', function (Blueprint $table) {
            $table->increments("valuesid");
            $table->string('fkoutputid');
            $table->string("baseline");
            $table->string("target");
            $table->string("frequency");
            $table->string("type");
            $table->integer("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('the_values');
    }
};
