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
        Schema::create('options', function (Blueprint $table) {
            $table->id("option_id");
            $table->string("color");
            $table->string("transmission");
            $table->unsignedBigInteger("transmission_supplier_id");
            $table->string("engine");
            $table->unsignedBigInteger("engine_supplier_id");
            $table->timestamps();
            $table->foreign('transmission_supplier_id')->references('suppliers_id')->on('suppliers')->onDelete('cascade');
            $table->foreign('engine_supplier_id')->references('suppliers_id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options');
    }
};
