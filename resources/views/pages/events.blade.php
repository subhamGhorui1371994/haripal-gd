@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Event', 'Event')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Event Page Area Start Here -->
    <div class="event-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row event-inner-wrapper">
                        @if((!empty($events)))
                            @foreach($events as $key => $event)
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <div class="single-item">
                                        <div class="item-img">
                                            <a href="{{$event['social_site_link'] ?? '#'}}"><img src="{{ URL::asset(checkAndRenderImage($event['image'], 'assets/img/event/1.jpg')) }}" alt="event" class="img-responsive"></a>
                                        </div>
                                        <div class="item-content">
                                            <h3 class="sidebar-title"><a href="{{$event['social_site_link'] ?? '#'}}">{{$event['title']}}</a></h3>
                                            <p>{{$event['description']}}</p>
                                            <ul class="event-info-block mb-5">
                                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{date('F d, Y', strtotime($event['date']))}}</li>
                                            </ul>
                                            @if($event['social_site_link'])
                                                <a href="{{$event['social_site_link'] ?? '#'}}" class="btn btn-info" target="_blank">See more</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <ul class="news-wrapper">
                                <li>
                                    <div class="news-content-holder">
                                        <h3 class="text-center">No recent events found.</h3>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Page Area End Here -->

@endsection
