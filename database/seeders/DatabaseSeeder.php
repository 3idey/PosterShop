<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\PosterSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'phone_number' => '01234567890',
                'address' => '123 Admin St',
                'city' => 'Cairo',
                'is_admin' => true,
            ]
        );

        // Regular user
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'phone_number' => '01111111111',
                'address' => '123 Test St',
                'city' => 'Giza',
                'is_admin' => false,
            ]
        );

        $this->call([
            PosterSeeder::class,
        ]);
    }
}
