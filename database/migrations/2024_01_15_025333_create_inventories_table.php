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
        Schema::dropIfExists('inventories');
        Schema::create('inventories', function (Blueprint $table) {
            $table->id("inventory_id");
            $table->unsignedBigInteger("vehicle_id");
            $table->timestamps();

            $table->foreign("vehicle_id")->references("vehicle_id")->on("vehicles")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
