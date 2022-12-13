@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Banner</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/home-page-banners') }}" class="btn btn-primary">List Banner</a>
            </div>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'admin/home-page-banners','role' => 'form', 'class'=>'form-vertical', 'id' => 'portfolio_form','files' => true ]) !!}

            <div class="form-group">
                <label class="control-label text-bold" for="title">Title <span class="required-fields">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required data-msg-required="Please enter banner title.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="image_link">Image <span class="required-fields">*</span></label>
                <input type="file" name="image_link" id="image_link" class="form-control" required data-msg-required="Please select a banner image file." accept="image/*">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('footer_script')

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('#portfolio_form').validate({
                ignore: [],
                errorPlacement: function errorPlacement(error, element) {
                    $(element).parents('div.form-group').find('span.validation-errors').append(error);
                },
                onfocusout: false,
                highlight: function (element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').addClass(errorClass);
                    } else {
                        $(element).addClass(errorClass);
                    }
                },
                unhighlight: function (element, errorClass) {
                    if ($(element).hasClass('select-2')) {
                        $(element).next('.select2-container').removeClass(errorClass);
                    } else {
                        $(element).removeClass(errorClass);
                    }
                },
            });

        });
    </script>
@endsection
