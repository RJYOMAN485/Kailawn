<?php

use App\Models\Division;
use App\Models\Grade;
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
        Schema::create('home_tuitions', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable();
            $table->string('tutor_name')->nullable();
            $table->string('timing')->nullable();
            $table->text('fees_structure')->nullable();
            $table->string('contact')->nullable();
            $table->text('tutor_description')->nullable();
            $table->text('description')->nullable();
            $table->string('tutor_qualification')->nullable();
            $table->text('special_subject')->nullable();

            // $table->foreignIdFor(Grade::class,'grade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_tuitions');
    }
};
