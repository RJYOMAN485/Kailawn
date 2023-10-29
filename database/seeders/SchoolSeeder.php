<?php

namespace Database\Seeders;

use App\Models\Facility;
use App\Models\School;
use App\Models\Subject;
use App\Models\TuitionCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        School::truncate();

        for ($i = 0; $i < 20; $i++) {
            School::query()->create([
                'name' => fake()->name . 'School',
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

        $subjects = Subject::all();
        $facilities = Facility::all();

        School::query()->each(function($school) use($subjects,$facilities){
            // info($subjects->random(1,5)->pluck('id')->toArray());
            $school->subjectsOffered()->attach($subjects->whereIn('id',[1,2,3])->random(rand(1,3))->pluck('id')->toArray());
            $school->facilities()->attach($facilities->random(rand(1,3))->pluck('id')->toArray());

        });

    }


}
