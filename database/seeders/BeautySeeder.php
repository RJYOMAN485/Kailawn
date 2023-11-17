<?php

namespace Database\Seeders;

use App\Models\Beauty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeautySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            'id' => 1,
            'name' => 'Rini Beauty',
            'address' => 'Chaltlang',
            'phone_no' => '4585896565',
            'description' => 'Hair/Face/Massage Available',
            'is_active' => 1,
            'type' => 'house_call',
        ],
        [
            'id' => 2,
            'name' => 'Siami Beauty',
            'address' => 'Ramhlun Veng',
            'phone_no' => '1265235785',
            'description' => 'Hair/Face/Massage/Spa Available',
            'is_active' => 1,
            'type' => 'booking',
        ],
    ];
    public function run(): void
    {
        Beauty::query()->upsert(self::DATA, 'id');
    }
}
