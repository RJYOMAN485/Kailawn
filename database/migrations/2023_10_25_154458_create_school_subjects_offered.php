<?php

use App\Models\School;
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
        Schema::create('school_subjects_offered', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(School::class,'school_id')->nullable();
            $table->foreignIdFor(Subject::class,'subject_id')->nullable();
            $table->boolean('admission_open')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_streams');
    }
};
