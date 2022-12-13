@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Session Students</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/students') }}" class="btn btn-primary">List Session Students</a>
            </div>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'admin/students','role' => 'form', 'class'=>'form-vertical', 'id' => 'portfolio_form','files' => true ]) !!}

            <div class="form-group">
                <label class="control-label text-bold" for="course_type">Course <span class="required-fields">*</span></label>
                {!! Form::select('course_type',[''=>'Select Course', 'B.ED.' => 'B.ED.', 'D.EL.ED.'=> 'D.EL.ED.'], '',['id'=>'course_type', 'class'=>'form-control select-2', 'required'=>'required', 'data-msg-required'=>'Please select a course.'])!!}
                <span class="validation-errors"></span>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label text-bold" for="session_start">Session Start <span class="required-fields">*</span></label>
                    <input type="text" name="session_start" id="session_start" class="form-control" required data-msg-required="Please enter session start year.">
                    <span class="validation-errors"></span>
                </div>

                <div class="form-group col-md-6">
                    <label class="control-label text-bold" for="session_end">Session End <span class="required-fields">*</span></label>
                    <input type="text" name="session_end" id="session_end" class="form-control" required data-msg-required="Please enter session end year.">
                    <span class="validation-errors"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="logo">Students File <span class="required-fields">*</span></label>
                <input type="file" name="student_data" id="student_data" class="form-control" required data-msg-required="Please select a students file.">
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

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('input#session_start').datepicker({
                format: "yyyy",
                autoclose: true,
                viewMode: "years",
                minViewMode: "years"
            });

            $('input#session_end').datepicker({
                format: "yyyy",
                autoclose: true,
                viewMode: "years",
                minViewMode: "years"
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
