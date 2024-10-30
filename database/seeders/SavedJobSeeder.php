<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SavedJobSeeder extends Seeder
{
    public function run()
    {
        DB::table('saved_jobs')->insert([
            [
                'user_id' => 1,
                'job_id' => 1,
                'saved_on' => now(),
            ],
            [
                'user_id' => 1,
                'job_id' => 2,
                'saved_on' => now(),
            ],
            [
                'user_id' => 2,
                'job_id' => 1,
                'saved_on' => now(),
            ],
            [
                'user_id' => 3,
                'job_id' => 3,
                'saved_on' => now(),
            ],
            [
                'user_id' => 2,
                'job_id' => 3,
                'saved_on' => now(),
            ],
            [
                'user_id' => 3,
                'job_id' => 2,
                'saved_on' => now(),
            ],
            [
                'user_id' => 4,
                'job_id' => 1,
                'saved_on' => now(),
            ],
            [
                'user_id' => 4,
                'job_id' => 3,
                'saved_on' => now(),
            ],
            [
                'user_id' => 5,
                'job_id' => 2,
                'saved_on' => now(),
            ],
            [
                'user_id' => 3,
                'job_id' => 1,
                'saved_on' => now(),
            ],
        ]);
    }
}
