<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobApplication;
use App\Models\SavedJob;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function savejob(Request $request)
    {
        // Check if the user is logged in
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        // If user is not logged in, redirect to the login page with an error message
        if (!$loggedUserInfo) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to go to this page.']);
        }

        // Validate the incoming request
        $request->validate([
            'job_id' => 'required|exists:jobs,id', // Assuming you have a jobs table
        ]);

        // Create a new saved job entry
        SavedJob::create([
            'user_id' => $loggedUserInfo->id,
            'job_id' => $request->job_id,
            'saved_on' => now(), // Save the current timestamp
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Job saved successfully.');
    }

    public function apply(Request $request)
    {
        // Check if the user is logged in
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        // If user is not logged in, redirect to the login page with an error message
        if (!$loggedUserInfo) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to go to this page.']);
        }

        // Validate the incoming request
        $request->validate([
            'job_id' => 'required|exists:jobs,id', // Assuming you have a jobs table
        ]);

        // Create a new job application entry
        JobApplication::create([
            'user_id' => $loggedUserInfo->id,
            'job_id' => $request->job_id,
            'applied_on' => now(), // Save the current timestamp
            'status' => 'pending', // Set the initial status
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Job application submitted successfully.');
    }

    public function updateCV(Request $request)
    {
        // Validate the incoming request for CV upload
        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:2048', // Validate for CV (PDF)
            'id' => 'required|exists:users,id' // Ensure user ID is provided
        ]);

        // Find the user by ID
        $user = User::find($request->id);

        // Handle CV upload
        if ($request->hasFile('cv')) {
            // Store the CV file in the public storage
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $user->cv = $cvPath; // Assuming there's a 'cv' field in your users table
        }

        // Save the changes to the database
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'CV uploaded successfully.');
    }

    public function uploadCV()
    {
        // Check if user is logged in
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        // If user is not logged in, redirect to the login page with an error message
        if (!$loggedUserInfo) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to go to this page.']);
        }

        // Return the profile view with user info if logged in
        return view('uploadCV', compact('loggedUserInfo'));
    }

    public function update(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255', // Add designation validation
            'description' => 'nullable|string|max:1000',
            'facebook' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // File validation
        ]);

        // Find the user by ID
        $user = User::find($request->id);

        // Update the user's information
        $user->name = $request->name;
        $user->designation = $request->designation; // Update designation

        // Update other fields
        $user->description = $request->description;
        $user->facebook = $request->facebook;
        $user->linkedin = $request->linkedin;
        $user->twitter = $request->twitter;

        // Handle profile picture upload
        if ($request->hasFile('picture')) {
            // Assuming you have a public/images folder for storing pictures
            $filePath = $request->file('picture')->store('images', 'public');
            $user->picture = $filePath; // Assuming there's a 'picture' field in your users table
        }

        // Save the changes to the database
        $user->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'User information updated successfully.');
    }

    public function editProfile()
    {
        // Check if user is logged in
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        // If user is not logged in, redirect to the login page with an error message
        if (!$loggedUserInfo) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to go to this page.']);
        }

        // Return the profile view with user info if logged in
        return view('editProfile', compact('loggedUserInfo'));
    }

    public function profile()
    {
        // Check if user is logged in
        $loggedUserInfo = session('LoggedUserInfo') ? User::find(session('LoggedUserInfo')) : null;

        // If user is not logged in, redirect to the login page with an error message
        if (!$loggedUserInfo) {
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to go to this page.']);
        }

        // Retrieve saved jobs and applied jobs
        $savedJobs = SavedJob::where('user_id', $loggedUserInfo->id)->with('job')->get();
        $appliedJobs = JobApplication::where('user_id', $loggedUserInfo->id)->with('job')->get();

        // Return the profile view with user info, saved jobs, and applied jobs
        return view('profile', compact('loggedUserInfo', 'savedJobs', 'appliedJobs'));
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function save(Request $request)
    {
        // Validar os dados do formulário
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'telefone' => 'required|string|max:15',
            'curso' => 'required|string|max:255',
            'graduation_year' => 'required|integer|digits:4|lt:' . (date('Y') + 4),
            'designation' => 'nullable|string|max:255',
            'curriculo' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Ajustando a validação para o ano de conclusão
        ], [
            'graduation_year.required' => 'O ano de conclusão é obrigatório.',
            'graduation_year.integer' => 'O ano de conclusão deve ser um número.',
            'graduation_year.digits' => 'O ano de conclusão deve ter 4 dígitos.',
            'graduation_year.gt' => 'O ano de conclusão deve ser superior a 1900.',
            'graduation_year.lt' => 'O ano de conclusão não pode ser maior que ' . (date('Y') + 3) . '.',
        ]);

        // Criar um novo registro de usuário
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);  // Hash a senha
        $user->telefone = $validatedData['telefone'];
        $user->curso = $validatedData['curso'];
        $user->ano_conclusao = $validatedData['graduation_year'];
        $user->designation = $validatedData['designation'];

        if ($request->hasFile('curriculo')) {
            $curriculoPath = $request->file('curriculo')->store('curriculos', 'public');
            $user->cv = $curriculoPath;
        }

        $user->save();


        // Redirect or show success message
        return redirect()->route('register')->with('success', 'Registro realizado com sucesso.');
    }



    public function check(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12', // Ensure password meets length requirements
        ]);

        // Retrieve user information based on the email
        $userInfo = User::where('email', $request->email)->first();

        // Check if user exists
        if (!$userInfo) {
            return back()->withInput()->withErrors(['email' => 'Email not found']);
        }

        // Verify the password
        if (!Hash::check($request->password, $userInfo->password)) {
            return back()->withInput()->withErrors(['password' => 'Incorrect password']);
        }

        // Store user info in session
        session([
            'LoggedUserInfo' => $userInfo->id,
            'LoggedUserName' => $userInfo->name,
        ]);

        // Redirect to home page
        return redirect()->route('home');
    }

    public function logout()
    {
        // Check if the user is logged in
        if (session()->has('LoggedUserInfo')) {
            session()->forget('LoggedUserInfo');
        }
        // Clear all session data
        session()->flush();

        // Redirect to home page
        return redirect()->route('home');
    }
}
