<?php

namespace Database\Seeders;

use App\Models\TuitionCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TuitionCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        TuitionCenter::truncate();

        for ($i = 0; $i < 20; $i++) {
            TuitionCenter::query()->create([
                'name' => fake()->name . 'Center',
                'timing' => '10:00 am - 6:00 am',
                'address' => fake()->address,
                'contact' => fake()->phoneNumber,
                'description' => 'Home Tuition Available',

                'rules_regulations' => fake()->sentence,
                'fees_structure' => '1. Middle School Rs.200,High School',
                'email' => fake()->email,
                'instagram_link' => fake()->url,
                'youtube_link' => fake()->url,
                'facebook_link' => fake()->url,
            ]);
        }
    }
}
