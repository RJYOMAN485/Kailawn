<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Medical;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 'full_name',
        // 'phone_no',
        // 'address',
        // 'age',
        // 'timing',
        // 'category_name',
        // 'user_id',
        // 'booking_date',
        // 'status',
        // 'is_paid'

        $medical = Medical::find(1);

        $booking = Booking::query()->create([
            'full_name' => 'Test Booker',
            'user_id' => 1,
            'phone_no' => '825886551',
            'address' => 'College Veng',
            'age' => '38',
            'timing' => 'morning',
            'category_name' => 'Medical',
            'booking_date' => '2023-11-20',
            'status' => 'completed',
            'is_paid' => 1,
        ]);

        $booking->owner()->associate($medical);

        $booking->save();
    }
}
