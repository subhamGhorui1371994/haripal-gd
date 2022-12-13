<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminAfterLogin');
    }

    /**
     * Show the application dashboard.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $breadcrumb_title = 'Courses';
        $bedCourseData = Courses::where('course_type', 'bed')->first();
        $dledCourseData = Courses::where('course_type', 'dled')->first();

        return view('admin.courses.index', compact('breadcrumb_title', 'bedCourseData', 'dledCourseData'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function saveCoursesInfo(Request $request): RedirectResponse
    {
        try {
            $course_type = $request->post('course_type');
            $course_id = $request->post('course_id');

            $validate_value['course_type'] = $request->post('course_type');
            $validate_rule['course_type'] = 'required';
            $validate_value['course_name'] = $request->post('course_name');
            $validate_rule['course_name'] = 'required';
            $validate_value['duration'] = $request->post('duration');
            $validate_rule['duration'] = 'required';
            $validate_value['exam_type'] = $request->post('exam_type');
            $validate_rule['exam_type'] = 'required';
            $validate_value['course'] = $request->post('course');
            $validate_rule['course'] = 'required';
            $validate_value['intake_capacity'] = $request->post('intake_capacity');
            $validate_rule['intake_capacity'] = 'required';
            $validate_value['board'] = $request->post('board');
            $validate_rule['board'] = 'required';
            $validate_value['session'] = $request->post('session');
            $validate_rule['session'] = 'required';
            $validate_value['admission_link'] = $request->post('admission_link');
            $validate_rule['admission_link'] = 'required';

            $validator = Validator::make($validate_value, $validate_rule);

            if ($validator->fails()) {
                $validation_errors = $validator->errors()->all();
                return redirect()->back()->withErrors(implode(', ', $validation_errors));
            } else {
                $updateData = [
                    'course_type' => $request->post('course_type'),
                    'course_name' => $request->post('course_name'),
                    'duration' => $request->post('duration'),
                    'exam_type' => $request->post('exam_type'),
                    'course' => $request->post('course'),
                    'intake_capacity' => $request->post('intake_capacity'),
                    'board' => $request->post('board'),
                    'session' => $request->post('session'),
                    'admission_link' => $request->post('admission_link'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                $syllabus = $request->file('syllabus');
                $uploadPath = 'uploads/course/';
                $fileName = '';

                if ($course_type === 'bed') {
                    if ($syllabus) {
                        $fileName = 'bed-syllabus' . '.' . $syllabus->extension();
                    }
                } else if ($course_type === 'dled') {
                    if ($syllabus) {
                        $fileName = 'dled-syllabus' . '.' . $syllabus->extension();
                    }
                } else {
                    return redirect()->back()->withErrors('Invalid operation performed!');
                }

                if ($syllabus) {
                    $syllabus->move(public_path($uploadPath), $fileName);
                    $updateData['syllabus'] = $uploadPath . $fileName;
                }

                if(!empty($updateData)) {
                    Courses::updateOrCreate(['course_type' => $course_type, 'id' => $course_id], $updateData);
                    return redirect()->back()->withSuccess('Course details saved successfully.');
                } else {
                    return redirect()->back()->withErrors('Invalid operation performed!');
                }
            }
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage());
        }
    }
}
