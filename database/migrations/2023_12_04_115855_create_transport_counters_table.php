<?php

use App\Models\User;
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
        Schema::create('transport_counters', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id')->nullable();
            $table->string('name'); //counter name
            $table->string('driver_name');
            $table->string('address'); //counter address
            $table->string('vehicle_no'); //counter address
            $table->string('phone_no');
            $table->text('description')->nullable();
            $table->text('timing')->nullable();
            $table->boolean('is_active')->default(true);
            // $table->string('rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_counters');
    }
};
