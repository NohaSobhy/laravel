<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TracksController;
use App\Http\Controllers\StudentsController;


Route::get('/', function () {
    return view('welcome');
});
// Tracks Table
Route::get('/tracks',[TracksController::class,'index'])->name('tracks.index');
Route::get('/tracks/create',[TracksController::class,'create'])->name('tracks.create');
Route::post('/tracks/store',[TracksController::class,'store'])->name('tracks.store');
Route::delete('/tracks/{id}', [TracksController::class,'destroy'])->name('track.destroy');

// Students Table
Route::get('/students',[StudentsController::class,'index'])->name('students.index');
Route::get('/students/create',[StudentsController::class,'create'])->name('students.create');
Route::post('/students/store',[StudentsController::class,'store'])->name('students.store');
Route::delete('/students/{id}', [StudentsController::class,'destroy'])->name('student.destroy');