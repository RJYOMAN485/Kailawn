<?php

namespace Database\Seeders;

use App\Models\CounterBooking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CounterBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            "id" => 1,
            'counter_id' => 1,
            'user_id' => 5,
            'village_id' => 1,
            'seat_no' => 1,
            'rate' => 600,
            'booking_date' => '2023-12-04',
            'notes' => 'Heavy bag'
        ]
    ];
    public function run(): void
    {
        CounterBooking::query()->upsert(self::DATA, 'id');
    }
}
