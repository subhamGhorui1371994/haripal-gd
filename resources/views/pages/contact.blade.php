@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Contact Us', 'Contact')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Contact Us Page 1 Area Start Here -->
    <div class="contact-us-page1-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-us-info1">
                        <ul>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h3>Phone</h3>
                                <p>{{$siteSettings->phone ?? '+ 123 456 78910'}}</p>
                            </li>
                            <li>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <h3>Address</h3>
                                <p>{{$siteSettings->address ?? 'Vill.+P.O.-Rabibhag, P.S.-Bagnan, District-Howrah, State-W.B., Pin-711312'}}</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <h3>E-mail</h3>
                                <p>{{$siteSettings->email ?? 'bagnanheritage@gmail.com'}}</p>
                            </li>
                            <li>
                                <h3>Follow Us</h3>
                                <ul class="contact-social">
                                    <li><a href="{{$siteSettings->facebook_url ?? '#'}}"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="{{$siteSettings->twitter_url ?? '#'}}"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="{{$siteSettings->instagram_url ?? '#'}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <h2 class="title-default-left title-bar-high">Contact With Us</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="contact-form1">
                            <form id="contact-form">
                                <fieldset>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Name*" class="form-control" name="name" id="form-name" required data-msg-required="Name field is required">
                                            <span class="validation-errors"></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" placeholder="Email*" class="form-control" name="email" id="form-email" required data-msg-required="Email field is required">
                                                <span class="validation-errors"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" placeholder="Phone Number*" class="form-control" name="phone" id="form-phone" required data-msg-required="Phone number field is required">
                                                <span class="validation-errors"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea placeholder="Message*" class="textarea form-control" name="message" id="form-message" rows="8" cols="20" required data-msg-required="Message field is required"></textarea>
                                            <span class="validation-errors"></span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-md-12">
                                        <div class="form-group margin-bottom-none">
                                            <button type="submit" class="default-big-btn">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-6 col-md-12">
                                        <div class='form-response'></div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid map-area">
            <div class="row">
                <div class="google-map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3687.6825304751637!2d88.01258655118873!3d22.440971843370914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a02854aa4637abb%3A0x2d0096ee43029f4!2sHeritage%20College%20of%20Education%20(B.Ed%20%26%20D.El.Ed)!5e0!3m2!1sen!2sin!4v1644079875065!5m2!1sen!2sin" style="border:0;width:100%; height:500px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Us Page 1 Area End Here -->
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
            $('#contact-form').validate({
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
                        $('div.contact-us-page1-area > .container').block({
                            message: '<h1 style="font-size: 26px;">Processing your request. Please wait...</h1><img src="'+base_url +'/assets/img/loader.gif" style="width: 100px;margin-bottom: 20px">',
                            css: {border: '3px solid #a00', 'top': '30%!important'}
                        });
                        $.ajax({
                            url: base_url + '/contact/submit-request',
                            type: 'POST',
                            data: {
                                'name': $('#form-name').val(),
                                'email': $('#form-email').val(),
                                'mobile': $('#form-phone').val(),
                                'message': $('#form-message').val(),
                            },
                            headers: {'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')},
                            dataType: 'json',
                        }).done(function (response) {
                            if (response.status === true) {
                                $('#contact-form')[0].reset();
                                showNotification('success', response.msg);
                            } else {
                                showNotification('error', response.msg);
                            }
                            $('div.contact-us-page1-area > .container').unblock();
                        });
                    }
                }
            });

        });

    </script>
@endsection
