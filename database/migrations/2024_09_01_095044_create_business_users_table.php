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
        Schema::create('business_users', function (Blueprint $table) {
            // $table->id();

            // $table->timestamps();
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('business_name');
            $table->string('business_type');
            $table->string('business_registration_number');
            $table->string('tax_identification_number');
            $table->string('website_url')->nullable();
            $table->string('contact_person_name');
            $table->string('contact_person_phone_number');
            $table->string('contact_person_email');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_users');
    }
};
