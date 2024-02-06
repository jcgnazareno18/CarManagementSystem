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
        Schema::create('models', function (Blueprint $table) {
            $table->id("model_id");
            $table->string("name");
            $table->string("body_style");
            $table->unsignedBigInteger("option_id");
            $table->unsignedBigInteger("brand_id");
            $table->timestamps();
            $table->foreign("option_id")->references("option_id")->on('options')->onDelete('cascade');
            $table->foreign("brand_id")->references("brand_id")->on('brands')->onDelete('cascade');
      });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
