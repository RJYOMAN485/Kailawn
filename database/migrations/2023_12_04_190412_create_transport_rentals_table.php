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
        Schema::create('transport_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('vehicle_type');
            $table->string('vehicle');
            $table->string('seat_capacity');
            $table->string('carrier');
            $table->string('registration');
            $table->string('rate');
            $table->string('owner');
            $table->string('address');
            $table->boolean('is_active')->default(true);
            $table->string('phone_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_rentals');
    }
};
