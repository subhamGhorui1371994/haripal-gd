<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="_token" content="{{csrf_token()}}"/>

    <title>{{ config('app.name', 'Heritage College of Education') }}</title>

    <link href="{{ URL::asset('assets/img/logo.png') }}" rel="icon">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">

    <link href="{{ URL::asset('assets/admin/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/colors.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('assets/admin/css/custom.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript">

        var base_url = '{!! url('/') !!}';

    </script>

    <style></style>

</head>

<body>

@include('layouts.admin-template-header')

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

    @include('layouts.admin-template-sidebar')

    <!-- Main content -->
        <div class="content-wrapper">

        @include('layouts.admin-template-breadcrumb')

        <!-- Content area -->
            <div class="content">

                <!-- Page Content Start -->
            @yield('content')
            <!-- Page Content End-->

                @include('layouts.admin-template-footer')

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

<!-- Core JS files -->
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/pace.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/libraries/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/loaders/blockui.min.js') }}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{ URL::asset('assets/admin/js/plugins/forms/styling/uniform.min.js') }}"></script>

<script type="text/javascript" src="{{ URL::asset('assets/admin/js/core/app.js') }}"></script>
<!-- /theme JS files -->

@yield('footer_script')

</body>

</html>
