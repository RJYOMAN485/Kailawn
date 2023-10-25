<?php

use App\Models\School;
use App\Models\Stream;
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
        Schema::create('admissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(School::class,'school_id')->nullable();
            $table->foreignIdFor(Subject::class,'subject_id')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->date('dob');
            $table->string('contact');
            $table->string('present_address');
            $table->string('district');
            $table->string('class');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('fathers_contact');
            $table->string('mothers_contact');
            $table->string('last_school');
            $table->string('last_passed');
            $table->string('last_board');
            $table->string('division');
            $table->string('percentage');
            $table->string('major_core');


            $table->enum('status',['submitted','approved','rejected']);
            $table->boolean('is_paid')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
