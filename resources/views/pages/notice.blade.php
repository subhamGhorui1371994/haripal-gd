@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Notice', 'Notice')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Contact Us Page 1 Area Start Here -->
    <div class="news-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 event-inner-area">
                    @if(($notices))
                        <ul class="event-wrapper">
                            @foreach($notices as $key => $notice)
                                <li class="">
                                    <div class="event-calender-wrapper">
                                        <div class="event-calender-holder">
                                            <h3>{{date('d', strtotime($notice['date']))}}</h3>
                                            <p>{{date('F', strtotime($notice['date']))}}</p>
                                            <span>{{date('Y', strtotime($notice['date']))}}</span>
                                        </div>
                                    </div>
                                    <div class="event-content-holder">
                                        <h3><a>{{$notice['title']}}</a></h3>
                                        <p>{{$notice['description']}}</p>
                                        @if($notice['file'])
                                            <ul>
                                                <li><a href="{{ URL::asset($notice['file']) }}"><i class="fa fa-download"></i> Download</a></li>
                                            </ul>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <ul class="event-wrapper">
                            <li class="">
                                <div class="event-content-holder">
                                    <h3 class="text-center">No recent notices found.</h3>
                                </div>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Page 1 Area End Here -->
@endsection
