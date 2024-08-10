<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Resource routes for Students and Teachers
Route::resource('students', StudentController::class);
Route::resource('teachers', TeacherController::class);

// Welcome page route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
Auth::routes();

// Home route for authenticated users
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
