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
       
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id("vehicle_id");
            $table->string("vin");
            $table->unsignedBigInteger("model_id");
            $table->unsignedBigInteger("dealer_id");
            $table->integer("price");
            $table->timestamps();
            $table->foreign("model_id")->references("model_id")->on('models')->onDelete('cascade');
            $table->foreign("dealer_id")->references("dealer_id")->on('dealers')->onDelete('cascade');
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
