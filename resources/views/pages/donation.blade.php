@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Donation', 'Donation')}}
    <!-- Inner Page Banner Area End Here -->
    <div class="contact-us-page1-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 d-flex flex-column align-items-center">
                    <h2 class="text-center">১২৫বছর  উদযাপন উপলক্ষে donation এর টাকা এই account এ জমা করা যাবে।</h2>
                    <h4 class="text-center">হরিপাল গুরুদয়াল ইনস্টিটিউশন এর ১২৫বছর  উদযাপন উপলক্ষে যে ব্যাংক account খোলা হয়েছে তার details নিচে দেওয়া হলো :</h4>
                    <h3 class="text-center">Bank Details</h3>
                    <h5 class="text-center mt-2">BANK NAME:  Indian Bank<br>
                        Branch Name:Haripal<br>
                        Account Number: 7560326933<br>
                        IFSC: IDIB000H545</h5>
                    <h2 class="text-center">QR</h2>
                    <img src="{{ URL::asset('assets/img/upi.jpeg') }}" alt="upi" style="max-height: 600px; max-width: 400px; display: flex;justify-content: center;align-items: center;">
                    <h4 class="text-center mt-2">After make a donation please whatsapp the screenshot to 9433128188 with your name.    <a href="https://api.whatsapp.com/send?phone=919433128188&text=Hi, I am "
                                                                                                                                          target="_blank">
                            <i class="fa fa-whatsapp wp-my-float"></i>
                        </a></h4>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

@endsection


