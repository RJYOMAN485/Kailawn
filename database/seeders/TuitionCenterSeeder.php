<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Subject;
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



        $grades = Grade::all();
        $subjects = Subject::all();

        TuitionCenter::query()->each(function($tuition) use($grades,$subjects){
            // info($subjects->random(1,5)->pluck('id')->toArray());
            // $tuition->grades()->attach($grades->whereIn('id',[5,6,7])->random(rand(1,3))->pluck('id')->toArray());
            $tuition->subjects()->attach($subjects->random(rand(1,3))->pluck('id')->toArray());
        });
    }
}
