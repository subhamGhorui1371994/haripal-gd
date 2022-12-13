<?php

namespace App\Http\Controllers;


use App\Models\Gallery;
use App\Models\Infrastructure;
use Illuminate\Http\Request;

class InfrastructureController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $infrastructureData = Infrastructure::first();

        $buildingImages = Gallery::getGalleryData('Building');
        $campusImages = Gallery::getGalleryData('Campus');
        $classRoomsImages = Gallery::getGalleryData('Class Rooms');
        $smartClassImages = Gallery::getGalleryData('Smart Class');
        $laboratoriesImages = Gallery::getGalleryData('Laboratories');
        $musicImages = Gallery::getGalleryData('Music');
        $libraryImages = Gallery::getGalleryData('Library');
        $canteenImages = Gallery::getGalleryData('Canteen');

        return view('pages.infrastructure', compact('infrastructureData', 'buildingImages', 'campusImages', 'classRoomsImages', 'smartClassImages', 'laboratoriesImages', 'musicImages', 'libraryImages', 'canteenImages'));
    }

}
