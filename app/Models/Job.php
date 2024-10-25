<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected $fillable = [
        'title',
        'company_name',
        'job_summary',
        'published_on',
        'vacancy',
        'employment_status',
        'experience',
        'job_location',
        'salary',
        'image',
        'gender',
        'application_deadline',
        'region_or_remote',
        'admin_id', // Assuming you want to save the admin_id as well
    ];

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }
}
