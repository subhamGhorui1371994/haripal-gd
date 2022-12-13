@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Biometric</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/biometric') }}" class="btn btn-primary">List Biometric</a>
            </div>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'admin/biometric','role' => 'form', 'class'=>'form-vertical', 'id' => 'portfolio_form','files' => true ]) !!}

            <div class="form-group">
                <label class="control-label text-bold" for="year">Year <span class="required-fields">*</span></label>
                <input type="text" name="year" id="year" class="form-control" required data-msg-required="Please enter year.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="month">Month <span class="required-fields">*</span></label>
                {!! Form::select('month',$months, '',['id'=>'month', 'class'=>'form-control select-2', 'required'=>'required', 'data-msg-required'=>'Please select month.'])!!}
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="week1">Week 1 Report</label>
                <input type="file" name="week1" id="week1" class="form-control" data-msg-required="Please select a file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="week2">Week 2 Report</label>
                <input type="file" name="week2" id="week2" class="form-control" data-msg-required="Please select a file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="week3">Week 3 Report</label>
                <input type="file" name="week3" id="week3" class="form-control" data-msg-required="Please select a file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="week4">Week 4 Report</label>
                <input type="file" name="week4" id="week4" class="form-control" data-msg-required="Please select a file.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="week5">Week 5 Report</label>
                <input type="file" name="week5" id="week5" class="form-control" data-msg-required="Please select a file.">
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

    <link href="{{ URL::asset('assets/admin/js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            if ($('select').hasClass('select-2')) {
                $('select.select-2').select2({
                    placeholder: 'Select Month',
                    allowClear: true,
                });
            }

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
