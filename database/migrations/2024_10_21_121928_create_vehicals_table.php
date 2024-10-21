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
        Schema::create('vehicals', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., Toyota, Ford
            $table->string('model'); // e.g., Camry, Mustang
            $table->string('color'); // e.g., Camry, Mustang
            $table->year('year'); // e.g., 2020, 2021
            $table->string('vin')->unique(); // Vehicle Identification Number
            $table->enum('status', ['available', 'sold', 'maintenance']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicals');
    }
};
