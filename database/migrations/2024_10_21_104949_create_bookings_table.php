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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('E_mail');
            $table->string('phone');
            $table->string('NIC');
            $table->string('booking_date');
            $table->unsignedBigInteger('car_id'); // step one for create foring key
            $table->unsignedBigInteger('user_id'); // step one for create foring key
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade'); // step tow for create foring key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // step tow for create foring key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};