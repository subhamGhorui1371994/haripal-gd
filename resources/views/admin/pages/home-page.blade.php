@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Banners</h3>
            <div class="heading-elements"><a href="{{ url('admin/home-page-banners') }}" class="btn btn-primary">Manage Banners</a></div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Home Page Content</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'admin/save-home-page','role' => 'form', 'class'=>'form-horizontal', 'id' => 'generalForm','files' => true ]) !!}
            <form id="footerForm" class="mt-5">
                <input type="hidden" id="home_content_id" name="home_content_id" class="form-control" value="{{isset($settingsData->id) ? $settingsData->id : ''}}">

                <div class="form-group">
                    <label for="welcome_title" class="text-bold">Welcome Title <span class="required-fields">*</span></label>
                    <input type="text" class="form-control" name="welcome_title" id="welcome_title" required data-msg-required="Please enter welcome title." value="{{$settingsData->welcome_title ?? ''}}">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <label for="welcome_content" class="text-bold">Welcome Content <span class="required-fields">*</span></label>
                    <textarea class="form-control" name="welcome_content" id="welcome_content" rows="5" required data-msg-required="Please enter welcome section content.">{{$settingsData->welcome_content ?? ''}}</textarea>
                    <span class="validation-errors"></span>
                </div>

                <hr>

                <div class="form-group">
                    <label for="about_us_title" class="text-bold">About Us Title <span class="required-fields">*</span></label>
                    <input type="text" class="form-control" name="about_us_title" id="about_us_title" required data-msg-required="Please enter about us title." value="{{$settingsData->about_us_title ?? ''}}">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <label for="about_us_content" class="text-bold">About Us Content <span class="required-fields">*</span></label>
                    <textarea class="form-control" name="about_us_content" id="about_us_content" rows="5" required data-msg-required="Please enter about us section content.">{{$settingsData->about_us_content ?? ''}}</textarea>
                    <span class="validation-errors"></span>
                </div>

                <hr>

                <div class="form-group">
                    <label for="about_trust_title" class="text-bold">About Trust Title <span class="required-fields">*</span></label>
                    <input type="text" class="form-control" name="about_trust_title" id="about_trust_title" required data-msg-required="Please enter about trust title." value="{{$settingsData->about_trust_title ?? ''}}">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <label for="about_trust_content" class="text-bold">About Trust Content <span class="required-fields">*</span></label>
                    <textarea class="form-control" name="about_trust_content" id="about_trust_content" rows="5" required data-msg-required="Please enter about trust section content.">{{$settingsData->about_trust_content ?? ''}}</textarea>
                    <span class="validation-errors"></span>
                </div>

                <hr>

                <div class="form-group">
                    <label for="president_desk_title" class="text-bold">President Desk Title <span class="required-fields">*</span></label>
                    <input type="text" class="form-control" name="president_desk_title" id="president_desk_title" required data-msg-required="Please enter president desk title." value="{{$settingsData->president_desk_title ?? ''}}">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <label for="president_desk_content" class="text-bold">President Desk Content <span class="required-fields">*</span></label>
                    <textarea class="form-control" name="president_desk_content" id="president_desk_content" rows="5" required data-msg-required="Please enter president desk section content.">{{$settingsData->president_desk_content ?? ''}}</textarea>
                    <span class="validation-errors"></span>
                </div>

                <hr>

                <div class="form-group">
                    <label for="secretary_desk_title" class="text-bold">Secretary Desk Title <span class="required-fields">*</span></label>
                    <input type="text" class="form-control" name="secretary_desk_title" id="secretary_desk_title" required data-msg-required="Please enter secretary desk title." value="{{$settingsData->secretary_desk_title ?? ''}}">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <label for="secretary_desk_content" class="text-bold">Secretary Desk Content <span class="required-fields">*</span></label>
                    <textarea class="form-control" name="secretary_desk_content" id="secretary_desk_content" rows="5" required data-msg-required="Please enter secretary desk section content.">{{$settingsData->secretary_desk_content ?? ''}}</textarea>
                    <span class="validation-errors"></span>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            {!! Form::close() !!}
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

            $('#generalForm').validate({
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
