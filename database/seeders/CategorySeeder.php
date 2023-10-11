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
        [
            'id' => 5,
            'name' => 'SPA',
            'description' => "Spa description"
        ],
        [
            'id' => 6,
            'name' => 'Salon',
            'description' => "Salon description"
        ],
        [
            'id' => 7,
            'name' => 'Salon',
            'description' => "Salon description"
        ],
        [
            'id' => 8,
            'name' => 'Trim',
            'description' => "Trim description"
        ],


    ];
    public function run(): void
    {
        Category::query()->upsert(self::DATA,'id');

        $allType = Type::query()->find(Type::ALL);
        $educationCategory = Category::query()->find(1);
        $educationCategory->types()->attach($allType);
        // $educationCategory->save();


        $menType = Type::query()->find(Type::MEN);
        $salonCategory = Category::query()->find(7);
        $salonCategory->types()->attach($menType);
        // $salonCategory->save();


        $womenType = Type::query()->find(Type::WOMEN);
        $spaCategory = Category::query()->find(5);
        $spaCategory->types()->attach($womenType);

    }
}
