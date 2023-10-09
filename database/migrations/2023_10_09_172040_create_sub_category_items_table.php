<?php

use App\Models\SubCategory;
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
        Schema::create('sub_category_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(SubCategory::class,'sub_category_id')->constrained()->onDelete('cascade');
            $table->text('descriptions')->nullable();
            $table->enum('book_type',['offline','online']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_category_items');
    }
};
