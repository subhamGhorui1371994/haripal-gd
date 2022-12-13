<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $notices = Notice::limit(50)->orderBy('date', 'desc')->get()->toArray();

        return view('pages.notice', compact('notices'));
    }

}
