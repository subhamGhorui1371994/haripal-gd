@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Gallery', 'Gallery')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Gallery Area 2 Start Here -->
    <div class="gallery-area2">
        <div class="container" id="inner-isotope">
            @if($galleryImages)
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="isotop-classes-tab isotop-btn">
                            <a href="#" data-filter="*" class="current">All</a>
                            @foreach($galleryCategories as $key => $galleryCategory)
                                <a href="#" data-filter=".cat-{{$key}}"> {{$galleryCategory}}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row featuredContainer gallery-wrapper">
                    @foreach($galleryImages as $key =>$galleryImage)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 cat-{{$galleryImage->category_id}}">
                            <div class="gallery-box">
                                <img src="{{ URL::asset(checkAndRenderImage($galleryImage->image, 'assets/img/gallery/6.jpg')) }}" class="img-responsive" alt="gallery">
                                <div class="gallery-content">
                                    <a href="{{ URL::asset(checkAndRenderImage($galleryImage->image, 'assets/img/gallery/6.jpg')) }}" class="zoom"><i class="fa fa-link" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <p class="text-center">No images found.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Gallery Area 2 End Here -->
@endsection
