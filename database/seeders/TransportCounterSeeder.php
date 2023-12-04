<?php

namespace Database\Seeders;

use App\Models\TransportCounter;
use App\Models\Village;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            "id" => 1,
            'user_id' => 5,
            'name' => 'Laltea Sumo Counter',
            'driver_name' => 'Zothankima',
            'address' => 'Zarkawt Traffic Point',
            'vehicle_no' => 'MZ-002',
            'phone_no' => '4586823158',
            'description' => 'Somo Booking Available',
            'timing' => '6 am',
            'is_active' => 1,
        ],
        [
            "id" => 2,
            'user_id' => 6,
            'name' => 'Vohbik Sumo',
            'driver_name' => 'Liansanga',
            'address' => 'Chanmari Traffic Point',
            'vehicle_no' => 'MZ-003',
            'phone_no' => '7896963202',
            'description' => 'Somo Booking Available',
            'timing' => '6 am',
            'is_active' => 1,
        ],
        [
            "id" => 3,
            'user_id' => 6,
            'name' => 'Joseph Sumo Counter',
            'driver_name' => 'Robert',
            'address' => 'Millenium Traffic Point',
            'vehicle_no' => 'MZ-006',
            'phone_no' => '2301452828',
            'description' => 'Somo Booking Available',
            'timing' => '6 am',
            'is_active' => 1,
        ]
    ];
    public function run(): void
    {
        TransportCounter::query()->upsert(self::DATA, 'id');

        $villages = Village::all();

        TransportCounter::query()->each(function ($counter) use($villages) {
            $counter->counterVillages()->attach($villages->random(rand(1,5))->pluck('id')->toArray(), ['rate' => rand(300, 800)]);
        });
    }
}
