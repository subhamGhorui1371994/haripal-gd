<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Students;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;

class StudentsController extends Controller
{
    /**
     *
     */
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
        $breadcrumb_title = 'Student Portal';

        return view('admin.students.list', compact('breadcrumb_title'));
    }

    /**
     * @param Request $request
     * @return false|string
     */
    public function students_list_ajax(Request $request)
    {
        $limit = $offset = 0;

        $order_column_by = $order_column = $search = '';

        if (isset($request->start)) {
            $offset = $request->start;
        }
        if (isset($request->length)) {
            $limit = $request->length;
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['dir'])) {
                $order_column_by = $request->order[0]['dir'];
            }
        }

        if (isset($request->order[0])) {
            if (isset($request->order[0]['column'])) {
                if ($request->order[0]['column'] == 0) {
                    $order_column = 'course_type';
                } elseif ($request->order[0]['column'] == 1) {
                    $order_column = 'session_start';
                } elseif ($request->order[0]['column'] == 2) {
                    $order_column = 'session_end';
                } elseif ($request->order[0]['column'] == 3) {
                    $order_column = 'student_data';
                } elseif ($request->order[0]['column'] == 4) {
                    $order_column = 'created_at';
                }
            }
        }

        if (isset($request->search['value'])) {
            if (!empty($request->search['value'])) {
                $search = $request->search['value'];
            }
        }

        $details = Students::getListDataTable($order_column, $order_column_by, $limit, $offset, $search);

        return json_encode([
            "draw" => $request->draw,
            "recordsTotal" => $details['recordsTotal'],
            "recordsFiltered" => $details['recordsTotal'],
            "data" => $details['data'],
        ]);
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $breadcrumb_title = 'Student Portal';

        return view('admin.students.add', compact('breadcrumb_title'));
    }

    /**
     * @param $students
     * @return Application|Factory|View
     */
    public function edit($students)
    {
        $breadcrumb_title = 'Student Portal';
        $students = Students::find($students);

        return view('admin.students.edit', compact('breadcrumb_title', 'students'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        $validate_value['course_type'] = $request->post('course_type');
        $validate_rule['course_type'] = 'required';
        $validate_value['session_start'] = $request->post('session_start');
        $validate_rule['session_start'] = 'required';
        $validate_value['session_end'] = $request->post('session_end');
        $validate_rule['session_end'] = 'required';
        $validate_value['student_data'] = $request->file('student_data');
        $validate_rule['student_data'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect('admin/students/create')->withErrors(implode(', ', $validation_errors));
        } else {

            $sessionData = [
                'course_type' => $request->post('course_type'),
                'session_start' => $request->post('session_start'),
                'session_end' => $request->post('session_end'),
            ];

            $students_file = $request->file('student_data');

            if ($students_file) {
                $fileName = 'HCE-STUDENTS-' . str_replace(".", "", $sessionData['course_type']) . '-' . $sessionData['session_start'] . '-' . $sessionData['session_end'] . '.' . $students_file->extension();
                $students_file->move(public_path('uploads/students/'), $fileName);
                $sessionData['student_data'] = 'uploads/students/' . $fileName;
            }

            $students = new Students();
            $students->fill($sessionData);
            $students->save();

            return redirect('admin/students')->withSuccess('Student session added successfully.');
        }
    }

    /**
     * @param $students
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update($students, Request $request)
    {
        $validate_value['course_type'] = $request->post('course_type');
        $validate_rule['course_type'] = 'required';
        $validate_value['session_start'] = $request->post('session_start');
        $validate_rule['session_start'] = 'required';
        $validate_value['session_end'] = $request->post('session_end');
        $validate_rule['session_end'] = 'required';

        $validator = Validator::make($validate_value, $validate_rule);

        if ($validator->fails()) {
            $validation_errors = $validator->errors()->all();
            return redirect()->back()->withErrors(implode(', ', $validation_errors));
        } else {

            $students = Students::find($students);

            $updateColumns = [
                'course_type' => $request->post('course_type'),
                'session_start' => $request->post('session_start'),
                'session_end' => $request->post('session_end'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $students_file = $request->file('student_data');

            if ($students_file) {
                $fileName = 'HCE-STUDENTS-' . str_replace(".", "", $updateColumns['course_type']) . '-' . $updateColumns['session_start'] . '-' . $updateColumns['session_end'] . '.' . $students_file->extension();
                $students_file->move(public_path('uploads/students/'), $fileName);
                $updateColumns['student_data'] = 'uploads/students/' . $fileName;
                if (file_exists(public_path($students->student_data))) {
                    unlink(public_path($students->student_data));
                }
            }

            $students->fill($updateColumns);
            $students->save();

            return redirect('admin/students')->withSuccess('Student session updated successfully.');
        }
    }

    /**
     * @param $id
     * @param Students $students
     * @return mixed
     */
    public function destroy($id, Students $students)
    {
        $students->destroy($id);

        return redirect()->back()->withSuccess('Student session deleted successfully!!');
    }
}
