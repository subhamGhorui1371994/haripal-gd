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
                        <h3 class="mb-5">{{$dledCourseData->course_name ?? 'D.EL.ED.'}}</h3>
                        <ul class="mb-5">
                            <li>Duration: {{$dledCourseData->duration ?? '2 Years'}}</li>
                            <li>Exam. Type: {{$dledCourseData->exam_type ?? 'Yearly'}}</li>
                            <li>Medium of Course: {{$dledCourseData->course ?? 'Bengali , English , Hindi.'}}</li>
                            <li>Intake Capacity: {{$dledCourseData->intake_capacity ?? '100'}}</li>
                            <li>Affiliated Board: {{$dledCourseData->board ?? 'W.B.B.P.E'}}</li>
                            <li>Session Start: {{$dledCourseData->session ?? 'July'}}</li>
                        </ul>
                        <a class="view-all-accent-btn mt-5 hvr-float-shadow" data-title="Become A Member" href="{{ URL::asset(checkAndRenderImage($dledCourseData->syllabus, '#')) }}"><i class="fa fa-download"></i> Download Syllabus</a>
                        <div class="row mt-5 course-buttons">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                                <a class="pricetable-btn" data-title="Become A Member" target="_blank" href="{{$dledCourseData->admission_link ?? '#'}}">Admission</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                                <a class="pricetable-btn" data-title="Become A Member" href="{!! url('contact') !!}">Admission Enquiry</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                    <div class="price-table-box2">
                        <h3 class="mb-5">{{$bedCourseData->course_name ?? 'B.ED.'}}</h3>
                        <ul>
                            <li>Duration: {{$bedCourseData->duration ?? '2 Years'}}</li>
                            <li>Exam. Type: {{$bedCourseData->exam_type ?? 'Semester'}}</li>
                            <li>Method Subjects: {{$bedCourseData->course ?? 'English, Bengali, Mathematics, Sanskrit, History, Geography, Life Science, Physical Science, Education.'}}</li>
                            <li>Intake Capacity: {{$bedCourseData->intake_capacity ?? '100'}}</li>
                            <li>Affiliated Board: {{$bedCourseData->board ?? 'W.B.U.T.T.E.P.A'}}</li>
                            <li>Session Start: {{$bedCourseData->session ?? 'July'}}</li>
                        </ul>
                        <a class="view-all-accent-btn mt-5 hvr-float-shadow" data-title="Become A Member" href="{{ URL::asset(checkAndRenderImage($bedCourseData->syllabus, '#')) }}"><i class="fa fa-download"></i> Download Syllabus</a>
                        <div class="row mt-5 course-buttons">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                                <a class="pricetable-btn" data-title="Become A Member" target="_blank" href="{{$bedCourseData->admission_link ?? '#'}}">Admission</a>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 hvr-float-shadow">
                                <a class="pricetable-btn" data-title="Become A Member" href="{!! url('contact') !!}">Admission Enquiry</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price Table Area 2 End Here -->
@endsection
