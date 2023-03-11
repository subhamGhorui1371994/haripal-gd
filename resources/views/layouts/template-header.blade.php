<!-- Header Area Start Here -->
<header>
    <div id="header2" class="header2-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="header-top-left">
                            <ul>
                                {{--                                <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Tel:{{$siteSettings->phone ?? '+ 123 456 78910'}}"> {{$siteSettings->phone ?? '+ 123 456 78910'}} </a></li> --}}
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a
                                        href="mailto:{{ $siteSettings->email ?? 'bagnanheritage@gmail.com' }}">{{ $siteSettings->email ?? 'bagnanheritage@gmail.com' }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="header-top-right">
                            <ul>
                                <li>
                                    <div class="apply-btn-area">
                                        <a href="#exampleModal" data-bs-toggle="modal" data-target="#exampleModal"
                                            role="button" class="apply-now-btn">125 Year Complete</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header2" class="header4-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="header-top-left">
                            <div class="logo-area">
                                <a href="{!! url('/') !!}"><img class="img-responsive"
                                        src="{{ URL::asset(checkAndRenderImage($siteSettings->header_logo, 'assets/img/logo-primary.png')) }}"
                                        alt="logo" style="width: 150px;"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="header-top-right text-uppercase">
                            <h1>HARIPAL GURUDAYAL INSTITUTION</h1>
                        </div>
                        <div class="header-top-right text-uppercase mb-2">
                            <ul>
                                <li>(Secondary ) And (Higher secondary)</li>
                                <li>KHAMARCHANDI * CHANDANNAGORE * HARIPAL * HOOGHLY * 712405</li>
                            </ul>
                            <ul>
                                <li>DIST CODE: 19120913003</li>
                                <li>INDEX NO: G4-034</li>
                                <li>CODE NO: 117071</li>
                                <li>ESTD : 1899</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu-area bg-primary" id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <nav id="desktop-nav">
                            <ul>
                                {{--                                <li class="{{Request::segment(1) === null ? 'active' : ''}}"><a href="{!! url('/') !!}">Home</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'courses' ? 'active' : ''}}"><a href="{!! url('/courses') !!}">Courses</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'gallery' ? 'active' : ''}}"><a href="{!! url('/gallery') !!}">Gallery</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'resource-person' ? 'active' : ''}}"><a href="{!! url('resource-person') !!}">Resource Person</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'student-portal' ? 'active' : ''}}"><a href="{!! url('student-portal') !!}">Student Portal</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'infrastructure' ? 'active' : ''}}"><a href="{!! url('infrastructure') !!}">Infrastructure</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'mandatory-disclosure' ? 'active' : ''}}"><a href="{!! url('mandatory-disclosure') !!}">Mandatory Disclosure</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'biometric' ? 'active' : ''}}"><a href="{!! url('biometric') !!}">Biometric Attendance</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) ==='notice' ? 'active' : ''}}"><a href="{!! url('notice') !!}">Notice</a> --}}
                                {{--                                    <ul><li><a href="{!! url('events') !!}">Event</a></li></ul> --}}
                                {{--                                </li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'contact' ? 'active' : ''}}"><a href="{!! url('contact') !!}">Contact</a></li> --}}
                                <li class="{{ Request::segment(1) === null ? 'active' : '' }}"><a
                                        href="{!! url('/') !!}">Home</a></li>
                                <li class="{{ Request::segment(1) === 'about-us' ? 'active' : '' }}"><a
                                        href="{!! url('about-us') !!}">About Us</a></li>
                                <li class="{{ Request::segment(1) === 'resource-person' ? 'active' : '' }}"><a
                                        href="{!! url('resource-person') !!}">Staff</a></li>

                                <li class="{{ Request::segment(1) === 'achievement' ? 'active' : '' }}"><a
                                        href="{!! url('co-curricular') !!}">Achievement</a>
                                    <ul>
                                        <li><a href="{!! url('co-curricular') !!}">Co-curricular</a></li>
                                        <li><a href="{!! url('academic') !!}">Academic</a></li>
                                    </ul>
                                </li>

                                <li class="{{ Request::segment(1) === 'activities' ? 'active' : '' }}"><a
                                        href="{!! url('activities') !!}">Activities</a></li>
                                <li class="{{ Request::segment(1) === 'courses' ? 'active' : '' }}"><a
                                        href="{!! url('/courses') !!}">Courses</a></li>
                                <li class="{{ Request::segment(1) === 'admission' ? 'active' : '' }}"><a
                                        href="{!! url('admission') !!}">Admission</a></li>

                                <li class="{{ Request::segment(1) === 'notice' ? 'active' : '' }}"><a
                                        href="{!! url('notice') !!}">Notice</a>
                                    <ul>
                                        <li><a href="{!! url('events') !!}">Event</a></li>
                                    </ul>
                                </li>
                                <li class="{{ Request::segment(1) === 'contact' ? 'active' : '' }}"><a
                                        href="{!! url('contact') !!}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area Start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                {{--                                <li class="{{Request::segment(1) === null ? 'active' : ''}}"><a href="{!! url('/') !!}">Home</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'courses' ? 'active' : ''}}"><a href="{!! url('/courses') !!}">Courses</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'gallery' ? 'active' : ''}}"><a href="{!! url('/gallery') !!}">Gallery</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'resource-person' ? 'active' : ''}}"><a href="{!! url('resource-person') !!}">Resource Person</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'student-portal' ? 'active' : ''}}"><a href="{!! url('student-portal') !!}">Student Portal</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'infrastructure' ? 'active' : ''}}"><a href="{!! url('infrastructure') !!}">Infrastructure</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'mandatory-disclosure' ? 'active' : ''}}"><a href="{!! url('mandatory-disclosure') !!}">Mandatory Disclosure</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'biometric' ? 'active' : ''}}"><a href="{!! url('biometric') !!}">Biometric Attendance</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'notice' ? 'active' : ''}}"><a href="{!! url('notice') !!}#">Notice</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'events' ? 'active' : ''}}"><a href="{!! url('events') !!}#">Event</a></li> --}}
                                {{--                                <li class="{{Request::segment(1) === 'contact' ? 'active' : ''}}"><a href="{!! url('contact') !!}">Contact</a></li> --}}

                                <li class="{{ Request::segment(1) === null ? 'active' : '' }}"><a
                                        href="{!! url('/') !!}">Home</a></li>
                                <li class="{{ Request::segment(1) === 'history' ? 'active' : '' }}"><a
                                        href="{!! url('/history') !!}">History</a></li>
                                <li class="{{ Request::segment(1) === 'administration' ? 'active' : '' }}"><a
                                        href="{!! url('/administration') !!}">Administration</a></li>
                                <li class="{{ Request::segment(1) === 'resource-person' ? 'active' : '' }}"><a
                                        href="{!! url('resource-person') !!}">Staff</a></li>
                                <li class="{{ Request::segment(2) === 'co-curricular' ? 'active' : '' }}"><a
                                        href="{!! url('/achievement/co-curricular') !!}"> Co-curricular Achievement </a></li>
                                <li class="{{ Request::segment(2) === 'academic ' ? 'active' : '' }}"><a
                                        href="{!! url('/achievement/academic') !!}"> Academic Achievement </a></li>
                                <li class="{{ Request::segment(1) === 'activities' ? 'active' : '' }}"><a
                                        href="{!! url('activities') !!}">Activities</a></li>
                                <li class="{{ Request::segment(1) === 'courses' ? 'active' : '' }}"><a
                                        href="{!! url('/courses') !!}">Courses</a></li>
                                <li class="{{ Request::segment(1) === 'admission' ? 'active' : '' }}"><a
                                        href="{!! url('admission') !!}#">Admission</a></li>
                                <li class="{{ Request::segment(1) === 'notice' ? 'active' : '' }}"><a
                                        href="{!! url('notice') !!}#">Notice</a></li>
                                <li class="{{ Request::segment(1) === 'events' ? 'active' : '' }}"><a
                                        href="{!! url('events') !!}#">Event</a></li>
                                <li class="{{ Request::segment(1) === 'contact' ? 'active' : '' }}"><a
                                        href="{!! url('contact') !!}">Contact</a></li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End -->
