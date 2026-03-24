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
        Schema::create('beneficiariestbls', function (Blueprint $table) {
            $table->increments("benid");
            $table->string("masterid");
            $table->string("numofbene");
            $table->string("typeofbene");
            $table->string("demographics");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiariestbls');
    }
};
