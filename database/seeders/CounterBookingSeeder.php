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
            'counter_id' => 2,
            'user_id' => 5,
            'village_id' => 1,
            'seat_no' => 1,
            'rate' => 600,
            'booking_date' => '2023-12-04',
            'notes' => 'Heavy bag',
            'status' => 'pending'
        ],
        [
            "id" => 2,
            'counter_id' => 3,
            'user_id' => 5,
            'village_id' => 1,
            'seat_no' => 2,
            'rate' => 500,
            'booking_date' => '2023-12-06',
            'notes' => 'Heavy bag',
            'status' => 'approved'
        ],
    ];
    public function run(): void
    {
        CounterBooking::truncate();
        CounterBooking::query()->upsert(self::DATA, 'id');
    }
}
