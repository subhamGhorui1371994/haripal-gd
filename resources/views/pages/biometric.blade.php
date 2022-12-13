@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Biometric Attendance', 'Biometric Attendance')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Registration Page Area Start Here -->
    <div class="registration-page-area">
        <div class="container">
            <h2 class="sidebar-title text-uppercase">Biometric Attendance Reports</h2>
            <div class="registration-details-area inner-page-padding">
                <form id="biometricAttendance-form" method="post">
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="year">Year</label>
                                <select id="year" class='form-control select-2' name="year" required data-msg-required="Please select a year.">
                                    <option value="">Select Year</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                </select>
                                <span class="validation-errors"></span>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12">
                            <div class="form-group">
                                <label class="control-label" for="month">Month</label>
                                <select id="month" class='form-control select-2' name="month" required data-msg-required="Please select a month.">
                                    <option value="">Select Month</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <span class="validation-errors"></span>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                            <div class="pLace-order mt-30 text-center">
                                <button class="view-all-accent-btn" type="submit" value="Login">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="biometric-report-download-row text-center" style="display: none">
                    <hr>
                    <ul class="featured-links biometric-report-links">
                        <li class="first_week_report"><a href="#" class="enroll-btn hvr-float-shadow"><i class="fa fa-download mr-3"></i> 1st week report</a></li>
                        <li class="second_week_report"><a href="#" class="enroll-btn hvr-float-shadow"><i class="fa fa-download mr-3"></i> 2nd week report</a></li>
                        <li class="third_week_report"><a href="#" class="enroll-btn hvr-float-shadow"><i class="fa fa-download mr-3"></i> 3rd week report</a></li>
                        <li class="fourth_week_report"><a href="#" class="enroll-btn hvr-float-shadow"><i class="fa fa-download mr-3"></i> 4th week report</a></li>
                        <li class="fifth_week_report"><a href="#" class="enroll-btn hvr-float-shadow"><i class="fa fa-download mr-3"></i> 5th week report</a></li>
                    </ul>
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

    <link href="{{ URL::asset('assets/admin/js/select2/dist/css/select2.min.css') }}" rel="stylesheet"/>
    <script type="text/javascript" src="{{ URL::asset('assets/admin/js/select2/dist/js/select2.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var date = new Date,
                options = '<option value="">Select Year</option>',
                year = date.getFullYear();

            for (var i = year; i > year - 4; i--) {
                options += `<option value="${i}">${i}</option>`;
            }

            $('#year').empty().html(options);

            $('#year, #month').select2();

            $('.biometric-report-download-row').hide();

            $('#biometricAttendance-form').validate({
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
                            url: base_url + '/biometric/get-report-data',
                            type: 'POST',
                            data: {
                                'year': $('#year').val(),
                                'month': $('#month').val()
                            },
                            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                            dataType: 'json',
                        }).done(function (response) {
                            if (response.status === true) {
                                let urlPrefix = base_url + '/';
                                if(response.data.week1) {
                                    $('.biometric-report-links').find('li.first_week_report a').attr('href', urlPrefix + response.data.week1);
                                    $('.biometric-report-links').find('li.first_week_report').show();
                                } else {
                                    $('.biometric-report-links').find('li.first_week_report').hide();
                                }
                                if(response.data.week2) {
                                    $('.biometric-report-links').find('li.second_week_report a').attr('href', urlPrefix + response.data.week2);
                                    $('.biometric-report-links').find('li.second_week_report').show();
                                } else {
                                    $('.biometric-report-links').find('li.second_week_report').hide();
                                }
                                if(response.data.week3) {
                                    $('.biometric-report-links').find('li.third_week_report a').attr('href', urlPrefix + response.data.week3);
                                    $('.biometric-report-links').find('li.third_week_report').show();
                                } else {
                                    $('.biometric-report-links').find('li.third_week_report').hide();
                                }
                                if(response.data.week4) {
                                    $('.biometric-report-links').find('li.fourth_week_report a').attr('href', urlPrefix + response.data.week4);
                                    $('.biometric-report-links').find('li.fourth_week_report').show();
                                } else {
                                    $('.biometric-report-links').find('li.fourth_week_report').hide();
                                }
                                if(response.data.week5) {
                                    $('.biometric-report-links').find('li.fifth_week_report a').attr('href', urlPrefix + response.data.week5);
                                    $('.biometric-report-links').find('li.fifth_week_report').show();
                                } else {
                                    $('.biometric-report-links').find('li.fifth_week_report').hide();
                                }
                                $('.biometric-report-download-row').show();
                            } else {
                                showNotification('error', response.msg);
                                $('.biometric-report-download-row').hide();
                            }
                            $('div.registration-page-area').unblock();
                        });
                    }
                }
            });

        });

    </script>
@endsection
