<?php

namespace App\Http\Controllers;


use App\Models\Affiliations;
use App\Models\Event;
use App\Models\HomePage;
use App\Models\HomePageBanners;
use App\Models\Notice;
use App\Models\YearComplete;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $banners = HomePageBanners::all()->toArray();
        $pageContent = HomePage::first();
        $affiliations = Affiliations::all()->toArray();
        $notices = Notice::limit(10)->orderBy('date', 'desc')->get()->toArray();
        $events = Event::limit(10)->orderBy('date', 'desc')->get()->toArray();

        return view('pages.welcome', compact('banners', 'pageContent', 'affiliations', 'notices', 'events'));
    }

    public function exStudentInfoSubmit(Request $request) {
        $student = new YearComplete();

        $student->name = $request->post('name');
        $student->phone = $request->post('phone');
        $student->address = $request->post('address');
        $student->passing_year = $request->post('passing_year');
        $student->present_profession = $request->post('present_profession');


        $student->save();
        return response()->json(['status'=> true, 'message'=> "Successfully Submitted."]);
    }

}
