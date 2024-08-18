<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses=Course::paginate(5);
        return view('courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function saveImages($request)
    {
        if ($request->hasFile('logo')) {
            $image=$request->file('logo');
            $filePath=$image->store('course_images','course_uploads');
            return $filePath;
        }
        return null;
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses|min:2',
            'desc' => 'required|unique:courses|min:5|max:100',
            'grade' => 'required|in:A,B,C,D,F|max:1'
        ], [
            'name.unique' => 'This name is already used.',
            'name.min' => 'The name must be at least 2 characters long.',
            'desc.unique' => 'This description is already used.',
            'desc.min' => 'The description must be at least 5 characters long.',
            'desc.max' => 'The description cannot be longer than 100 characters.',
            'grade.in' => 'The grade must be one of the following: A, B, C, D, F.',
        ]);
        
        $logoPath=$this->saveImages($request);
        $requestData=$request->all();
        $requestData['logo']=$logoPath;
        $course=Course::create($requestData);
        return to_route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|min:2',
            'desc' => 'required|min:5|max:100',
            'grade' => 'required|in:A,B,C,D,F|max:1'
        ], [
            'name.min' => 'The name must be at least 2 characters long.',
            'desc.min' => 'The description must be at least 5 characters long.',
            'desc.max' => 'The description cannot be longer than 100 characters.',
            'grade.in' => 'The grade must be one of the following: A, B, C, D, F.',
        ]);
        
        $logoPath=$this->saveImages($request);
        $requestData=$request->all();
        $requestData['logo']=$logoPath;
        $course->update($requestData);
        return to_route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return to_route('courses.index');
    }
}
