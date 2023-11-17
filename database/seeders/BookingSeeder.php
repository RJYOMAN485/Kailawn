<?php

namespace Database\Seeders;

use App\Models\Beauty;
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
        Booking::truncate();
        $medical = Medical::find(1);
        $medicalBooking = Booking::query()->create([
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
        $medicalBooking->owner()->associate($medical);
        $medicalBooking->save();

        //Beauty
        $beauty = Beauty::find(1);
        $beautyBooking = Booking::query()->create([
            'full_name' => 'Beauty Booker',
            'user_id' => 1,
            'phone_no' => '2563987465',
            'address' => 'College Veng',
            'age' => '38',
            'timing' => 'morning',
            'category_name' => 'Beauty',
            'booking_date' => '2023-11-20',
            'status' => 'completed',
            'is_paid' => 1,
        ]);
        $beautyBooking->owner()->associate($beauty);
        $beautyBooking->save();
    }
}
