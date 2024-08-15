<?php

use App\Http\Controllers\TrackController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// start lab 1
Route::get('/users', function(){
    $users=[
        ['id'=>1,'name'=>'noha','age'=>23],
        ['id'=>2,'name'=>'ameera','age'=>25],
        ['id'=>3,'name'=>'ahmed','age'=>30],
    ];
    return view('usersData',['users'=>$users]);
});
Route::get('/users/{id}', function ($id){
    $users=[
        ['id'=>1,'name'=>'noha','age'=>23],
        ['id'=>2,'name'=>'ameera','age'=>25],
        ['id'=>3,'name'=>'ahmed','age'=>30],
    ];
    $user = $users[$id-1] ?? null;
    
    if (!$user) {
        return abort(404);
    }
    return view('userDetails',['user'=>$user]);
});
// end lab 1

// start lab 2
Route::get('/tracks',[TrackController::class,'track'])->name('tracks.data');
Route::get('/tracks/{id}',[TrackController::class,'viewTrack'])->name('track.view');
Route::delete('/tracks/{id}', [TrackController::class,'destroyTrack'])->name('track.destroy');
// end lab 2