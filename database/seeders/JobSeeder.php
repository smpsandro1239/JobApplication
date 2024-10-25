<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'title' => 'Software Engineer',
                'company_name' => 'Tech Innovations',
                'image' => 'images/jobs/software_engineer.png',
                'job_summary' => 'We are looking for a skilled software engineer.',
                'published_on' => '2024-10-01',
                'vacancy' => 2,
                'employment_status' => 'Full-time',
                'experience' => '3+ years',
                'job_location' => 'New York, NY',
                'salary' => '90000',
                'gender' => 'Any',
                'application_deadline' => '2024-11-01',
                'region_or_remote' => 'Remote',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Repita para mais 9 empregos
        ]);
    }
}
