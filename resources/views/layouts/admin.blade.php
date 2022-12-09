@extends('base.admin')

{{-- begin::Component Head --}}
@yield('component-head')
{{-- end::Component Head --}}

@section('content')
    {{-- <!--begin::App--> --}}
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        {{-- <!--begin::Page--> --}}
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            {{-- begin::Header --}}
            @include('admin.components.globals.header')
            {{-- end::Header --}}
            {{-- <!--begin::Wrapper--> --}}
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::sidebar-->
					@include('admin.components.globals.sidebar')
					<!--end::sidebar-->
                {{-- <!--begin::Main--> --}}
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    {{-- <!--begin::Content wrapper--> --}}
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
							{{-- @include('admin.components.globals.toolbar') --}}
							<!--end::Toolbar-->
                        {{-- <!--begin::Content--> --}}
                        <div id="kt_app_content" class="app-content flex-column-fluid mt-5">
                            {{-- <!--begin::Content container--> --}}
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                {{-- <!-- begin::Validation Errors --> --}}
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                {{-- <!-- end::Validation Errors --> --}}
                                {{-- <!-- begin::message --> --}}
                                <x-auth-message class="mb-4" />
                                {{-- <!-- end::message --> --}}
                                @yield('component-body')
                            </div>
                            {{-- <!--end::Content container--> --}}
                        </div>
                        {{-- <!--end::Content--> --}}
                    </div>
                    {{-- <!--end::Content wrapper--> --}}
                </div>
                {{-- <!--end:::Main--> --}}
            </div>
            {{-- <!--end::Wrapper--> --}}
        </div>
        {{-- <!--end::Content wrapper--> --}}
    </div>
    {{-- <!--end::Page--> --}}
    </div>
    {{-- <!--end::App--> --}}
    {{-- begin::Components --}}
    @yield('component-footer')
    {{-- end::Components --}}
@endsection