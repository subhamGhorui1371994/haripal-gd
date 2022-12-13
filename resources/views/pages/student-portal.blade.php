@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Resource Person', 'Resource Person')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Registration Page Area Start Here -->
    <div class="registration-page-area">
        <div class="container">
            <h2 class="sidebar-title text-uppercase">Students Details</h2>
            <div class="registration-details-area inner-page-padding">
                <form id="studentDetails-form" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="courses">Course</label>
                                <select id="courses" class='form-control select-2' required data-msg-required="Please select a course.">
                                    <option value="">Select Course</option>
                                    <option value="B.ED.">B.ED.</option>
                                    <option value="D.EL.ED.">D.EL.ED.</option>
                                </select>
                                <span class="validation-errors"></span>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="session">Session</label>
                                <select id="session" class='form-control select-2' required data-msg-required="Please select a session.">
                                    <option value="">Select Session</option>
                                    <option value="2020-2021">2020-2021</option>
                                    <option value="2019-2020">2019-2020</option>
                                </select>
                                <span class="validation-errors"></span>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                            <div class="pLace-order mt-30 text-center">
                                <button class="view-all-accent-btn" type="submit" value="Login" id="searchStudentData">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="showDownloadButton text-center mb-3" style="display: none"></div>
                <div class="showStudentData" id="showStudentData" style="display: none;border: 2px solid gainsboro">
                    <object data="" type="application/pdf" width="100%" height="800"></object>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Page Area End Here -->
@endsection

@section('footer_script')

    <link href="{{ URL::asset('assets/admin/js/jquery-validation/jquery-validate.css') }}" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/jquery.validate.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/jquery-validation/additional-methods.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.blockUI.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/pdfobject.min.js') }}"></script>

    <link href="{{ URL::asset('assets/admin/js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var date = new Date,
                options = '<option value="">Select Session</option>',
                year = date.getFullYear();

            for (var i = year; i > year - 4; i--) {
                options += `<option value="${i}-${i + 1}">${i}-${i + 1}</option>`;
            }

            $('#session').empty().html(options);

            $('#session, #courses').select2();

            $('#showStudentData').empty().hide();
            $('.showDownloadButton').empty().hide();

            $('#studentDetails-form').validate({
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
                submitHandler: function (form) {
                    if ($(form).valid()) {
                        $('div.registration-page-area').block({
                            message: '<h1 style="font-size: 26px;">Processing your request. Please wait...</h1><img src="'+base_url +'/assets/img/loader.gif" style="width: 100px;margin-bottom: 20px">',
                            css: {border: '3px solid #a00', 'top': '30%!important'}
                        });
                        $.ajax({
                            url: base_url + '/student-portal/get-session-data',
                            type: 'POST',
                            data: {
                                'course': $('#courses').val(),
                                'course_session': $('#session').val()
                            },
                            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                            dataType: 'json',
                        }).done(function (response) {
                            if (response.status === true) {
                                $('#showStudentData').empty().html(`<object data="${base_url + '/' + response.data}" type="application/pdf" width="100%" height="800"><p>This browser does not support file preview. Please click here to download the file. <a href="${base_url + '/' + response.data}" class="btn btn-warning"><i class="fa fa-download"></i> Download</a></p></object>`).show();
                                $('.showDownloadButton').empty().html(`<a href="${base_url + '/' + response.data}" class="btn btn-warning"><i class="fa fa-download mr-2"></i> Click here to Download</a>`).show();
                            } else {
                                showNotification('error', response.msg);
                                $('#showStudentData').empty().hide();
                                $('.showDownloadButton').empty().hide();
                            }
                            $('div.registration-page-area').unblock();
                        });
                    }
                }
            });

        });

    </script>
@endsection
