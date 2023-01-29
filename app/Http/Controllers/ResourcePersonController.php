<?php

namespace App\Http\Controllers;


use App\Models\ResourcePerson;
use Illuminate\Http\Request;

class ResourcePersonController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        //$bedTeachingStaff = ResourcePerson::where('resource_person_type', 'Teaching Staff')->where('bed', true)->get();
        //$dledTeachingStaff = ResourcePerson::where('resource_person_type', 'Teaching Staff')->where('dled', true)->get();
        $nonTeachingStaff = ResourcePerson::where('resource_person_type', 'Non Teaching Staff')->get();
        $administrativeStaff = ResourcePerson::where('resource_person_type', 'Administrative')->get();

        $secondaryTeachingStaff = ResourcePerson::where('resource_person_type', 'Teaching Staff')->where('secondary', true)->get();
        $higherSecondaryTeachingStaff = ResourcePerson::where('resource_person_type', 'Teaching Staff')->where('higherSecondary', true)->get();

        //return view('pages.resource-person', compact('bedTeachingStaff', 'dledTeachingStaff', 'nonTeachingStaff', 'administrativeStaff'));
        return view('pages.resource-person', compact('secondaryTeachingStaff', 'higherSecondaryTeachingStaff', 'nonTeachingStaff', 'administrativeStaff'));
    }

}
