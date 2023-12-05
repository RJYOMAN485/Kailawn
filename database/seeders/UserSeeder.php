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
            'name' => 'school2',
            'email' => 'school2@email.com',
            'password' => 'password',
            'role_id' => Role::SCHOOL
        ],
        [
            'id' => 5,
            'name' => 'Joseph Counter',
            'email' => 'counter@email.com',
            'password' => 'password',
            'role_id' => Role::COUNTER
        ],
        [
            'id' => 6,
            'name' => 'Vohbik Counter',
            'email' => 'counter2@email.com',
            'password' => 'password',
            'role_id' => Role::COUNTER
        ],
        [
            'id' => 7,
            'name' => 'Medical User',
            'email' => 'medical@email.com',
            'password' => 'password',
            'role_id' => Role::MEDICAL
        ],
        [
            'id' => 8,
            'name' => 'Medical User2',
            'email' => 'medical2@email.com',
            'password' => 'password',
            'role_id' => Role::MEDICAL
        ],
        [
            'id' => 9,
            'name' => 'Beauty Admin',
            'email' => 'beauty@email.com',
            'password' => 'password',
            'role_id' => Role::BEAUTY
        ],
        [
            'id' => 10,
            'name' => 'Beauty Admin2',
            'email' => 'beauty2@email.com',
            'password' => 'password',
            'role_id' => Role::BEAUTY
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
