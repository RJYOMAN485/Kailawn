<?php

namespace Database\Seeders;

use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            "id" => 1,
            "name" => "Aizawl",
        ],
        [
            "id" => 2,
            "name" => "Dinhmunzawl",
        ],
        [
            "id" => 3,
            "name" => "Keifang",
        ],
        [
            "id" => 4,
            "name" => "Hnahthial",
        ],
        [
            "id" => 5,
            "name" => "West Phaileng",
        ],
    ];
    public function run(): void
    {
        Village::query()->upsert(self::DATA, 'id');
    }
}
