<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            'id' => 1,
            'name' => 'Education',
            'description' => "Education for all"
        ],
        [
            'id' => 2,
            'name' => 'Medical',
            'description' => "Medical description"
        ],
        [
            'id' => 3,
            'name' => 'Beauty',
            'description' => "Beauty Description"
        ],
        [
            'id' => 4,
            'name' => 'Transport',
            'description' => "Transport Description"
        ],
    ];
    public function run(): void
    {
        Category::query()->upsert(self::DATA,'id');

        $menType = Type::query()->firstWhere('code','MEN');

        $educationCategory = Category::query()->find(1);

        $educationCategory->types()->attach($menType);
    }
}