</header>
<!-- Header Area End Here -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title text-bold" id="exampleModalLabel">125 Year Complete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center text-uppercase">
                {{-- <h3 class="mb-3">Students Directly Call Us On Our Phone : 9051729961</h3>
                <h3 class="mb-3">Or</h3>
                <h3 class="mb-3">Visit Us Our Office</h3>
                <h3 class="mb-3">Or</h3>
                <h3><a href="{!! url('contact') !!}" class="view-all-accent-btn hvr-float-shadow">Click Here To Admission Enquiry</a></h3> --}}

                <div class="contact-form1">
                    <form id="completeYear">
                        @csrf
                        <fieldset>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Name*" class="form-control" name="name"
                                        id="form-name" required data-msg-required="Name field is required">
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Phone Number*" class="form-control"
                                        name="phone" id="form-phone" required
                                        data-msg-required="Phone number field is required">
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Address*" class="form-control" name="address"
                                        id="form-address" required data-msg-required="Address field is required">
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Year of Passing*" class="form-control"
                                        name="passing_year" id="form-passing-year" required
                                        data-msg-required="Year of Passing field is required">
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Present Profession*" class="form-control"
                                        name="present_profession" id="form-present-profession" required
                                        data-msg-required="Present Profession field is required">
                                    <span class="validation-errors"></span>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-md-12">
                                <div class="form-group margin-bottom-none">
                                    <button type="submit" class="default-big-btn save_btn">Submit</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
