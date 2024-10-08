<?php

use App\Http\Controllers\TrackController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tracks',TrackController::class);
Route::resource('courses',CourseController::class);
Route::resource('students',StudentController::class);
