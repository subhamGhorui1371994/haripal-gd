@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Add Resource Person</h3>
            <div class="heading-elements">
                <a href="{{ url('admin/resource-person') }}" class="btn btn-primary">List Resource Person</a>
            </div>
        </div>
        <div class="panel-body">

            {!! Form::open(['url' => 'admin/resource-person','role' => 'form', 'class'=>'form-vertical', 'id' => 'portfolio_form','files' => true ]) !!}

            <div class="form-group">
                <label class="control-label text-bold" for="resource_person_type">Resource Person Type <span class="required-fields">*</span></label>
                {!! Form::select('resource_person_type',$resourcePersonTypes, '',['id'=>'resource_person_type', 'class'=>'form-control select-2', 'required'=>'required', 'data-msg-required'=>'Please select resource person type.'])!!}
                <span class="validation-errors"></span>
            </div>

            <div class="form-group resource-person-course">
                <label class="control-label text-bold" for="resource_person_type">Course <span class="required-fields">*</span></label>
                {!! Form::select('course[]',['bed'=>'B. Ed.', 'dled' => 'D. El. Ed.'], '',['id'=>'course', 'class'=>'form-control select-2', 'multiple'=>'multiple', 'required'=>'required', 'data-msg-required'=>'Please select resource person course.'])!!}
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="photo">Photo</label>
                <input type="file" name="photo" id="photo" class="form-control" data-msg-required="Please select a image for resource person." accept="image/*">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="name">Name <span class="required-fields">*</span></label>
                <input type="text" name="name" id="name" class="form-control" required data-msg-required="Please enter name.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="email">Email <span class="required-fields">*</span></label>
                <input type="email" name="email" id="email" class="form-control" required data-msg-required="Please enter email.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="mobile">Mobile <span class="required-fields">*</span></label>
                <input type="text" name="mobile" id="mobile" class="form-control" required data-msg-required="Please enter mobile.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="qualification">Qualification</label>
                <input type="text" name="qualification" id="qualification" class="form-control" data-msg-required="Please enter qualification.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="designation">Designation</label>
                <input type="text" name="designation" id="designation" class="form-control" data-msg-required="Please enter designation.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="experience">Experience</label>
                <input type="text" name="experience" id="experience" class="form-control" data-msg-required="Please enter experience.">
                <span class="validation-errors"></span>
            </div>

            <div class="form-group">
                <label class="control-label text-bold" for="salary">Salary</label>
                <input type="text" name="salary" id="salary" class="form-control" data-msg-required="Please enter salary.">
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

            $('#resource_person_type').select2({
                placeholder: 'Select Resource Person Type',
                allowClear: true,
            });

            $('#course').select2({
                placeholder: 'Select Course',
                allowClear: true,
            });

            $('.resource-person-course').hide();

            $('#resource_person_type').change(function () {
               let value = $(this).val();
               if(value === 'Teaching Staff') {
                   $('#course').attr('required', true);
                   $('.resource-person-course').show();
               } else {
                   $('#course').attr('required', false);
                   $('.resource-person-course').hide();
               }
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
