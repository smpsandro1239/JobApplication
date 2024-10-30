<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Chame os seeders específicos
        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            JobSeeder::class,
            JobApplicationSeeder::class,
            SavedJobSeeder::class,
        ]);
    }
}
