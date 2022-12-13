@extends('layouts.template')
@section('content')
    <!-- Slider 1 Area Start Here -->
    <div class="slider1-area overlay-default">
        <div class="bend niceties preview-1">
            <div id="ensign-nivoslider-3" class="slides">
                @if(!empty($banners))
                    @foreach($banners as $key => $banner)
                        <img src="{{ URL::asset(checkAndRenderImage($banner['image_link'], 'assets/img/slider/2-1.jpg')) }}" alt="slider" title="#slider-direction-{{$key}}"/>
                    @endforeach
                @else
                    <img src="{{ URL::asset('assets/img/slider/2-1.jpg') }}" alt="slider" title="#slider-direction-1"/>
                @endif
            </div>
            @if(!empty($banners))
                @foreach($banners as $key => $banner)
                    <div id="slider-direction-{{$key}}" class="t-cn slider-direction">
                        <div class="slider-content s-tb slide-1">
                            <div class="title-container s-tb-c">
                                <div class="title1 text-uppercase">{{$banner['title']}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div id="slider-direction-1" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="title-container s-tb-c">
                            <div class="title1 text-uppercase">Heritage College Of Education</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Slider 1 Area End Here -->
    <!-- About 2 Area Start Here -->
    <div class="about2-area">
        <div class="container">
            <h1 class="about-title text-uppercase">Welcome To {{ $pageContent->welcome_title ?? config('app.name', 'Heritage College of Education') }}</h1>
            @if($pageContent->welcome_content)
                <div class="about-sub-title">{!!html_entity_decode($pageContent->welcome_content)!!}</div>
            @else
                <p class="about-sub-title">Any progressive nation is always in demand of high level of knowledge - based society.To achive it enhanced educated,trained,skilled and research prone professionals are constantly needed. Considering this some visonaries,enlightened persons of educational areana engaged in various activities of social development have taken the oath to set up and flourish a B.Ed. College in the remotest corner of rural Bengal(Howrah) to extend the scope of teachers training to the unreached.</p>
                <p class="about-sub-title">B.Ed. Degree is the pillar and compulsory too,to impat quality education and innovative teaching techniques.It is such a venture with merit that can bring a radical change and outcome in community ,society and nation as a whole.On the eve of a new century only the educated younger generation can usher positive contribution towards sustainable development of individuals and nation as well.</p>
                <p class="about-sub-title">Heritage College of Education(B.Ed.) is Bound to tread towards this goal with its whole hearted effort and collective co-operation of all associated with it.</p>
            @endif
        </div>
    </div>
    <div class="about-page3-area">
        <div class="container">
            <div class="row about-page3-inner">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="about-box">
                        <h2 class="title-bar-medium-left text-uppercase"><a>{{$pageContent->about_us_title ?? 'About Us'}}</a></h2>
                        @if($pageContent->about_us_content)
                            <div class="text-justify">{!!html_entity_decode($pageContent->about_us_content)!!}</div>
                        @else
                            <p>Tmply dummy text of the printing and typesetting indust Lorem Ipsum has been theitry's snce simply dummy text of the printing.Phasellus enim libero, blandit vel sapien vita their.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="about-box">
                        <h2 class="title-bar-medium-left text-uppercase"><a>{{$pageContent->about_trust_title ?? 'About Trust'}}</a></h2>
                        @if($pageContent->about_trust_content)
                            <div class="text-justify">{!!html_entity_decode($pageContent->about_trust_content)!!}</div>
                        @else
                            <p>Tmply dummy text of the printing and typesetting indust Lorem Ipsum has been theitry's snce simply dummy text of the printing.Phasellus enim libero, blandit vel sapien vita their.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="why-choose-area">
        <div class="container">
            <div class="row about-page3-inner">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="about-box">
                        <h2 class="title-bar-medium-left text-uppercase"><a>{{$pageContent->president_desk_title ?? 'President Desk'}}</a></h2>
                        <div class="research-details-inner text-justify">
                            @if($pageContent->president_desk_content)
                                {!!html_entity_decode($pageContent->president_desk_content)!!}
                            @else
                                <p>Tmply dummy text of the printing and typesetting indust Lorem Ipsum has been theitry's snce simply dummy text of the printing.Phasellus enim libero, blandit vel sapien vita their.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="about-box">
                        <h2 class="title-bar-medium-left text-uppercase"><a>{{$pageContent->secretary_desk_title ?? 'Secretary Desk'}}</a></h2>
                        <div class="research-details-inner text-justify">
                            @if($pageContent->secretary_desk_content)
                                {!!html_entity_decode($pageContent->secretary_desk_content)!!}
                            @else
                                <p>Tmply dummy text of the printing and typesetting indust Lorem Ipsum has been theitry's snce simply dummy text of the printing.Phasellus enim libero, blandit vel sapien vita their.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About 2 Area End Here -->
    <!-- Lecturers Area Start Here -->
    <div class="lecturers-area affiliations-area">
        <div class="container">
            <h2 class="title-default-left text-uppercase">Our Affiliations</h2>
        </div>
        <div class="container">
            <div class="rc-carousel" data-loop="true" data-items="4" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                 data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false"
                 data-r-large="4" data-r-large-nav="false" data-r-large-dots="false">
                @if($affiliations)
                    @foreach($affiliations as $key => $affiliation)
                        <div class="single-item">
                            <div class="lecturers1-item-wrapper">
                                <div class="lecturers-img-wrapper">
                                    <a href="{{$affiliation['link'] ?? '#'}}"><img class="img-responsive" src="{{ URL::asset(checkAndRenderImage($affiliation['logo'], 'assets/img/team/1.jpg')) }}" alt="team"></a>
                                </div>
                                <div class="lecturers-content-wrapper">
                                    <h3 class="item-title"><a href="{{$affiliation['link'] ?? '#'}}">{{$affiliation['title'] ?? 'NA'}}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('assets/img/team/1.jpg') }}" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#">NCTE</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('assets/img/team/1.jpg') }}" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#">WBUTTEPA</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('assets/img/team/1.jpg') }}" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#">WBBPE</a></h3>
                            </div>
                        </div>
                    </div>
                    <div class="single-item">
                        <div class="lecturers1-item-wrapper">
                            <div class="lecturers-img-wrapper">
                                <a href="#"><img class="img-responsive" src="{{ URL::asset('assets/img/team/1.jpg') }}" alt="team"></a>
                            </div>
                            <div class="lecturers-content-wrapper">
                                <h3 class="item-title"><a href="#">UGC</a></h3>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Lecturers Area End Here -->
    <!-- News and Event Area Start Here -->
    <div class="news-event-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 news-inner-area">
                    <h2 class="title-bar-medium-left text-uppercase">Latest Events</h2>
                    @if(($events))
                        <ul class="news-wrapper">
                            @foreach($events as $key => $event)
                                <li>
                                    <div class="news-img-holder">
                                        <a href="{{$event['social_site_link'] ?? '#'}}"><img src="{{ URL::asset(checkAndRenderImage($event['image'], 'assets/img/logo-primary.png')) }}" class="img-responsive" alt="news"></a>
                                    </div>
                                    <div class="news-content-holder">
                                        <h3><a href="{{$event['social_site_link'] ?? '#'}}">{{$event['title']}}</a></h3>
                                        <div class="post-date">{{date('F d, Y', strtotime($event['date']))}}</div>
                                        <p>{{$event['description']}}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="news-btn-holder">
                            <a href="{!! url('events') !!}" class="view-all-accent-btn">View All</a>
                        </div>
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
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 event-inner-area">
                    <h2 class="title-bar-medium-left text-uppercase">Latest Notices</h2>
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
                        <div class="event-btn-holder">
                            <a href="{!! url('notice') !!}" class="view-all-primary-btn">View All</a>
                        </div>
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
    <!-- News and Event Area End Here -->
    <!-- Students Say Area Start Here -->
    <div class="students-say-area">
        <h2 class="title-default-center text-uppercase">Success Stories</h2>
        <div class="container">
            <div class="rc-carousel" data-loop="true" data-items="2" data-margin="30" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="true" data-nav="false" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false"
                 data-r-x-small-dots="true" data-r-x-medium="2" data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="2" data-r-small-nav="false" data-r-small-dots="true" data-r-medium="2" data-r-medium-nav="false" data-r-medium-dots="true"
                 data-r-large="2" data-r-large-nav="false" data-r-large-dots="true">
                <div class="single-item">
                    <div class="single-item-wrapper">
                        <div class="profile-img-wrapper">
                            <a class="profile-img"><img class="profile-img-responsive img-circle" src="{{ URL::asset('assets/img/stories/apj.jpg') }}" width="92" height="92" alt="Testimonial"></a>
                        </div>
                        <div class="tlp-tm-content-wrapper">
                            <h3 class="item-title text-uppercase"><a>A. P. J. Abdul Kalam</a></h3>
                            <span class="item-designation">&nbsp;</span>
                            <div class="item-content">Creativity is the key to success in the future, and primary <strong>education</strong> is where teachers can bring creativity in children at that level.</div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="single-item-wrapper">
                        <div class="profile-img-wrapper">
                            <a class="profile-img"><img class="profile-img-responsive img-circle" src="{{ URL::asset('assets/img/stories/bcroy.jpg') }}" width="92" height="92" alt="Testimonial"></a>
                        </div>
                        <div class="tlp-tm-content-wrapper">
                            <h3 class="item-title text-uppercase"><a>Bidhan Chandra Roy</a></h3>
                            <span class="item-designation">&nbsp;</span>
                            <div class="item-content">Develop your personality, so that you may leave your individual mark in whatever sphere you are privileged to serve.</div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="single-item-wrapper">
                        <div class="profile-img-wrapper">
                            <a class="profile-img"><img class="profile-img-responsive img-circle" src="{{ URL::asset('assets/img/stories/netaji.jpg') }}" alt="Testimonial"></a>
                        </div>
                        <div class="tlp-tm-content-wrapper">
                            <h3 class="item-title text-uppercase"><a>Netaji Subhas Chandra Bose</a></h3>
                            <span class="item-designation">&nbsp;</span>
                            <div class="item-content">Soldiers who always remain faithful to their nation, who are always prepared to sacrifice their lives, are invincible.</div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="single-item-wrapper">
                        <div class="profile-img-wrapper">
                            <a class="profile-img"><img class="profile-img-responsive img-circle" src="{{ URL::asset('assets/img/stories/pranab.jpg') }}" alt="Testimonial"></a>
                        </div>
                        <div class="tlp-tm-content-wrapper">
                            <h3 class="item-title text-uppercase"><a>Pranab Mukherjee</a></h3>
                            <span class="item-designation">&nbsp;</span>
                            <div class="item-content">For our development to be real, the poorest of our land must feel that they are  part of the narrative of rising India.</div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="single-item-wrapper">
                        <div class="profile-img-wrapper">
                            <a class="profile-img"><img class="profile-img-responsive img-circle" src="{{ URL::asset('assets/img/stories/aurobindo.jpg') }}" alt="Testimonial"></a>
                        </div>
                        <div class="tlp-tm-content-wrapper">
                            <h3 class="item-title text-uppercase"><a>Rishi Aurobindo</a></h3>
                            <span class="item-designation">&nbsp;</span>
                            <div class="item-content">Watch the too indignantly righteous. Before long you will find them committing or condoning the very offence which they have so fiercely censured.</div>
                        </div>
                    </div>
                </div>
                <div class="single-item">
                    <div class="single-item-wrapper">
                        <div class="profile-img-wrapper">
                            <a class="profile-img"><img class="profile-img-responsive img-circle" src="{{ URL::asset('assets/img/stories/vidyasagar.jpg') }}" alt="Testimonial"></a>
                        </div>
                        <div class="tlp-tm-content-wrapper">
                            <h3 class="item-title text-uppercase"><a>Ishwar Chandra Vidyasagar</a></h3>
                            <span class="item-designation">&nbsp;</span>
                            <div class="item-content">The life without suffering is like a boat without a sailor, in which there is no discretion of itself, it also moves in a light breeze.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Students Say Area End Here -->
@endsection
