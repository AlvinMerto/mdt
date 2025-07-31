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
        Schema::create('thrusttbls', function (Blueprint $table) {
            $table->increments("thrustid");
            $table->integer("masterid");
            $table->string("darr");   // disaster and risk reduction
            $table->string("women");
            $table->string("pwds");
            $table->string("ips");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thrusttbls');
    }
};
