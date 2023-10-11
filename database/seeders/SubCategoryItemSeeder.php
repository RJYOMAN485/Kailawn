<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use App\Models\SubCategoryItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // $table->foreignIdFor(SubCategory::class,'sub_category_id')->nullable()->constrained()->onDelete('cascade');
    // $table->text('name')->nullable();
    // $table->text('description')->nullable();
    // $table->string('contact')->nullable();


    const DATA = [
        [
            'name' => 'ABC Home Clinic',
            'sub_category_id' => 1,
            'description' => 'ABC Home Clinic Description',
        ],
        [
            'name' => 'TZA Online Clinic',
            'sub_category_id' =>  2,
            'description' => 'TZA Online Clinic Description',
        ],
    ];
    public function run(): void
    {
        SubCategoryItem::query()->upsert(self::DATA,'id');
    }
}
