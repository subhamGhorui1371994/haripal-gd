<?php

namespace App\Http\Controllers;


use App\Models\Students;
use Illuminate\Http\Request;

class StudentPortalController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('pages.student-portal');
    }

    public function getSessionDataAjax(Request $request)
    {
        $courseType = $request->course;
        $session = $request->course_session;

        if (empty($courseType)) {
            return json_encode(['status' => false, 'msg' => 'Please select a course.', 'data' => '']);
        }

        if (empty($session)) {
            return json_encode(['status' => false, 'msg' => 'Please select a session.', 'data' => '']);
        }

        $session = explode('-', $session);

        $courseData = Students::where('session_start', $session[0])->where('session_end', $session[1])->where('course_type', $courseType)->first();

        if (!empty($courseData)) {
            if (!empty($courseData->student_data) && file_exists(public_path($courseData->student_data))) {
                return json_encode(['status' => true, 'msg' => 'Data found.', 'data' => $courseData->student_data]);
            } else {
                return json_encode(['status' => false, 'msg' => 'No record found.', 'data' => '']);
            }
        } else {
            return json_encode(['status' => false, 'msg' => 'No record found.', 'data' => '']);
        }
    }

}
