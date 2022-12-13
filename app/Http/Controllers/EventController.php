<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $events = Event::limit(50)->orderBy('date', 'desc')->get()->toArray();

        return view('pages.events', compact('events'));
    }

}
