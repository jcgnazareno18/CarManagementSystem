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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id("purchase_id");
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("inventory_id");
            $table->timestamps();

            $table->foreign("customer_id")->references("customer_id")->on("customers")->onDelete("cascade");
            $table->foreign("inventory_id")->references("inventory_id")->on("inventories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
