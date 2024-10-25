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
            // Repita para mais 9 registros de empregos salvos
        ]);
    }
}
