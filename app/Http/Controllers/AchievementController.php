<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function __construct()
    {
        //
    }
    public function index()
    {
        return view('pages.co-curricular');
    }
    public function academic()
    {
        return view('pages.academic');
    }
}
