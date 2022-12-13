@extends('layouts.admin-template')

@section('content')

    {!! showMessage() !!}

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Header</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'admin/save-site-info','role' => 'form', 'class'=>'form-horizontal', 'id' => 'headerForm','files' => true ]) !!}

            <input type="hidden" id="settings_id" name="settings_id" class="form-control" value="{{$settingsData->id ?? ''}}">
            <input type="hidden" id="settings_type" name="settings_type" class="form-control" value="header_form">
            @if(!empty($settingsData->header_logo))
                <div class="form-group">
                    <label for="header_logo" class="text-bold">Header Logo</label>
                    <input type="file" class="form-control" name="header_logo" id="header_logo" data-msg-required="Please select a image.">
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group">
                    <img src="{{ URL::asset($settingsData->header_logo) }}" alt="Not found" width="100" class="img-thumbnail">
                </div>
            @else
                <div class="form-group">
                    <label for="header_logo" class="text-bold">Header Logo <span class="required-fields">*</span></label>
                    <input type="file" class="form-control" name="header_logo" id="header_logo" required data-msg-required="Please select a image.">
                    <span class="validation-errors"></span>
                </div>
            @endif
            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">Footer</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'admin/save-site-info','role' => 'form', 'class'=>'form-horizontal', 'id' => 'footerForm','files' => true ]) !!}
            <form id="footerForm" class="mt-5">
                <input type="hidden" id="settings_id" name="settings_id" class="form-control" value="{{isset($settingsData->id) ? $settingsData->id : ''}}">
                <input type="hidden" id="settings_type" name="settings_type" class="form-control" value="footer_form">
                @if(!empty($settingsData->footer_logo))
                    <div class="form-group">
                        <label for="footer_logo" class="text-bold">Footer Logo</label>
                        <input type="file" class="form-control" name="footer_logo" id="footer_logo" data-msg-required="Please select a image.">
                        <span class="validation-errors"></span>
                    </div>
                    <div class="form-group">
                        <img src="{{ URL::asset($settingsData->footer_logo) }}" alt="Not found" width="100" class="img-thumbnail">
                    </div>
                @else
                    <div class="form-group">
                        <label for="footer_logo" class="text-bold">Footer Logo <span class="required-fields">*</span></label>
                        <input type="file" class="form-control" name="footer_logo" id="footer_logo" required data-msg-required="Please select a image.">
                        <span class="validation-errors"></span>
                    </div>
                @endif
                <div class="form-group">
                    <label for="short_information" class="text-bold">Short information <span class="required-fields">*</span></label>
                    <textarea class="form-control" name="short_information" id="short_information" rows="5" required data-msg-required="Please enter short information.">{{$settingsData->footer_short_info ?? ''}}</textarea>
                    <span class="validation-errors"></span>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title text-bold">General</h3>
            <div class="heading-elements"></div>
        </div>
        <div class="panel-body">
            {!! Form::open(['url' => 'admin/save-site-info','role' => 'form', 'class'=>'form-horizontal', 'id' => 'generalForm','files' => true ]) !!}
            <input type="hidden" id="settings_id" name="settings_id" class="form-control" value="{{$settingsData->id ?? ''}}">
            <input type="hidden" id="settings_type" name="settings_type" class="form-control" value="general_form">
            <div class="form-group">
                <label for="address" class="text-bold">Address <span class="required-fields">*</span></label>
                <textarea class="form-control" name="address" id="address" rows="5" required data-msg-required="Please provide address.">{{$settingsData->address ?? ''}}</textarea>
            </div>
            <div class="form-group">
                <label for="phone_number" class="text-bold">Phone Number <span class="required-fields">*</span></label>
                <input type="text" class="form-control" name="phone_number" id="phone_number" required data-msg-required="Please provide a phone number." value="{{$settingsData->phone ?? ''}}">
                <span class="validation-errors"></span>
            </div>
            <div class="form-group">
                <label for="short_information" class="text-bold">Email <span class="required-fields">*</span></label>
                <input type="email" class="form-control" name="email_address" id="email_address" required data-msg-required="Please provide a email address." value="{{$settingsData->email ?? ''}}">
                <span class="validation-errors"></span>
            </div>
            <div class="form-group">
                <label for="facebook_url" class="text-bold">Facebook Page URL</label>
                <input type="url" class="form-control" name="facebook_url" id="facebook_url" data-msg-required="Please provide a facebook URL." value="{{$settingsData->facebook_url ?? ''}}">
                <span class="validation-errors"></span>
            </div>
            <div class="form-group">
                <label for="twitter_url" class="text-bold">Twitter Page URL</label>
                <input type="url" class="form-control" name="twitter_url" id="twitter_url" data-msg-required="Please provide a twitter URL." value="{{$settingsData->twitter_url ?? ''}}">
                <span class="validation-errors"></span>
            </div>
            <div class="form-group">
                <label for="instagram_url" class="text-bold">Instagram Page URL</label>
                <input type="url" class="form-control" name="instagram_url" id="instagram_url" data-msg-required="Please provide a instagram URL." value="{{$settingsData->instagram_url ?? ''}}">
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#headerForm').validate({
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
            $('#footerForm').validate({
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
