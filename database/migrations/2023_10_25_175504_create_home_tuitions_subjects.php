<?php

use App\Models\HomeTuition;
use App\Models\Subject;
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
        Schema::create('home_tuitions_subjects', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(HomeTuition::class,'home_tuition_id');
            $table->foreignIdFor(Subject::class,'subject_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_tuitions_subjects');
    }
};
