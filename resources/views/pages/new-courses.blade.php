@extends('layouts.template')

@section('content')
    <!-- Inner Page Banner Area Start Here -->
    {{get_breadcrumb_row_html('Courses', 'Courses')}}
    <!-- Inner Page Banner Area End Here -->

    <!-- Price Table Area 2 Start Here -->
    <div class="price-table2-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                    <div class="price-table-box2">
                        <h3 class="mb-5">Secondary</h3>
                        <ul class="mb-5">
                            <li>Class: CLASS V to CLASS X</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                    <div class="price-table-box2">
                        <h3 class="mb-5">HIGHER SECONDARY</h3>
                        <ul>
                            <li>SCIENCE</li>
                            <li>HUMANITIES</li>
                            <li>COMMERCE</li>
                            <li>VOCATIONAL</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price Table Area 2 End Here -->
@endsection
