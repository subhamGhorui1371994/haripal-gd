<!-- Footer Area Start Here -->
<footer>
    <div class="footer-area-top">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="footer-box mb-0">
                        <a href="{!! url('/') !!}"><img class="img-responsive" src="{{ URL::asset(checkAndRenderImage($siteSettings->header_logo, 'assets/img/logo-footer.png')) }}" alt="logo" style="width: 100px"></a>
                        <div class="footer-about">
                            <p class="mb-0">{{$siteSettings->footer_short_info ?? 'Heritage College Of Education One Of The Dreams Of The Trust, Is Coming Up In-A Modern, Spacious Building That Has Been Constructed In A Sprawling The Acres Of Land. Heritage College Of Education Preparing Teachers To Teach High Schools.'}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h3>Social Links</h3>
                        <ul class="footer-social">
                            <li><a href="{{$siteSettings->facebook_url ?? '#'}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="{{$siteSettings->twitter_url ?? '#'}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="{{$siteSettings->instagram_url ?? '#'}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-box">
                        <h3>Information</h3>
                        <ul class="corporate-address">
                            <li><i class="fa fa-map" aria-hidden="true"></i>{{$siteSettings->address ?? 'Vill.+P.O.-Rabibhag, P.S.-Bagnan, District-Howrah, State-W.B., Pin-711312'}}</li>
                            <li><i class="fa fa-phone" aria-hidden="true"></i><a href="Phone:{{$siteSettings->phone ?? '+ 123 456 78910'}}"> {{$siteSettings->phone ?? '+ 123 456 78910'}} </a></li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>{{$siteSettings->email ?? 'bagnanheritage@gmail.com'}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-area-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <p class="text-center">&copy; {{date('Y')}} {{ config('app.name', 'Heritage College of Education') }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End Here -->
