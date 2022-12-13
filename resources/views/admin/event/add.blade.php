@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Event</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/event') }}" class="btn btn-primary">List Event</a>
            </div>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'admin/event','role' => 'form', 'class'=>'form-vertical', 'id' => 'portfolio_form','files' => true ]) !!}

            <div class="form-group">
                <label class="control-label text-bold" for="date">Date <span class="required-fields">*</span></label>
                <input type="text" name="date" id="date" class="form-control" required data-msg-required="Please select event date.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="title">Title <span class="required-fields">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required data-msg-required="Please enter event title.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="description">Description <span class="required-fields">*</span></label>
                <textarea class="form-control" rows="5" id="description" name="description" required data-msg-required="Please enter event description."></textarea>
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="event_file">Image</label>
                <input type="file" name="event_file" id="event_file" class="form-control" data-msg-required="Please select a event file." accept="image/*">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="social_site_link">Social Site Link</label>
                <input type="url" name="social_site_link" id="social_site_link" class="form-control" data-msg-required="Please enter social site link.">
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
    <link href="{{ URL::asset('assets/admin/js/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('input#date').datepicker({
                format: "dd-mm-yyyy",
                autoclose: true,
                todayHighlight: true
            });

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
