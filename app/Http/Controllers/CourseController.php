<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        return view('course.list', [
            'courses' => Course::with('institution')->get(),
        ]);
    }

    public function show(Course $course)
    {
        return view('course.detail', [
            'course' => $course->load('institution'),
        ]);
    }
}