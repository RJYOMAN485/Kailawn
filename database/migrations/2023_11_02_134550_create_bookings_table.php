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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id');
            $table->string('full_name');
            $table->string('phone_no');
            $table->mediumText('address');
            $table->string('age');
            $table->enum('timing',['morning','afternoon']);
            $table->date('booking_date');
            $table->string('category_name');
            $table->enum('status',['pending','completed']);
            $table->nullableMorphs('owner');
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
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
