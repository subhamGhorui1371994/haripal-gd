<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Heritage College of Education (B.Ed & D.El.Ed)">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="_token" content="{{csrf_token()}}"/>

    <title>{{ config('app.name', 'Heritage College of Education') }}</title>

    <link href="{{ URL::asset('assets/img/logo.png') }}" rel="shortcut icon" type="image/x-icon">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/OwlCarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/OwlCarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/meanmenu.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/slider/css/nivo-slider.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/vendor/slider/css/preview.css') }}" type="text/css"
          media="screen">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/hover-min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/reImageGrid.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">

    <link rel="stylesheet" type="text/css" href="//unpkg.com/notie/dist/notie.min.css">

    <script src="{{ URL::asset('assets/js/modernizr-2.8.3.min.js') }}"></script>

    <script type="text/javascript">

        var base_url = '{!! url('/') !!}';
        var site_logo = '{{ URL::asset('assets/img/logo-primary.png') }}';

    </script>

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here -->

<!-- Main Body Area Start Here -->
<div id="wrapper">

    @include('layouts.template-header')

    <!-- Page Content Start -->
    @yield('content')
    <!-- Page Content End-->

    @include('layouts.template-footer')

</div>
<!-- Main Body Area End Here -->

<!-- jquery-->
<script src="{{ URL::asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<!-- Plugins js -->
<script src="{{ URL::asset('assets/js/plugins.js') }}" type="text/javascript"></script>
<!-- Bootstrap js -->
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- WOW JS -->
<script src="{{ URL::asset('assets/js/wow.min.js') }}"></script>
<!-- Nivo slider js -->
<script src="{{ URL::asset('assets/vendor/slider/js/jquery.nivo.slider.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/vendor/slider/home.js') }}" type="text/javascript"></script>
<!-- Owl Cauosel JS -->
<script src="{{ URL::asset('assets/vendor/OwlCarousel/owl.carousel.min.js') }}" type="text/javascript"></script>
<!-- Meanmenu Js -->
<script src="{{ URL::asset('assets/js/jquery.meanmenu.min.js') }}" type="text/javascript"></script>
<!-- Srollup js -->
<script src="{{ URL::asset('assets/js/jquery.scrollUp.min.js') }}" type="text/javascript"></script>
<!-- jquery.counterup js -->
{{--<script src="{{ URL::asset('assets/js/jquery.counterup.min.js') }}"></script>--}}
<script src="{{ URL::asset('assets/js/waypoints.min.js') }}" type="text/javascript"></script>
<!-- Countdown js -->
<script src="{{ URL::asset('assets/js/jquery.countdown.min.js') }}" type="text/javascript"></script>
<!-- Isotope js -->
<script src="{{ URL::asset('assets/js/isotope.pkgd.min.js') }}" type="text/javascript"></script>
<!-- Magic Popup js -->
<script src="{{ URL::asset('assets/js/jquery.magnific-popup.min.js') }}" type="text/javascript"></script>
<!-- Gridrotator js -->
<script src="{{ URL::asset('assets/js/jquery.gridrotator.js') }}" type="text/javascript"></script>
<!-- Custom Js -->
<script src="{{ URL::asset('assets/js/main.js') }}" type="text/javascript"></script>

<script src="//unpkg.com/notie" type="text/javascript"></script>

<script type="text/javascript">
    function showNotification(type, message, timeout = 5) {
        notie.alert({
            type: type, // optional, default = 4, enum: [1, 2, 3, 4, 5, 'success', 'warning', 'error', 'info', 'neutral']
            text: message,
            time: timeout, // optional, default = 3, minimum = 1,
            stay: false, // optional, default = false
            position: 'bottom' // optional, default = 'top', enum: ['top', 'bottom']
        })
    }
</script>


@yield('footer_script')


</body>

</html>
