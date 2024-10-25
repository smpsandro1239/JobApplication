<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;

use App\Models\JobApplication;
use App\Models\SavedJob;

class JobController extends Controller
{
    // app/Http/Controllers/JobController.php
    public function show($id)
    {
        // Fetch the job using the given id
        $job = Job::findOrFail($id);

        // Find related jobs with the same title (excluding the current job)
        $relatedJobs = Job::where('title', $job->title)->where('id', '!=', $id)->get();

        // Count the number of related jobs
        $relatedJobCount = $relatedJobs->count();

        // Check if the user is logged in
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        // Initialize variables for saved and applied status
        $isSaved = false; // Default to false if not logged in
        $isApplied = false; // Default to false if not logged in

        // If the user is logged in, check their saved and applied status
        if ($loggedUserInfo) {
            $isSaved = SavedJob::where('user_id', $loggedUserInfo->id)->where('job_id', $job->id)->exists();
            $isApplied = JobApplication::where('user_id', $loggedUserInfo->id)->where('job_id', $job->id)->exists();
        }

        // Return the job details view and pass the job, related jobs, and count
        return view('jobdetail', compact('job', 'relatedJobs', 'relatedJobCount', 'loggedUserInfo', 'isSaved', 'isApplied'));
    }
}
