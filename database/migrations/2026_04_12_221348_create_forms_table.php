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
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('header_name')->nullable();
            $table->string('name')->nullable();
            $table->string('text')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('footer_details')->nullable();
            $table->string('year_text')->nullable();
            $table->string('price')->nullable();
            $table->string('explore_dhamrai _clay_heritage_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
