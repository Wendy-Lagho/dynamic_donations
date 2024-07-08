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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('need_id')->constrained();
            $table->string('payment_id');
            $table->string('payer_id');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('payer_email');
            $table->string('payer_name');
            $table->string('payer_surname');
            $table->string('payer_address');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
