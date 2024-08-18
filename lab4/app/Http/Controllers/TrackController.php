<?php

namespace App\Http\Controllers;

use App\Models\Track;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tracks=Track::paginate(5);
        return view('tracks.index',compact('tracks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tracks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveImages($request)
    {
        if ($request->hasFile('logo')) {
            $image=$request->file('logo');
            $filePath=$image->store('track_images','track_uploads');
            return $filePath;
        }
        return null;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:tracks|min:2',
            'about'=>'required|unique:tracks|min:5|max:100'
        ],[
            'name.unique'=>'this name is used before',
            'name.min'=>'minimum length is 2 letters',
            'about.unique'=>'this description is used before',
            'about.min'=>'minimum length is 5 letter',
            'about.max'=>'maximum length is 100 letters'
        ]);
        $logoPath=$this->saveImages($request);
        $requestData=$request->all();
        $requestData['logo']=$logoPath;
        $track=Track::create($requestData);
        return to_route('tracks.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Track $track)
    {
        return view('tracks.show',compact('track'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Track $track)
    {
        return view('tracks.edit',compact('track'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Track $track)
    {
        $request->validate([
            'name'=>'required|min:2',
            'about'=>'required|min:5|max:100',
        ],[
            'name.min'=>'minimum length is 2 letters',
            'about.min'=>'minimum length is 5 letter',
            'about.max'=>'maximum length is 100 letters',
        ]);
        $logoPath=$this->saveImages($request);
        $requestData=$request->all();
        $requestData['logo']=$logoPath;
        $track->update($requestData);
        return to_route('tracks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Track $track)
    {
        $track->delete();
        return to_route('tracks.index');
    }
}
