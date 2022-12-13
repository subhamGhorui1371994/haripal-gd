@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Infrastructure', 'Infrastructure')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Building Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">BUILDING</h3>
                    @if($infrastructureData->building)
                        <div>{!! html_entity_decode($infrastructureData->building) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($buildingImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($buildingImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Building Area End Here -->

    <!-- CAMPUS Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">CAMPUS</h3>
                    @if($infrastructureData->campus)
                        <div>{!! html_entity_decode($infrastructureData->campus) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($campusImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($campusImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- CAMPUS Area End Here -->

    <!-- CLASSROOMS Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">CLASS ROOMS</h3>
                    @if($infrastructureData->class_rooms)
                        <div>{!! html_entity_decode($infrastructureData->class_rooms) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($classRoomsImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($classRoomsImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- CLASSROOMS Area End Here -->

    <!-- SMART CLASS Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">SMART CLASS</h3>
                    @if($infrastructureData->smart_class)
                        <div>{!! html_entity_decode($infrastructureData->smart_class) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($smartClassImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($smartClassImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- SMART CLASS Area End Here -->

    <!-- LABORATORIES Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">LABORATORIES</h3>
                    @if($infrastructureData->laboratories)
                        <div>{!! html_entity_decode($infrastructureData->laboratories) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($laboratoriesImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($laboratoriesImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- LABORATORIES Area End Here -->

    <!-- MUSIC Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">MUSIC</h3>
                    @if($infrastructureData->music)
                        <div>{!! html_entity_decode($infrastructureData->music) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($musicImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($musicImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- MUSIC Area End Here -->

    <!-- LIBRARY Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">LIBRARY</h3>
                    @if($infrastructureData->library)
                        <div>{!! html_entity_decode($infrastructureData->library) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($libraryImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($libraryImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- LIBRARY Area End Here -->

    <!-- CANTEEN Area Start Here -->
    <div class="lecturers-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h3 class="title-default-left title-bar-big-left-close text-uppercase">CANTEEN</h3>
                    @if($infrastructureData->canteen)
                        <div>{!! html_entity_decode($infrastructureData->canteen) !!}</div>
                    @else
                        <p>Eimply dummy text of the printing and typesetting industry. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book. Eimply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Eimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text type and scrambled it to make a type specimen book.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if($canteenImages)
        <div class="certificate-area">
            <div class="container">
                <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="true" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="false" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="false" data-r-medium-dots="false" data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                    @foreach($canteenImages as $key => $image)
                        <div class="single-item">
                            <div class="single-item-wrapper">
                                <img src={{ URL::asset(checkAndRenderImage($image->image, 'assets/img/certificate/1.jpg')) }} class="img-responsive" alt="certificate">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- CANTEEN Area End Here -->

@endsection
