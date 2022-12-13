@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Mandatory Disclosure', 'Mandatory Disclosure')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Area Start Here -->
    <div class="shop-details-page-area mandatory-disclosure">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 order-md-1">
                    <div class="inner-shop-details">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <h3 class="title-default-left title-bar-big-left-close text-uppercase">Mandatory Disclosure</h3>
                                <div class="text-justify">{!! html_entity_decode($mandatoryDisclosureData->description) !!}</div>

                                <hr>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <a href="{{ URL::asset(checkAndRenderImage($mandatoryDisclosureData->dled_md_format, '#')) }}" class="enroll-btn w-100 hvr-float-shadow">
                                            (For D.EL.ED.)
                                            <br>
                                            <i class="fa fa-download mr-3"></i> Download the mandatory disclosure format
                                        </a>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <a href="{{ URL::asset(checkAndRenderImage($mandatoryDisclosureData->bed_md_format, '#')) }}" class="enroll-btn w-100 hvr-float-shadow">
                                            (For B.ED.)
                                            <br>
                                            <i class="fa fa-download mr-3"></i> Download the mandatory disclosure format
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <a href="{{ URL::asset(checkAndRenderImage($mandatoryDisclosureData->balance_sheet, '#')) }}" class="default-big-btn w-100 hvr-float-shadow"><i class="fa fa-download mr-3"></i> Balance Sheet</a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <a href="{{ URL::asset(checkAndRenderImage($mandatoryDisclosureData->income_and_expenditure, '#')) }}" class="default-big-btn w-100 hvr-float-shadow"><i class="fa fa-download mr-3"></i> Income & Expenditure</a>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                                        <a href="{{ URL::asset(checkAndRenderImage($mandatoryDisclosureData->receipt_payment, '#')) }}" class="default-big-btn w-100 hvr-float-shadow"><i class="fa fa-download mr-3"></i> Receipt & Payment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 order-md-2">
                    <div class="sidebar">
                        <div class="sidebar-box">
                            <div class="sidebar-box-inner">
                                <h3 class="sidebar-title text-uppercase">Download Documents</h3>
                                <ul class="sidebar-categories">
                                    @if(!empty($documents->toArray()))
                                        @foreach($documents as $key => $document)
                                            <li><a href="{{ URL::asset(checkAndRenderImage($document->file_link, '#')) }}"><i class="fa fa-download mr-3"></i> {{$document->title}}</a></li>
                                        @endforeach
                                    @else
                                        <li>No documents found.</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Area End Here -->

@endsection
