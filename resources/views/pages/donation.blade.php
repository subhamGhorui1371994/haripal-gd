@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Donation', 'Donation')}}
    <!-- Inner Page Banner Area End Here -->
    <div class="contact-us-page1-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex flex-column align-items-center">
                    <h1 class="text-center">UPI Details</h1>
                    <h3 class="text-center">haripalgf125@indianbk</h3>
                    <h1 class="text-center">QR</h1>
                    <img src="{{ URL::asset('assets/img/upi.jpeg') }}" alt="upi" style="max-height: 600px; max-width: 400px; display: flex;justify-content: center;align-items: center;">
                    <h5 class="text-center mt-2">After make a donation please whatsapp the screenshot to 9046078057 with your name.</h5>
                </div>
            </div>
        </div>
    </div>
@endsection


