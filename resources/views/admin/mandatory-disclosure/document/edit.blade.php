@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Edit Document</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/mandatory-disclosure/documents') }}" class="btn btn-primary">List Documents</a>
            </div>
        </div>
        <div class="panel-body">
            {{ Form::open(array('method' => 'PATCH','route' => ['documents.update',$documents->id], 'class'=>'form-vertical', 'id' => 'portfolio_form', 'files' => true )) }}

            <div class="form-group">
                <label class="control-label text-bold" for="title">Title <span class="required-fields">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required data-msg-required="Please enter document title." value="{{$documents->title ?? ''}}">
                <span class="validation-errors"></span>
            </div>

            @if($documents->file_link)
                <div class="form-group">
                    <label class="control-label text-bold" for="file_link">File</label>
                    <input type="file" name="file_link" id="file_link" class="form-control" data-msg-required="Please select a file.">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <a href="{{ URL::asset($documents->file_link) }}" target="_blank" class="btn btn-sm btn-outline-warning"><i class="icon-download"></i> Check uploaded file</a>
                </div>
            @else
                <div class="form-group">
                    <label class="control-label text-bold" for="file_link">File <span class="required-fields">*</span></label>
                    <input type="file" name="file_link" id="file_link" class="form-control" required data-msg-required="Please select a file.">
                    <span class="validation-errors"></span>
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

