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
        // Drop the table if it exists
        Schema::dropIfExists('needs');

                
        Schema::create('needs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('need_name', 100); // Specify maximum length for consistency
            $table->unsignedInteger('quantity_required'); // Ensure only positive values
            $table->boolean('fulfilled')->default(false); // Boolean field to indicate if the need is fulfilled
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('needs');
    }
};
