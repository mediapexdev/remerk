@php
    $body_classes = 'app-default';
@endphp
@extends('base.base')

{{-- begin::Component Head --}}
@yield('component-head')
{{-- end::Component Head --}}

@section('content')
    {{-- <!--begin::App--> --}}
    <div id="kt_app_root" class="d-flex flex-column flex-root app-root pb-10">
        {{-- <!--begin::Page--> --}}
        <div id="kt_app_page" class="app-page flex-column flex-column-fluid">
            {{-- begin::Header --}}
            @yield('component-header')
            {{-- end::Header --}}
            {{-- <!--begin::Wrapper--> --}}
            <div id="kt_app_wrapper" class="app-wrapper flex-column flex-row-fluid">
                {{-- <!--begin::Main--> --}}
                <div id="kt_app_main" class="app-main flex-column flex-row-fluid pt-2">
                    {{-- <!--begin::Content wrapper--> --}}
                    <div class="d-flex flex-column flex-column-fluid">
                        {{-- <!--begin::Content--> --}}
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            {{-- <!--begin::Content container--> --}}
                            <div id="kt_app_content_container" class="app-container container-xxxl">
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

    {{-- <!--end::App--> --}}
    {{-- begin::Components --}}
    <div>
        @yield('component-footer')
    </div>
    {{-- end::Components --}}
@endsection
