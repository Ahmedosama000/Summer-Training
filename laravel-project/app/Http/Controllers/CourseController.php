<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Show All Courses
    public function index() { 
        // $courses = Course::all();
        $courses = Course::orderBy('id' , 'desc')->simplePaginate(12);
        return view('pages.courses' , compact('courses'));
    }
    // Add Course
    public function store(Request $request) {
        // Validate Course
        $request->validate([
            'title' => 'required|max:22',
            'price' => 'required',
            'instructor' => 'required' ,
            'desc' => 'required'
        ]);

        // Create instance from Course
        $course = new Course();
        $course->title = $request->title;
        $course->price = $request->price;
        $course->instructor = $request->instructor;
        $course->desc = $request->desc;

        // Save Course 
        $course->save();

        // Redirect /course
        return redirect('/courses');
    }

    // Show Course Details
    public function show($id) {
        $course = Course::find($id);
        return view('pages.details' , compact('course'));
    }

    // Edit Course Ui 
    public function edit($id) { 
        $course = Course::find($id);
        return view('pages.edit' , compact('course'));
    }
    // Update Course
    public function update(Request $request , $id) { 
         // Validate Course
         $request->validate([
            'title' => 'required|max:22',
            'price' => 'required',
            'instructor' => 'required' ,
            'desc' => 'required'
        ]);

        $course = Course::find($id);
        $course->title = $request->title;
        $course->price = $request->price;
        $course->instructor = $request->instructor;
        $course->desc = $request->desc;

        $course->save();

        return redirect('/courses');
    }

    // Delete Course
    public function destroy($id) { 
        // find course
        $course = Course::find($id);
        // delete course
        $course->delete();
        // redirect /courses
        return redirect('/courses');
    }
}
