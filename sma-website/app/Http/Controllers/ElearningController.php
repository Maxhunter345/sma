<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class ElearningController extends Controller
{
    public function index()
    {
        return view('elearning.index');
    }

    public function courses()
    {
        $courses = Course::all();
        return view('elearning.courses', compact('courses'));
    }

    public function manageCourses()
    {
        $courses = Course::all();
        return view('elearning.manage', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses',
            'name' => 'required',
            'type' => 'required',
            'semester' => 'required',
            'academic_year' => 'required',
        ]);

        Course::create($validated);

        return redirect()->back()->with('success', 'Course created successfully');
    }

    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'code' => 'required|unique:courses,code,' . $course->id,
            'name' => 'required',
            'type' => 'required',
            'semester' => 'required',
            'academic_year' => 'required',
        ]);

        $course->update($validated);

        return redirect()->back()->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back()->with('success', 'Course deleted successfully');
    }
}