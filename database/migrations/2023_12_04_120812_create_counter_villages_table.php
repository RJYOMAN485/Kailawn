<?php

use App\Models\TransportCounter;
use App\Models\Village;
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
        Schema::create('counter_villages', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(TransportCounter::class,'counter_id');
            $table->foreignIdFor(Village::class,'village_id');
            $table->string('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_villages');
    }
};
