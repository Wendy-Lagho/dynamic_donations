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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('description'); // Consider using text if descriptions are long
            $table->string('unit_of_measure');
            $table->integer('minimum_stock_level')->unsigned(); // Assuming stock levels are positive integers
            $table->integer('maximum_stock_level')->unsigned();
            $table->integer('shelf_life')->nullable(); // Assuming shelf life is a duration in days; make nullable if not always applicable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};