<?php

namespace App\Http\Controllers;


use App\Models\MandatoryDisclosure;
use App\Models\MandatoryDisclosureDocuments;
use Illuminate\Http\Request;

class MandatoryDisclosureController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $mandatoryDisclosureData = MandatoryDisclosure::first();
        $documents = MandatoryDisclosureDocuments::all();

        return view('pages.mandatory-disclosure', compact('mandatoryDisclosureData', 'documents'));
    }

}
