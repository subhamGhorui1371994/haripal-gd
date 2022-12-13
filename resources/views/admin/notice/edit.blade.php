@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Edit Notice</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/notice') }}" class="btn btn-primary">List Notice</a>
            </div>
        </div>
        <div class="panel-body">
            {{ Form::open(array('method' => 'PATCH','route' => ['notice.update',$notice->id], 'class'=>'form-vertical', 'id' => 'portfolio_form', 'files' => true )) }}

            <div class="form-group">
                <label class="control-label text-bold" for="date">Date <span class="required-fields">*</span></label>
                <input type="text" name="date" id="date" class="form-control" required data-msg-required="Please select notice date." value="{{$notice->date ? date('d-m-Y', strtotime($notice->date)) : ''}}">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="title">Title <span class="required-fields">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required data-msg-required="Please enter notice title." value="{{$notice->title ?? ''}}">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="description">Description <span class="required-fields">*</span></label>
                <textarea class="form-control" rows="5" id="description" name="description" required data-msg-required="Please enter notice description.">{{$notice->description ?? ''}}</textarea>
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="notice_file">File</label>
                <input type="file" name="notice_file" id="notice_file" class="form-control" data-msg-required="Please select a notice file.">
                <span class="validation-errors"></span>
            </div>

            @if($notice->file)
                <div class="form-group">
                    <a href="{{ URL::asset($notice->file) }}" target="_blank" class="btn btn-sm btn-outline-warning"><i class="icon-download"></i> Check uploaded file</a>
                </div>
            @endif

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

