<?php

use App\Models\TransportCounter;
use App\Models\User;
use App\Models\Village;
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
        Schema::create('counter_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TransportCounter::class,'counter_id');
            $table->foreignIdFor(User::class,'user_id');
            $table->foreignIdFor(Village::class,'village_id');
            $table->string('seat_no');
            $table->string('rate');
            $table->date('booking_date');
            $table->mediumText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_bookings');
    }
};
