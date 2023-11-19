<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    //  const SUPER_ADMIN = 1;
    // //  const ADMIN = 2;
    //  const USER = 3;
    //  const SCHOOL = 4;

    //  const BEAUTY = 5;



    const ROLES = [
        [
            'id' => 1,
            'name' => 'Super Admin'
        ],
        [
            'id' => 3,
            'name' => 'User'
        ],
        [
            'id' => 4,
            'name' => 'School'
        ],
        [
            'id' => 5,
            'name' => 'Beauty'
        ],
    ];
    public function run(): void
    {
        Role::query()->upsert(self::ROLES,'id');
    }
}
