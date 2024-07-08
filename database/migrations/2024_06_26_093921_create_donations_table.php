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
                
        // Schema::dropIfExists('donations');

        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('need_id');
            $table->date('donation_date');
            $table->unsignedInteger('quantity'); 
            $table->string('unit', 50); 
            $table->string('status', 20)->default('pending');
            $table->boolean('receipt_sent')->default(false);
            $table->text('comments')->nullable();
            $table->boolean('admin_approved')->default(false);
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('need_id')->references('id')->on('needs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
