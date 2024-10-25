<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            ['name' => 'Admin One', 'email' => 'admin1@example.com', 'password' => bcrypt('password'), 'created_at' => now(), 'updated_at' => now()],
            // Repita para mais 9 admins
        ]);
    }
}
