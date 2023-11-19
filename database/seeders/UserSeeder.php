<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    const DATA = [
        [
            'id' => 1,
            'name' => 'Rja',
            'email' => 'rja@gmail.com',
            'password' => 'password',
            'role_id' => Role::USER
        ],
        [
            'id' => 2,
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => 'password',
            'role_id' => Role::SUPER_ADMIN
        ],
        [
            'id' => 3,
            'name' => 'school',
            'email' => 'school@email.com',
            'password' => 'password',
            'role_id' => Role::SCHOOL
        ],
        [
            'id' => 4,
            'name' => 'beauty',
            'email' => 'beauty@email.com',
            'password' => 'password',
            'role_id' => Role::SCHOOL
        ]
    ];
    public function run(): void
    {
        // User::query()->upsert(self::DATA,'id');
        User::truncate();

        for ($i = 0; $i < count(self::DATA); $i++) {
            User::query()->create(self::DATA[$i]);
            // User::query()->create(self::DATA[1]);
        }
    }
}
