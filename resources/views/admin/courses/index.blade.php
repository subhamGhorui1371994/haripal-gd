@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">B. Ed. Course</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-courses','role' => 'form', 'class'=>'', 'id' => 'bedForm','files' => true ]) !!}
                    <input type="hidden" id="course_id" name="course_id" class="form-control" value="{{$bedCourseData->id ?? ''}}">
                    <input type="hidden" id="course_type" name="course_type" class="form-control" value="bed">
                    <div class="form-group">
                        <label for="course_name" class="text-bold">Course Title <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="course_name" id="course_name" required data-msg-required="Please enter course name." value="{{$bedCourseData->course_name ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="duration" class="text-bold">Duration <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="duration" id="duration" required data-msg-required="Please enter duration." value="{{$bedCourseData->duration ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="exam_type" class="text-bold">Exam Type <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="exam_type" id="exam_type" required data-msg-required="Please enter exam type." value="{{$bedCourseData->exam_type ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="course" class="text-bold">Method Subjects <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="course" id="course" required data-msg-required="Please enter method subjects." value="{{$bedCourseData->course ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="intake_capacity" class="text-bold">Intake Capacity <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="intake_capacity" id="intake_capacity" required data-msg-required="Please enter intake capacity." value="{{$bedCourseData->intake_capacity ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="board" class="text-bold">Affiliated Board <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="board" id="board" required data-msg-required="Please enter affiliated board." value="{{$bedCourseData->board ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="session" class="text-bold">Session Start <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="session" id="session" required data-msg-required="Please enter session start." value="{{$bedCourseData->session ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($bedCourseData->syllabus))
                        <div class="form-group">
                            <label for="syllabus" class="text-bold">Syllabus</label>
                            <input type="file" class="form-control" name="syllabus" id="syllabus" data-msg-required="Please select a file.">
                            <span class="validation-errors"></span>
                        </div>
                        <div class="form-group">
                            <a href="{{ URL::asset($bedCourseData->syllabus) }}" target="_blank"><i class="icon-download"></i> Check uploaded syllabus</a>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="syllabus" class="text-bold">Syllabus <span class="required-fields">*</span></label>
                            <input type="file" class="form-control" name="syllabus" id="syllabus" required data-msg-required="Please select a file.">
                            <span class="validation-errors"></span>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="admission_link" class="text-bold">Admission Button Link <span class="required-fields">*</span></label>
                        <input type="url" class="form-control" name="admission_link" id="admission_link" required data-msg-required="Please enter admission url." value="{{$bedCourseData->admission_link ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">D. El. Ed. Course</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-courses','role' => 'form', 'class'=>'', 'id' => 'dledForm','files' => true ]) !!}
                    <input type="hidden" id="course_id" name="course_id" class="form-control" value="{{$dledCourseData->id ?? ''}}">
                    <input type="hidden" id="course_type" name="course_type" class="form-control" value="dled">
                    <div class="form-group">
                        <label for="course_name" class="text-bold">Course Title <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="course_name" id="course_name" required data-msg-required="Please enter course name." value="{{$dledCourseData->course_name ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="duration" class="text-bold">Duration <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="duration" id="duration" required data-msg-required="Please enter duration." value="{{$dledCourseData->duration ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="exam_type" class="text-bold">Exam Type <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="exam_type" id="exam_type" required data-msg-required="Please enter exam type." value="{{$dledCourseData->exam_type ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="course" class="text-bold">Medium of Course <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="course" id="course" required data-msg-required="Please enter method subjects." value="{{$dledCourseData->course ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="intake_capacity" class="text-bold">Intake Capacity <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="intake_capacity" id="intake_capacity" required data-msg-required="Please enter intake capacity." value="{{$dledCourseData->intake_capacity ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="board" class="text-bold">Affiliated Board <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="board" id="board" required data-msg-required="Please enter affiliated board." value="{{$dledCourseData->board ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <label for="session" class="text-bold">Session Start <span class="required-fields">*</span></label>
                        <input type="text" class="form-control" name="session" id="session" required data-msg-required="Please enter session start." value="{{$dledCourseData->session ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    @if(!empty($dledCourseData->syllabus))
                        <div class="form-group">
                            <label for="syllabus" class="text-bold">Syllabus</label>
                            <input type="file" class="form-control" name="syllabus" id="syllabus" data-msg-required="Please select a file.">
                            <span class="validation-errors"></span>
                        </div>
                        <div class="form-group">
                            <a href="{{ URL::asset($dledCourseData->syllabus) }}" target="_blank"><i class="icon-download"></i> Check uploaded syllabus</a>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="syllabus" class="text-bold">Syllabus <span class="required-fields">*</span></label>
                            <input type="file" class="form-control" name="syllabus" id="syllabus" required data-msg-required="Please select a file.">
                            <span class="validation-errors"></span>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="admission_link" class="text-bold">Admission Button Link <span class="required-fields">*</span></label>
                        <input type="url" class="form-control" name="admission_link" id="admission_link" required data-msg-required="Please enter admission url." value="{{$dledCourseData->admission_link ?? ''}}">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group mb-0">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_script')

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#bedForm').validate({
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
            $('#dledForm').validate({
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
        })
    </script>
@endsection
