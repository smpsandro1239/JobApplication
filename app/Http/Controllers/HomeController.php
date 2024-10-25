<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Job;
use App\Models\User;
use App\Models\JobApplication;


class HomeController extends Controller
{
    public function home(Request $request)
    {
        $usercount = User::count();
        $filledjobscount = JobApplication::count();

        $query = Job::query();

        $query->where(function ($q) use ($request) {
            if ($request->has('search') && !empty($request->input('search'))) {
                $searchTerm = $request->input('search');
                $searchTerms = explode(' ', $searchTerm);

                $q->where(function ($subQuery) use ($searchTerms) {
                    $first = true;
                    foreach ($searchTerms as $term) {
                        $term = trim($term);
                        if (!empty($term)) {
                            if ($first) {
                                $subQuery->where('title', 'LIKE', '%' . $term . '%');
                                $first = false;
                            } else {
                                $subQuery->orWhere('title', 'LIKE', '%' . $term . '%');
                            }
                        }
                    }
                });
            }
            if ($request->has('region') && $request->input('region') != 'Anywhere') {
                $q->orWhere('job_location', $request->input('region'));
            }

            if ($request->has('employment_status') && $request->input('employment_status') != 'Select Job Type') {
                $q->orWhere('employment_status', $request->input('employment_status'));
            }
        });

        $jobs = $query->paginate(4);

        $companiesCount = Job::distinct('company_name')->count('company_name');
        $locations = Job::distinct()->pluck('job_location');
        $employment_status = Job::distinct()->pluck('employment_status');
        $jobCount = Job::count();
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        return view('home', [
            'jobs' => $jobs,
            'filledjobscount' => $filledjobscount,
            'usercount' => $usercount,
            'companiesCount' => $companiesCount,
            'locations' => $locations,
            'employment_status' => $employment_status,
            'jobCount' => $jobCount,
            'loggedUserInfo' => $loggedUserInfo,
        ]);
    }
}
