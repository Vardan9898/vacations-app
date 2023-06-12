<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class VacationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $users = User::where('is_manager', false)->get();

        foreach ($users as $user) {
            $user->vacations()->create([
                'start_at' => $faker->dateTimeBetween('-50 days', '-30 days')->format('Y-m-d'),
                'end_at' => $faker->dateTimeBetween('-20 days', 'now')->format('Y-m-d'),
            ]);
        }
    }
}
