<?php

use App\Models\Specialization;
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
            $table->string('doctor_name');
            $table->foreignIdFor(Specialization::class,'specialization_id');
            $table->enum('appointment_type',['house_call','clinic_booking']);
            $table->mediumText('clinic_name');
            $table->mediumText('address');
            $table->string('fee');
            $table->string('timing');
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
