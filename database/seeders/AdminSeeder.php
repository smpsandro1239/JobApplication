<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'Admin One',
                'email' => 'admin1@example.com',
                'password' => Hash::make('password1'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Two',
                'email' => 'admin2@example.com',
                'password' => Hash::make('password2'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Three',
                'email' => 'admin3@example.com',
                'password' => Hash::make('password3'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Four',
                'email' => 'admin4@example.com',
                'password' => Hash::make('password4'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Five',
                'email' => 'admin5@example.com',
                'password' => Hash::make('password5'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Six',
                'email' => 'admin6@example.com',
                'password' => Hash::make('password6'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Seven',
                'email' => 'admin7@example.com',
                'password' => Hash::make('password7'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Eight',
                'email' => 'admin8@example.com',
                'password' => Hash::make('password8'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Nine',
                'email' => 'admin9@example.com',
                'password' => Hash::make('password9'),
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Admin Ten',
                'email' => 'admin10@example.com',
                'password' => Hash::make('password10'),
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
