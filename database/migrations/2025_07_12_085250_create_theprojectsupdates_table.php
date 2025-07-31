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
        Schema::create('theprojectsupdates', function (Blueprint $table) {
            $table->increments("updateid");
            $table->string("masterid");
            $table->string("updatefrom");
            $table->string("theupdate")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theprojectsupdates');
    }
};
