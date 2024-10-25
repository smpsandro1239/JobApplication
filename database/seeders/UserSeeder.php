<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'description' => 'Senior Developer',
                'designation' => 'Developer',
                'password' => bcrypt('password'),
                'email' => 'johndoe@example.com',
                'facebook' => 'https://facebook.com/johndoe',
                'linkedin' => 'https://linkedin.com/in/johndoe',
                'twitter' => 'https://twitter.com/johndoe',
                'picture' => 'images/users/johndoe.png',
                'cv' => 'documents/cvs/johndoe.pdf',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Repita para mais 9 usuários
        ]);
    }
}
