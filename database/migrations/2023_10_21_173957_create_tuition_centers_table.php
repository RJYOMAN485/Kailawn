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
            $table->string('name')->nullable();
            $table->string('timing')->nullable();
            $table->mediumText('address')->nullable();
            $table->text('description')->nullable();
            $table->string('contact')->nullable();
            $table->text('rules_regulations')->nullable();
            $table->text('fees_structure')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('facebook_link')->nullable();
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
