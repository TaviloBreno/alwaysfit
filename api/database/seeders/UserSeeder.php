<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->hasTrainings(5)
            ->hasNutritionPlans(3)
            ->create([
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
            ]);
    }
}
