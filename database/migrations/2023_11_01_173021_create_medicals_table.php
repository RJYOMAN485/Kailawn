<?php

use App\Models\Specialization;
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
        Schema::create('medicals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class,'user_id')->nullable();
            $table->string('doctor_name')->nullable();
            $table->foreignIdFor(Specialization::class,'specialization_id')->nullable();
            $table->enum('appointment_type',['house_call','clinic_booking'])->nullable();
            $table->mediumText('clinic_name')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('fee')->nullable();
            $table->string('timing')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicals');
    }
};
