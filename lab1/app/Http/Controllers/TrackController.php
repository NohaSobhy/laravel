<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{
    function track() {
        // $tracks=DB::table('tracks')->get(); // for DB
        $tracks=Track::all(); // for Model

        // return view("tracksData",['tracks'=>$tracks]); // for BD
        return view ('tracksData',compact('tracks')); // for Model
    }

    function viewTrack($id) {
        $track=Track::find($id);
        return view('trackDetails',compact('track'));
    }

    function destroyTrack($id){
        $trackDes=Track::findOrFail($id);
        $trackDes->delete();
        return to_route('tracks.data');
    }

    function create(){
        return view('trackCreate');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'location' => 'required|string',
        'supervisor' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $path = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

    Track::create([
        'name' => $request->input('name'),
        'location' => $request->input('location'),
        'supervisor' => $request->input('supervisor'),
        'image' => $path,
    ]);

    return redirect()->route('tracks.data');
}

}

