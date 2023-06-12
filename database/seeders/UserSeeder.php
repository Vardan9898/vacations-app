<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'email' => 'worker@example.com',
                'is_manager' => false,
            ],
            [
                'email' => 'manager@example.com',
                'is_manager' => true,
            ],
        ];

        foreach ($usersData as $data) {
            User::factory(1)->create([
                'email' => $data['email'],
                'password' => bcrypt('password'),
                'is_manager' => $data['is_manager'],
            ]);
        }

        User::factory(20)->create([
            'is_manager' => false,
        ]);
    }
}
