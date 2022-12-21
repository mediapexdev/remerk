{{-- <!--begin::Main Menu--> --}}
@include('transporteur.components.navigation.main-menu')
{{-- <!--end::Main Menu--> --}}
{{-- <!--begin::Navbar--> --}}
<div class="app-navbar flex-shrink-0">
    {{-- <!--begin::Theme Menu--> --}}
    @include('components.navigation.theme-menu')
    {{-- <!--end::Theme Menu--> --}}
    {{-- <!--begin::Chat toggle--> --}}
    <div class="app-navbar-item ms-1 ms-lg-3">
        {{-- <!--begin::Menu wrapper--> --}}
        <div id="kt_drawer_chat_toggle" class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px w-md-40px h-md-40px position-relative">
            {{-- <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg--> --}}
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z" fill="currentColor" />
                    <rect x="6" y="12" width="7" height="2" rx="1" fill="currentColor" />
                    <rect x="6" y="7" width="12" height="2" rx="1" fill="currentColor" />
                </svg>
            </span>
            {{-- <!--end::Svg Icon--> --}}
            <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle top-0 start-50 animation-blink"></span>
        </div>
        {{-- <!--end::Menu wrapper--> --}}
    </div>
    {{-- <!--end::Chat toggle--> --}}
    {{-- <!--begin::User Menu--> --}}
    @include('transporteur.components.navigation.user-menu')
    {{-- <!--end::User Menu--> --}}
    {{-- <!--begin::Header menu toggle--> --}}
    {{-- <div class="app-navbar-item d-lg-none ms-2 me-n3" title="Show header menu">
        <div id="kt_app_header_menu_toggle" class="btn btn-icon btn-active-color-primary w-35px h-35px">
            <!--begin::Svg Icon | path: icons/duotune/text/txt001.svg-->
            <span class="svg-icon svg-icon-1">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z" fill="currentColor" />
                    <path opacity="0.3" d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z" fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
    </div> --}}
    {{-- <!--end::Header menu toggle--> --}}
</div>
{{-- <!--end::Navbar--> --}}
