<!-- Header Area Start Here -->
<header>
    <div id="header2" class="header2-area">
        <div class="header-top-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="header-top-left">
                            <ul>
                                <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Tel:{{$siteSettings->phone ?? '+ 123 456 78910'}}"> {{$siteSettings->phone ?? '+ 123 456 78910'}} </a></li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:{{$siteSettings->email ?? 'bagnanheritage@gmail.com'}}">{{$siteSettings->email ?? 'bagnanheritage@gmail.com'}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="header-top-right">
                            <ul>
                                <li>
                                    <div class="apply-btn-area">
                                        <a href="#exampleModal" data-bs-toggle="modal" data-target="#exampleModal" role="button" class="apply-now-btn">Admission Open</a>
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
                                <a href="{!! url('/') !!}"><img class="img-responsive" src="{{ URL::asset(checkAndRenderImage($siteSettings->header_logo, 'assets/img/logo-primary.png')) }}" alt="logo" style="width: 150px;"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12">
                        <div class="header-top-right text-uppercase">
                            <h1>Heritage College of Education</h1>
                        </div>
                        <div class="header-top-right text-uppercase mb-2">
                            <ul>
                                <li>(B.ED) And (D.EL.ED)</li>
                                <li>RABIBHAG * BAGNAN * HOWRAH * 711312</li>
                            </ul>
                            <ul>
                                <li>(APPROVED BY N.C.T.E. & AFFILIATED TO - W.B.U.T.T.E.P.A & W.B.B.P.E)</li>
                                <li>ESTD : 2014</li>
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
                                <li class="{{Request::segment(1) === null ? 'active' : ''}}"><a href="{!! url('/') !!}">Home</a></li>
                                <li class="{{Request::segment(1) === 'courses' ? 'active' : ''}}"><a href="{!! url('/courses') !!}">Courses</a></li>
                                <li class="{{Request::segment(1) === 'gallery' ? 'active' : ''}}"><a href="{!! url('/gallery') !!}">Gallery</a></li>
                                <li class="{{Request::segment(1) === 'resource-person' ? 'active' : ''}}"><a href="{!! url('resource-person') !!}">Resource Person</a></li>
                                <li class="{{Request::segment(1) === 'student-portal' ? 'active' : ''}}"><a href="{!! url('student-portal') !!}">Student Portal</a></li>
                                <li class="{{Request::segment(1) === 'infrastructure' ? 'active' : ''}}"><a href="{!! url('infrastructure') !!}">Infrastructure</a></li>
                                <li class="{{Request::segment(1) === 'mandatory-disclosure' ? 'active' : ''}}"><a href="{!! url('mandatory-disclosure') !!}">Mandatory Disclosure</a></li>
                                <li class="{{Request::segment(1) === 'biometric' ? 'active' : ''}}"><a href="{!! url('biometric') !!}">Biometric Attendance</a></li>
                                <li class="{{Request::segment(1) ==='notice' ? 'active' : ''}}"><a href="{!! url('notice') !!}">Notice</a>
                                    <ul><li><a href="{!! url('events') !!}">Event</a></li></ul>
                                </li>
                                <li class="{{Request::segment(1) === 'contact' ? 'active' : ''}}"><a href="{!! url('contact') !!}">Contact</a></li>
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
                                <li class="{{Request::segment(1) === null ? 'active' : ''}}"><a href="{!! url('/') !!}">Home</a></li>
                                <li class="{{Request::segment(1) === 'courses' ? 'active' : ''}}"><a href="{!! url('/courses') !!}">Courses</a></li>
                                <li class="{{Request::segment(1) === 'gallery' ? 'active' : ''}}"><a href="{!! url('/gallery') !!}">Gallery</a></li>
                                <li class="{{Request::segment(1) === 'resource-person' ? 'active' : ''}}"><a href="{!! url('resource-person') !!}">Resource Person</a></li>
                                <li class="{{Request::segment(1) === 'student-portal' ? 'active' : ''}}"><a href="{!! url('student-portal') !!}">Student Portal</a></li>
                                <li class="{{Request::segment(1) === 'infrastructure' ? 'active' : ''}}"><a href="{!! url('infrastructure') !!}">Infrastructure</a></li>
                                <li class="{{Request::segment(1) === 'mandatory-disclosure' ? 'active' : ''}}"><a href="{!! url('mandatory-disclosure') !!}">Mandatory Disclosure</a></li>
                                <li class="{{Request::segment(1) === 'biometric' ? 'active' : ''}}"><a href="{!! url('biometric') !!}">Biometric Attendance</a></li>
                                <li class="{{Request::segment(1) === 'notice' ? 'active' : ''}}"><a href="{!! url('notice') !!}#">Notice</a></li>
                                <li class="{{Request::segment(1) === 'events' ? 'active' : ''}}"><a href="{!! url('events') !!}#">Event</a></li>
                                <li class="{{Request::segment(1) === 'contact' ? 'active' : ''}}"><a href="{!! url('contact') !!}">Contact</a></li>
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
                <h5 class="modal-title text-bold" id="exampleModalLabel">ADMISSION ENQUIRY</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center text-uppercase">
                <h3 class="mb-3">Students Directly Call Us On Our Phone : 9051729961</h3>
                <h3 class="mb-3">Or</h3>
                <h3 class="mb-3">Visit Us Our Office</h3>
                <h3 class="mb-3">Or</h3>
                <h3><a href="{!! url('contact') !!}" class="view-all-accent-btn hvr-float-shadow">Click Here To Admission Enquiry</a></h3>
            </div>
        </div>
    </div>
</div>
