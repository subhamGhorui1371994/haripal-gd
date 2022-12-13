@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Edit Gallery Category</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/gallery-category') }}" class="btn btn-primary">List Category</a>
            </div>
        </div>
        <div class="panel-body">

            {{ Form::open(array('method' => 'PATCH','route' => ['gallery-category.update',$galleryCategory->id], 'class'=>'form-vertical', 'id' => 'portfolio_form', 'files' => true )) }}
            <div class="form-group">
                <label class="control-label text-bold" for="category_id">Category <span class="required-fields">*</span></label>
                <input type="text" class="form-control" name="category_name" id="category_name" required data-msg-required="Please enter a category name." value="{{$galleryCategory->name??''}}">
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
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            if ($('select').hasClass('select-2')) {
                $('select.select-2').select2({
                    placeholder: 'Select Category',
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
