<?php

namespace Database\Seeders;

use App\Models\Transport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //         name
        // address
        // type
        // description
        // is_active
        for ($i = 0; $i < 10; $i++) {
            $rand = rand(0, 1) ? 'Counter' : 'Rental';
            Transport::query()->create([
                'name' => fake()->name . $rand,
                'fee' => '200',
                'user_id' => $i == 0 ? 3 : null,
                'address' => fake()->address,
                'type' => $rand == 'Counter' ? 'counter' : 'rental',
                'phone_no' => fake()->phoneNumber,
                'description' => $rand == 'Counter' ? 'Sumo Booking Available' : 'Car/Bike Rental Available',
            ]);
        }
    }
}
