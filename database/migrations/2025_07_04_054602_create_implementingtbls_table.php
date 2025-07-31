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
        Schema::create('implementingtbls', function (Blueprint $table) {
            $table->increments("impid");
            $table->integer("masterid");
            $table->string("leadagency");
            $table->string("region_national");
            $table->string("otherpartneragency");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('implementingtbls');
    }
};
