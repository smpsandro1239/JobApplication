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
                'expires_at' => '2024-12-31',
            ],
            [
                'title' => 'Data Analyst',
                'company_name' => 'Data Insights Co.',
                'image' => 'images/jobs/data_analyst.png',
                'job_summary' => 'Join our data-driven team to extract meaningful insights.',
                'published_on' => '2024-10-05',
                'vacancy' => 1,
                'employment_status' => 'Part-time',
                'experience' => '2+ years',
                'job_location' => 'San Francisco, CA',
                'salary' => '65000',
                'gender' => 'Any',
                'application_deadline' => '2024-11-10',
                'region_or_remote' => 'Remote',
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                'expires_at' => '2025-12-31',
            ],
            [
                'title' => 'Frontend Developer',
                'company_name' => 'Creative Solutions',
                'image' => 'images/jobs/frontend_developer.png',
                'job_summary' => 'Looking for a creative frontend developer with an eye for design.',
                'published_on' => '2024-10-10',
                'vacancy' => 3,
                'employment_status' => 'Full-time',
                'experience' => '1+ years',
                'job_location' => 'Austin, TX',
                'salary' => '75000',
                'gender' => 'Any',
                'application_deadline' => '2024-12-01',
                'region_or_remote' => 'On-site',
                'admin_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
                'expires_at' => '2026-12-31',
            ],
            // Adicione mais registros conforme necessário
        ]);
    }
}
