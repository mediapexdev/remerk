{{-- <!--begin::Header--> --}}
<div id="kt_app_header" class="app-header navbar-nav-scroll scroll-y" style="margin:0 auto; width:100%">
    {{-- <!--begin::Header container--> --}}
    <div id="kt_app_header_container" class="app-container container-fluid d-flex align-items-stretch justify-content-between">
        {{-- <!--begin::Mobile logo--> --}}
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="/dashboard" class="d-lg-none">
                <img class="h-50px theme-dark-show" src="{{URL::asset('assets/images/Logo-Officiel---R-Monochrome-Blanc.png')}}" alt="Logo">
                <img class="h-50px theme-light-show" src="{{URL::asset('assets/images/Logo-Officiel-Normal.png')}}" alt="Logo">
            </a>
        </div>
        {{-- <!--end::Mobile logo--> --}}
        {{-- <!--begin::Header wrapper--> --}}
        <div id="kt_app_header_wrapper" class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            {{-- <!--begin::Logo--> --}}
            <div id="kt_app_sidebar_logo" class="app-sidebar-logo px-6">
                {{-- <!--begin::Logo image--> --}}
                <a class="theme-dark-show">
                    <img class="h-45px img-fluid mt-2" src="{{URL::asset('assets/images/Logo-Officiel---Monochrome-Blanc.png')}}" alt="Logo">
                </a>
                <a class="theme-light-show">
                    <img class="h-45px img-fluid mt-2" src="{{URL::asset('assets/images/Logo-2.png')}}" alt="Logo">
                </a>
                {{-- <!--end::Logo image--> --}}
            </div>
            {{-- <!--end::Logo--> --}}
            {{-- <!--begin::Navigation--> --}}
            @yield('navigation')
            {{-- <!--end::Navigation--> --}}
        </div>
        {{-- <!--end::Header wrapper--> --}}
    </div>
    {{-- <!--end::Header container--> --}}
</div>
{{-- <!--end::Header--> --}}
