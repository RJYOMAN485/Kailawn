<?php

namespace Database\Seeders;

use App\Models\TransportRental;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportRentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            "id" => 1,
            'name' => 'RR Car Rental',
            'vehicle_type' => 'LMV',
            'vehicle' => 'Seltos',
            'seat_capacity' => '4',
            'carrier' => 'Available',
            'registration' => 'MZ 04 7822',
            'rate' => '1000',
            'owner' => 'Lalsiamkima',
            'address' => 'Mission Veng',
            'phone_no' => '8596562021',
        ]
    ];
    public function run(): void
    {
        TransportRental::query()->upsert(self::DATA,'id');
    }
}
