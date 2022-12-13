<?php

namespace App\Http\Controllers;


use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $bedCourseData = Courses::where('course_type', 'bed')->first();
        $dledCourseData = Courses::where('course_type', 'dled')->first();

        return view('pages.courses', compact('bedCourseData', 'dledCourseData'));
    }

}
