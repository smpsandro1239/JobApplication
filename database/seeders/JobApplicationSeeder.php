<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobApplicationSeeder extends Seeder
{
    public function run()
    {
        DB::table('job_applications')->insert([
            [
                'user_id' => 1,
                'job_id' => 1,
                'applied_on' => now(),
                'status' => 'Pending',
            ],
            // Repita para mais 9 candidaturas
        ]);
    }
}
