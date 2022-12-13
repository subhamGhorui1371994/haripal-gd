@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Resource Person', 'Resource Person')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Shop Page 1 Area Start Here -->
    <div class="shop-details-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="inner-shop-details">
                        <h3 class="sidebar-title text-uppercase"><a>Our Resource Persons</a></h3>
                        <div class="product-details-tab-area">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <ul class="nav" role="tablist">
                                        <li class="menu-item" role="presentation"><a class="menu-link active" id="menu-4-tab" data-bs-toggle="tab" href="#menu-4" role="tab" aria-controls="menu-4" aria-selected="true">Teaching Staff</a></li>
                                        <li class="menu-item" role="presentation"><a class="menu-link" id="menu-5-tab" data-bs-toggle="tab" href="#menu-5" role="tab" aria-controls="menu-5" aria-selected="false">Non Teaching Staff</a></li>
                                        <li class="menu-item" role="presentation"><a class="menu-link" id="menu-6-tab" data-bs-toggle="tab" href="#menu-6" role="tab" aria-controls="menu-6" aria-selected="false">Administrative</a></li>
                                    </ul>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="tab-content">
                                        <div class="tab-pane tab-item animated fadeIn show active" id="menu-4" role="tabpanel" aria-labelledby="menu-4-tab">
                                            <h3 class="sidebar-title text-uppercase"><a>B. Ed. Teachers</a></h3>
                                            <div class="table-responsive" style="max-height:626px;overflow:auto;">
                                                <table class="table table-bordered table-responsive" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Sl. No.</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Photo</th>
                                                        <th class="text-center text-uppercase" style="width: 30%;">Name</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Experience</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Designation</th>
                                                        <th class="text-center text-uppercase" style="width: 20%;">Qualification</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Salary</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(!empty($bedTeachingStaff->toArray()))
                                                        @foreach($bedTeachingStaff as $key => $staff)
                                                            <tr>
                                                                <th class="text-center">{{($key+1)}}</th>
                                                                <th class="text-center"><img src="{{ URL::asset(checkAndRenderImage($staff->photo,'assets/img/course/24.jpg')) }}" alt="course" style="width: 100px; height: 100px" class="img-responsive"></th>
                                                                <td class="text-center">{{$staff->name ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->experience ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->designation ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->qualification ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->salary ?? '****'}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No staff found.</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                            <hr>
                                            <h3 class="sidebar-title text-uppercase"><a>D. El. Ed. Teachers</a></h3>
                                            <div class="table-responsive" style="max-height:626px;overflow:auto;">
                                                <table class="table table-bordered table-responsive" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Sl. No.</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Photo</th>
                                                        <th class="text-center text-uppercase" style="width: 30%;">Name</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Experience</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Designation</th>
                                                        <th class="text-center text-uppercase" style="width: 20%;">Qualification</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Salary</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(!empty($dledTeachingStaff->toArray()))
                                                        @foreach($dledTeachingStaff as $key => $staff)
                                                            <tr>
                                                                <th class="text-center">{{($key+1)}}</th>
                                                                <th class="text-center"><img src="{{ URL::asset(checkAndRenderImage($staff->photo,'assets/img/course/24.jpg')) }}" alt="course" style="width: 100px; height: 100px" class="img-responsive"></th>
                                                                <td class="text-center">{{$staff->name ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->experience ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->designation ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->qualification ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->salary ?? '****'}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No staff found.</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane tab-item animated fadeIn" id="menu-5" role="tabpanel" aria-labelledby="menu-5-tab">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-responsive" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Sl. No.</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Photo</th>
                                                        <th class="text-center text-uppercase" style="width: 30%;">Name</th>
                                                        <th class="text-center text-uppercase" style="width: 20%;">Designation</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Qualification</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Mobile</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Salary</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(!empty($nonTeachingStaff->toArray()))
                                                        @foreach($nonTeachingStaff as $key => $staff)
                                                            <tr>
                                                                <th class="text-center">{{($key+1)}}</th>
                                                                <th class="text-center"><img src="{{ URL::asset(checkAndRenderImage($staff->photo,'assets/img/course/24.jpg')) }}" alt="course" style="width: 100px; height: 100px" class="img-responsive"></th>
                                                                <td class="text-center">{{$staff->name ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->designation ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->qualification ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->mobile ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->salary ?? '****'}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No staff found.</td>
                                                        </tr>
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane tab-item animated fadeIn" id="menu-6" role="tabpanel" aria-labelledby="menu-6-tab">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-responsive" style="width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Sl. No.</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Photo</th>
                                                        <th class="text-center text-uppercase" style="width: 30%;">Name</th>
                                                        <th class="text-center text-uppercase" style="width: 25%;">Designation</th>
                                                        <th class="text-center text-uppercase" style="width: 10%;">Qualification</th>
                                                        <th class="text-center text-uppercase" style="width: 15%;">Mobile</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(!empty($administrativeStaff->toArray()))
                                                        @foreach($administrativeStaff as $key => $staff)
                                                            <tr>
                                                                <th class="text-center">{{($key+1)}}</th>
                                                                <th class="text-center"><img src="{{ URL::asset(checkAndRenderImage($staff->photo,'assets/img/course/24.jpg')) }}" alt="course" style="width: 100px; height: 100px" class="img-responsive"></th>
                                                                <td class="text-center">{{$staff->name ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->designation ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->qualification ?? '****'}}</td>
                                                                <td class="text-center">{{$staff->mobile ?? '****'}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="7" class="text-center">No staff found.</td>
                                                        </tr>
                                                    @endif</tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page 1 Area End Here -->
@endsection
