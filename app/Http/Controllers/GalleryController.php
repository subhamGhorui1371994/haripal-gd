<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $galleryCategories = GalleryCategory::pluck('name', 'id')->all();
        $galleryImages = Gallery::getGalleryData();

        return view('pages.gallery', compact('galleryCategories', 'galleryImages'));
    }

}
