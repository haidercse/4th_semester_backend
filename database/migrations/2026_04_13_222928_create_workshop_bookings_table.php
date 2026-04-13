<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('workshop_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->date('booking_date');
            $table->integer('guests'); // ড্রপডাউন থেকে (১, ২, ৩)
            $table->text('additional_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workshop_bookings');
    }
};
