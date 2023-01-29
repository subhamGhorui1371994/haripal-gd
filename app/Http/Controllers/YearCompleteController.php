<?php

namespace App\Http\Controllers;

use App\Models\YearComplete;
use Illuminate\Http\Request;

class YearCompleteController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $student = new YearComplete();

        $student->name = $request->post('name');
        $student->phone = $request->post('phone');
        $student->address = $request->post('address');
        $student->passing_year = $request->post('passing_year');
        $student->present_profession = $request->post('present_profession');


        $student->save();
        // return redirect()->back()->withSuccess("Submit Successfully");
        return response()->json(['bool'=>true]);

    }
}
