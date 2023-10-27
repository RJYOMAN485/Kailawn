<?php

use App\Models\Subject;
use App\Models\TuitionCenter;
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
        Schema::create('tuition_centers_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TuitionCenter::class,'tuition_center_id');
            $table->foreignIdFor(Subject::class,'subject_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuition_centers_subjects');
    }
};
