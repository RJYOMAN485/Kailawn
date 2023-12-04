<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\HomeTuition;
use App\Models\Qualification;
use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeTuitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeTuition::truncate();
        for ($i = 0; $i < 20; $i++) {
            HomeTuition::query()->create([
                'name' => fake()->name . 'Home Tuition',
                'address' => fake()->address,
                'tutor_name' => fake()->name,
                'timing' => '10:00 am - 6:00 am',
                'fees_structure' => '1. Middle School Rs.200,High School',
                'contact' => fake()->phoneNumber,
                'tutor_description' => fake()->sentence,
                'description' => 'Home Tuition Available',
                'tutor_qualification' => Subject::inRandomOrder()->first()->name,
                'special_subject' => Subject::inRandomOrder()->first()->name,
            ]);
        }




        $grades = Grade::all();
        $subjects = Subject::all();

        HomeTuition::query()->each(function($tuition) use($grades,$subjects){
            // info($subjects->random(1,5)->pluck('id')->toArray());
            // $tuition->grades()->attach($grades->whereIn('id',[5,6,7])->random(rand(1,3))->pluck('id')->toArray());
            $tuition->subjects()->attach($subjects->random(rand(1,3))->pluck('id')->toArray());
        });
    }
}
