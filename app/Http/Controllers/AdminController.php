<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Job;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function updateApplicationStatus(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'status' => 'required|in:Pending,Accepted,Rejected', // Validate status input
        ]);

        // Find the application and update the status
        $application = JobApplication::findOrFail($id);
        $application->status = $request->status;
        $application->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Application status updated successfully!');
    }

    public function deleteJob($id)
    {
        // Check if admin is logged in
        if (!session()->has('LoggedAdminInfo')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please log in first.']);
        }

        // Find the job by ID and delete it
        $job = Job::find($id);

        if ($job) {
            $job->delete(); // Perform the delete operation
            return redirect()->back()->with('success', 'Job deleted successfully.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Job not found.']);
        }
    }
    public function storeJob(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'job_summary' => 'required|string',
            'published_on' => 'required|date',
            'vacancy' => 'required|integer',
            'employment_status' => 'required|string|max:255',
            'experience' => 'required|integer',
            'job_location' => 'required|string|max:255',
            'salary' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|string|max:255',
            'application_deadline' => 'required|date',
            'region_or_remote' => 'required|string|max:255',
        ]);

        // Handle the file upload for the job image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('job_images', 'public');
        }

        // Create a new job
        Job::create([
            'title' => $request->title,
            'company_name' => $request->company_name,
            'job_summary' => $request->job_summary,
            'published_on' => $request->published_on,
            'vacancy' => $request->vacancy,
            'employment_status' => $request->employment_status,
            'experience' => $request->experience,
            'job_location' => $request->job_location,
            'salary' => $request->salary,
            'image' => $imagePath ?? null, // Store image path if exists
            'gender' => $request->gender,
            'application_deadline' => $request->application_deadline,
            'region_or_remote' => $request->region_or_remote,
        ]);

        // Redirect back to the jobs page with success message
        return redirect()->route('admin.jobs')->with('success', 'Job added successfully!');
    }





    public function dashboard()
    {
        // Check if admin is logged in
        if (!session()->has('LoggedAdminInfo')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please log in first.']);
        }

        // Fetch the logged-in admin details
        $adminId = session('LoggedAdminInfo');
        $admin = Admin::find($adminId);

        // Fetch all job applications with related user and job details
        $applications = JobApplication::with('user', 'job')->get();

        // Pass the admin information and applications to the view
        return view('admin.application', [
            'admin' => $admin,
            'LoggedAdminInfo' => session('LoggedAdminInfo'),
            'applications' => $applications, // Pass applications here
        ]);
    }


    public function jobApplications()
    {
        // Check if the admin is logged in
        if (!session()->has('LoggedAdminInfo')) {
            return redirect()->route('admin.login')->withErrors(['error' => 'Please log in first.']);
        }

        // Fetch all job applications
        $jobs = Job::all();  // Fetch all jobs from the Job model

        // Pass the applications to the view
        return view('admin.jobs', compact('jobs'));
    }
    public function logout(Request $request)
    {
        // Clear the admin session data
        if (session()->has('LoggedUserInfo')) {
            session()->forget('LoggedUserInfo');
        }
        // Clear all session data
        session()->flush();


        // Optionally clear all session data
        // Session::flush();

        // Redirect to the login page
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    public function showLogin()
    {
        return view('admin.login');
    }


    public function checkLogin(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to find the admin by email
        $admin = Admin::where('email', $request->email)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // Correct credentials, store admin in session
            session(['LoggedAdminInfo' => $admin->id]);

            // Redirect to admin dashboard or some other page
            return redirect()->route('admin.dashboard');
        } else {
            // Invalid credentials, redirect back with an error
            return back()->withErrors(['error' => 'Invalid email or password.']);
        }
    }
}
