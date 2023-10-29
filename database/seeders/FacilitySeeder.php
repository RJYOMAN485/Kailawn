<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            'id' => 1,
            'name' => 'Hostel',
        ],
        [
            'id' => 2,
            'name' => 'Play Ground',
        ],
        [
            'id' => 3,
            'name' => 'Cafeteria',
        ],
    ];
    public function run(): void
    {
        Facility::query()->upsert(self::DATA, 'id');
    }
}
