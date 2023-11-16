<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Qualification;
use App\Models\School;
use App\Models\Specialization;
use App\Models\TuitionCenter;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            GradeSeeder::class,
            SubjectSeeder::class,
            HomeTuitionSeeder::class,
            TuitionCenterSeeder::class,
            FacilitySeeder::class,
            SchoolSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SpecializationSeeder::class,
            MedicalSeeder::class,
            UserSeeder::class,

        ]);
    }
}
