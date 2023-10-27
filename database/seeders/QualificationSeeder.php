<?php

namespace Database\Seeders;

use App\Models\Qualification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
  {
    $qualifications = [
      [
        'id' => 1,
        'name' => 'Primary School',
      ],
      [
        'id' => 2,
        'name' => 'Middle School',
      ],
      [
        'id' => 3,
        'name' => 'High Schook',
      ],
      [
        'id' => 4,
        'name' => 'Higher Secondary School',
      ],
      [
        'id' => 5,
        'name' => 'Graduate',
      ],
      [
        'id' => 6,
        'name' => 'Post Graduate',
      ],
      [
        'id' => 7,
        'name' => 'Diploma & Other Qualifications',
      ],
      [
        'id' => 8,
        'name' => 'Hindi',
      ],
    ];

    Qualification::query()->upsert($qualifications,'id');
  }
}
