<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    //  $table->foreignIdFor(Category::class,'category_id')->constrained()->onDelete('cascade');
    //         $table->string('name')->nullable();
    //         $table->string('description')->nullable();
    // $table->enum('book_type',['offline','online']);

    const DATA = [
        [
            'id' => 1,
            'name' => 'House Call',
            'description' => 'House Call booking',
            'category_id' => 2,
            'book_type' => 'offline'
        ],
        [
            'id' => 2,
            'name' => 'Clinic Booking',
            'category_id' => 2,
            'book_type' => 'online',
            'description' => 'House Call booking'
        ],
    ];
    public function run(): void
    {
        SubCategory::query()->upsert(self::DATA,'id');
    }
}
