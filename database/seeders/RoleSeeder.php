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

    const ROLES = [
        [
            'id' => 1,
            'name' => 'Admin'
        ],
        [
            'id' => 2,
            'name' => 'School'
        ],
    ];
    public function run(): void
    {
        Role::query()->upsert(self::ROLES,'id');
    }
}
