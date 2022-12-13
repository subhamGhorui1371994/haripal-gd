@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Building</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm1','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="building">

                    <div class="form-group">
                        <label for="building" class="text-bold display-none">Course Title <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="building" id="building" required data-msg-required="Building field is required.">{{$infrastructureData->building ?? ''}}</textarea>
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
                    <h3 class="panel-title text-bold">Campus</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm2','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="campus">

                    <div class="form-group">
                        <label for="campus" class="text-bold display-none">Campus <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="campus" id="campus" required data-msg-required="Campus field is required.">{{$infrastructureData->campus ?? ''}}</textarea>
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
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Class Rooms</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm3','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="class_rooms">

                    <div class="form-group">
                        <label for="class_rooms" class="text-bold display-none">Class Rooms <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="class_rooms" id="class_rooms" required data-msg-required="Class rooms field is required.">{{$infrastructureData->class_rooms ?? ''}}</textarea>
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
                    <h3 class="panel-title text-bold">Smart Class</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm4','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="smart_class">

                    <div class="form-group">
                        <label for="smart_class" class="text-bold display-none">Smart Class <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="smart_class" id="smart_class" required data-msg-required="Smart class field is required.">{{$infrastructureData->smart_class ?? ''}}</textarea>
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
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Laboratories</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm5','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="laboratories">

                    <div class="form-group">
                        <label for="laboratories" class="text-bold display-none">Laboratories <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="laboratories" id="laboratories" required data-msg-required="Laboratories field is required.">{{$infrastructureData->laboratories ?? ''}}</textarea>
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
                    <h3 class="panel-title text-bold">Music</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm6','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="music">

                    <div class="form-group">
                        <label for="music" class="text-bold display-none">Music <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="music" id="music" required data-msg-required="Music field is required.">{{$infrastructureData->music ?? ''}}</textarea>
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
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title text-bold">Library</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm7','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="library">

                    <div class="form-group">
                        <label for="library" class="text-bold display-none">Library <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="library" id="library" required data-msg-required="Library field is required.">{{$infrastructureData->library ?? ''}}</textarea>
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
                    <h3 class="panel-title text-bold">Canteen</h3>
                    <div class="heading-elements"></div>
                </div>
                <div class="panel-body">
                    {!! Form::open(['url' => 'admin/save-infrastructure','role' => 'form', 'class'=>'', 'id' => 'infrastructureForm8','files' => true ]) !!}

                    <input type="hidden" id="infrastructure_id" name="infrastructure_id" class="form-control" value="{{$infrastructureData->id ?? ''}}">
                    <input type="hidden" id="infrastructure_type" name="infrastructure_type" class="form-control" value="canteen">

                    <div class="form-group">
                        <label for="canteen" class="text-bold display-none">Canteen <span class="required-fields">*</span></label>
                        <textarea class="form-control" name="canteen" id="canteen" required data-msg-required="Canteen field is required.">{{$infrastructureData->canteen ?? ''}}</textarea>
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

    <script src="//cdn.tiny.cloud/1/5lrxjaz6k4182tsdt4ftj6ezr145iiaejnw9nrannsilrejn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            tinymce.init({
                selector: 'textarea.form-control',
                plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen link template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount textpattern noneditable help charmap quickbars emoticons',
                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | template link anchor codesample | ltr rtl',
                menubar: 'file edit view insert format tools table help',
                toolbar_sticky: true,
                toolbar_mode: 'sliding',
                height: 300,
                image_caption: true,
                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quicktable',
                contextmenu: 'link table',
            });

            $('#infrastructureForm1').validate({
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
            $('#infrastructureForm2').validate({
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

            $('#infrastructureForm3').validate({
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
            $('#infrastructureForm4').validate({
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

            $('#infrastructureForm5').validate({
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
            $('#infrastructureForm6').validate({
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

            $('#infrastructureForm7').validate({
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
            $('#infrastructureForm8').validate({
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
