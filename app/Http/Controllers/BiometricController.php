<?php

namespace App\Http\Controllers;


use App\Models\Biometric;
use Illuminate\Http\Request;

class BiometricController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('pages.biometric');
    }

    public function getReportDataAjax(Request $request)
    {
        $year = $request->year;
        $month = $request->month;

        if (empty($year)) {
            return json_encode(['status' => false, 'msg' => 'Please select a year.', 'data' => '']);
        }

        if (empty($month)) {
            return json_encode(['status' => false, 'msg' => 'Please select a month.', 'data' => '']);
        }

        $biometricData = Biometric::where('year', $year)->where('month', $month)->first();

        if (!empty($biometricData)) {
            return json_encode(['status' => true, 'msg' => 'Data found.', 'data' => $biometricData]);
        } else {
            return json_encode(['status' => false, 'msg' => 'No record found.', 'data' => '']);
        }
    }
}
