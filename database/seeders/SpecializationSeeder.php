<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        ['name' => 'Cardiologist'],
        ['name' => 'Dermatologist'],
        ['name' => 'Endocrinologist'],
        ['name' => 'Gastroenterologist'],
        ['name' => 'Hematologist'],
        ['name' => 'Neurologist'],
        ['name' => 'Oncologist'],
        ['name' => 'Ophthalmologist'],
        ['name' => 'Orthopedic Surgeon'],
        ['name' => 'Otolaryngologist (Ear, Nose, and Throat Specialist)'],
        ['name' => 'Pediatrician'],
        ['name' => 'Psychiatrist'],
        ['name' => 'Pulmonologist (Respiratory Specialist)'],
        ['name' => 'Radiologist'],
        ['name' => 'Urologist'],
        ['name' => 'Nephrologist (Kidney Specialist)'],
        ['name' => 'Rheumatologist (Arthritis Specialist)'],
        ['name' => 'Allergist/Immunologist'],
        ['name' => 'Gynecologist/Obstetrician'],
        ['name' => 'Anesthesiologist'],
    ];
    public function run(): void
    {
        Specialization::query()->upsert(self::DATA,'name');
    }
}
