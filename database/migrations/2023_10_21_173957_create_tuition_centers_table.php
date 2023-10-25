<?php

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
        Schema::create('tuition_centers', function (Blueprint $table) {
            $table->id();
            $table->string('timing');
            $table->mediumText('address');
            $table->string('contact');
            $table->text('rules_regulations');
            $table->text('fees_structure');
            $table->string('email');
            $table->string('instagram_link');
            $table->string('youtue_link');
            $table->string('facebook_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tuition_centers');
    }
};
