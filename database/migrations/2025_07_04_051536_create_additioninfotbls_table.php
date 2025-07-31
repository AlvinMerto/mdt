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
        Schema::create('additioninfotbls', function (Blueprint $table) {
            $table->increments("addinfoid");
            $table->integer("masterid");
            $table->string("briefers");
            $table->string("photos");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additioninfotbls');
    }
};
