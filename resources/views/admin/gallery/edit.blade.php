@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Edit Gallery Image</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/gallery-category') }}" class="btn btn-warning">Manage Category</a>
                <a href="{{ url('admin/gallery') }}" class="btn btn-primary">List Gallery</a>
            </div>
        </div>
        <div class="panel-body">

            {{ Form::open(array('method' => 'PATCH','route' => ['gallery.update',$gallery->id], 'class'=>'form-vertical', 'id' => 'portfolio_form', 'files' => true )) }}
            <div class="form-group">
                <label class="control-label text-bold" for="category_id">Category <span class="required-fields">*</span></label>
                {!! Form::select('category_id',$galleryCategory, $gallery->category_id,['id'=>'category_id', 'class'=>'form-control select-2', 'required'=>'required', 'data-msg-required'=>'Please select a category.'])!!}
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="gallery_image">Image <span class="text-danger">*</span></label>
                <input type="file" name="gallery_image" id="gallery_image" class="form-control" required data-msg-required="Please select a gallery image." accept="image/*">
                <span class="validation-errors"></span>

                @if($gallery->image)
                    <img src="{{ URL::asset($gallery->image) }}" alt="" style="width: 200px;margin-top:15px" class="img-thumbnail">
                @endif
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
