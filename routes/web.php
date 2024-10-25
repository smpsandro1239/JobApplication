<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/job/{id}', [JobController::class, 'show'])->name('jobdetail');


Route::post('/save', [UserController::class, 'save'])->name('save');
Route::post('/check', [UserController::class, 'check'])->name('check');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [UserController::class, 'profile'])->name('profile');

Route::get('/editprofile', [UserController::class, 'editProfile'])->name('editProfile');
Route::post('/update-user', [UserController::class, 'update'])->name('update-user');

Route::get('/upload-cv', [UserController::class, 'uploadCV'])->name('uploadCV');
Route::post('/upload-cv', [UserController::class, 'updateCV'])->name('update-cv');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/save-job', [UserController::class, 'savejob'])->name('savejob');
Route::post('/apply', [UserController::class, 'apply'])->name('apply');
