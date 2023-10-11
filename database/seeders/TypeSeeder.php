<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            'id' => 1,
            'code' => 'MEN',
            'name' => 'Men',
        ],
        [
            'id' => 2,
            'code' => 'WOMEN',
            'name' => 'Women',
        ],
    ];
    public function run(): void
    {
        Type::query()->upsert(self::DATA,'code');
    }
}
