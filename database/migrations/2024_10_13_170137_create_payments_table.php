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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('order_id');
            $table->string('payment_method');  // e.g., 'credit card', 'paypal', 'cash'
            $table->decimal('amount', 10, 2);  // Payment amount
            $table->string('payment_status')->default('pending');  // e.g., 'pending', 'completed', 'failed'
            $table->timestamp('payment_date')->nullable();
            $table->string('transaction_id')->nullable();  // Payment gateway transaction ID
            $table->timestamps();

            // Foreign key references
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
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
