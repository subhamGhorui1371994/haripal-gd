<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        return view('pages.activities');
    }
}
