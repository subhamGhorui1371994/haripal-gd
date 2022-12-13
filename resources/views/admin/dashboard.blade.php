@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel panel-flat">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Dashboard</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            <h1 class="text-center text-uppercase text-bold"><img src="{{ URL::asset('assets/img/logo-primary.png') }}" width="300" class="img-circle"></h1>
            <h1 class="text-center text-uppercase text-bold text-info">Welcome to {{ config('app.name', 'Heritage College of Education') }}</h1>
            <h3 class="text-center text-uppercase text-bold text-danger">Admin panel</h3>
        </div>
    </div>

@endsection

@section('footer_script')
@endsection
