@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Edit Affiliation</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/affiliations') }}" class="btn btn-primary">List Affiliations</a>
            </div>
        </div>
        <div class="panel-body">
            {{ Form::open(array('method' => 'PATCH','route' => ['affiliations.update',$affiliations->id], 'class'=>'form-vertical', 'id' => 'portfolio_form', 'files' => true )) }}

            <div class="form-group">
                <label class="control-label text-bold" for="title">Title <span class="required-fields">*</span></label>
                <input type="text" name="title" id="title" class="form-control" required data-msg-required="Please enter title." value="{{$affiliations->title ?? ''}}">
                <span class="validation-errors"></span>
            </div>

            @if($affiliations->logo)
                <div class="form-group">
                    <label class="control-label text-bold" for="logo">Logo</label>
                    <input type="file" name="logo" id="logo" class="form-control" data-msg-required="Please select a logo file." accept="image/*">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <img src="{{ URL::asset($affiliations->logo) }}" class="img-thumbnail" width="100">
                </div>
            @else
                <div class="form-group">
                    <label class="control-label text-bold" for="logo">Logo <span class="required-fields">*</span></label>
                    <input type="file" name="logo" id="logo" class="form-control" required data-msg-required="Please select a logo file." accept="image/*">
                    <span class="validation-errors"></span>
                </div>
            @endif

            <div class="form-group">
                <label class="control-label text-bold" for="link">URL <span class="required-fields">*</span></label>
                <input type="url" name="link" id="link" class="form-control" required data-msg-required="Please enter the URL." value="{{$affiliations->link ?? ''}}">
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

