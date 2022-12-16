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
        return view('pages.coming-soon');
    }
    public function academic()
    {
        return view('pages.coming-soon');
    }
}
