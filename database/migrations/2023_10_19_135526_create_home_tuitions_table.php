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
            $table->string('address');
            $table->string('tutor_name');
            // $table->string('timing');
            $table->text('fees_structure');
            $table->string('contact');
            $table->text('tutor_description');
            $table->text('description');
            $table->string('tutor_qualification');
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
