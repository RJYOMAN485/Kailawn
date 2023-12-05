<?php

namespace Database\Seeders;

use App\Models\Medical;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medical::truncate();
        for ($i=0; $i < 10; $i++) {
            Medical::query()->create([
                'user_id' => rand(7,8),
                'doctor_name' => fake()->name,
                'specialization_id' => rand(1,20),
                'appointment_type' => rand(0,1) ? 'house_call' : 'clinic_booking',
                'clinic_name' => fake()->streetName.' Clinic',
                'address' => fake()->address,
                'phone_no' => fake()->phoneNumber,
                'fee' => rand(0,1) ? 500 : 1000,
                'timing' => '10am to 4pm'
            ]);
        }
    }
}
