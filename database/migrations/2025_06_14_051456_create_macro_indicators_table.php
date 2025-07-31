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
        Schema::create('macro_indicators', function (Blueprint $table) {
            $table->increments("ma_id");
            $table->string("theindicator");
            $table->string("ma_value");
            $table->string("smalltext");
            $table->enum("trend", ["down","up"])->default("down");
            $table->string("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macro_indicators');
    }
};
