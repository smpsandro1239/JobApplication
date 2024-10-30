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
            [
                'user_id' => 2,
                'job_id' => 1,
                'applied_on' => now(),
                'status' => 'Accepted',
            ],
            [
                'user_id' => 3,
                'job_id' => 2,
                'applied_on' => now(),
                'status' => 'Rejected',
            ],
            // Adicione mais registros conforme necessário
        ]);
    }
}
