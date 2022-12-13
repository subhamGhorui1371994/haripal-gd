<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{Request::segment(2) ==='dashboard' ? 'active' : ''}}"><a href="{!! URL::to('admin/dashboard') !!}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                    <li class="{{(Request::segment(2) ==='home-page' || Request::segment(2) ==='home-page-banners') ? 'active' : ''}}"><a href="{!! URL::to('admin/home-page') !!}"><i class="icon-newspaper"></i> <span>Home Page</span></a></li>
                    <li class="{{Request::segment(2) ==='courses' ? 'active' : ''}}"><a href="{!! URL::to('admin/courses') !!}"><i class="icon-popout"></i> <span>Courses</span></a></li>
                    <li class="{{(Request::segment(2) ==='gallery' || Request::segment(2) ==='gallery-category') ? 'active' : ''}}"><a href="{!! URL::to('admin/gallery') !!}"><i class="icon-versions"></i> <span>Gallery</span></a></li>
                    <li class="{{Request::segment(2) ==='resource-person' ? 'active' : ''}}"><a href="{!! URL::to('admin/resource-person') !!}"><i class="icon-user-tie"></i> <span>Resource Person</span></a></li>
                    <li class="{{Request::segment(2) ==='students' ? 'active' : ''}}"><a href="{!! URL::to('admin/students') !!}"><i class="icon-vcard"></i> <span>Student Portal</span></a></li>
                    <li class="{{Request::segment(2) ==='infrastructure' ? 'active' : ''}}"><a href="{!! URL::to('admin/infrastructure') !!}"><i class="icon-office"></i> <span>Infrastructure</span></a></li>
                    <li class="nav-item nav-item-submenu {{Request::segment(2) ==='mandatory-disclosure' ? 'active' : ''}}">
                        <a href="#" class="nav-link"><i class="icon-color-sampler"></i> <span>Mandatory Disclosure</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Pages">
                            <li class="nav-item {{(Request::segment(2) ==='mandatory-disclosure' && empty(Request::segment(3))) ? 'active' : ''}}"><a href="{!! URL::to('admin/mandatory-disclosure') !!}" class="nav-link">Disclosure</a></li>
                            <li class="nav-item {{Request::segment(3) ==='documents' ? 'active' : ''}}"><a href="{!! URL::to('admin/mandatory-disclosure/documents') !!}" class="nav-link">Documents</a></li>
                        </ul>
                    </li>
                    <li class="{{Request::segment(2) ==='biometric' ? 'active' : ''}}"><a href="{!! URL::to('admin/biometric') !!}"><i class="icon-drawer"></i> <span>Biometric</span></a></li>
                    <li class="{{Request::segment(2) ==='notice' ? 'active' : ''}}"><a href="{!! URL::to('admin/notice') !!}"><i class="icon-newspaper2"></i> <span>Notice</span></a></li>
                    <li class="{{Request::segment(2) ==='event' ? 'active' : ''}}"><a href="{!! URL::to('admin/event') !!}"><i class="icon-calendar2"></i> <span>Event</span></a></li>
                    <li class="{{Request::segment(2) ==='affiliations' ? 'active' : ''}}"><a href="{!! URL::to('admin/affiliations') !!}"><i class="icon-certificate"></i> <span>Affiliations</span></a></li>
                    <li class="{{Request::segment(2) ==='site-info' ? 'active' : ''}}"><a href="{!! URL::to('admin/site-info') !!}"><i class="icon-info22"></i> <span>Site Information</span></a></li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->
