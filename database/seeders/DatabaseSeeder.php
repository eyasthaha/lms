<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Course::create([
            'title' => 'Python for Beginners',
            'price' => '599',
            'description' => 'An introductory course to Python programming.',
        ]);

        Course::create([
            'title' => 'Java for Beginners',
            'price' => '799',
            'description' => 'An introductory course to Java programming.',
        ]);
        
    }
}
