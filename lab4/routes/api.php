<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get
('/hiApi',function()
{
    return "Hi From Api";
});

Route::apiResource('students',StudentController::class);