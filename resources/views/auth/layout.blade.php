@php
    $body_classes = "app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat";
@endphp
@extends('base.base')

@section('styles')
@yield('custom-css')
@include('auth.style')
@endsection

@section('content')
{{-- <!--begin::Root--> --}}
<div id="kt_app_root" class="d-flex flex-column flex-root">
    {{-- <!--begin::Authentication - Sign-in --> --}}
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        {{-- <!--begin::Aside--> --}}
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            {{-- <!--begin::Aside--> --}}
            <div class="d-flex flex-center flex-lg-start flex-column">
                {{-- <!--begin::Logo--> --}}
                    <img class="img-fluid" src="{{URL::asset('assets/images/Logo-Officiel---Monochrome-Blanc.png')}}" alt="Logo" width="80%">
                {{-- <!--end::Logo--> --}}
                {{-- <!--begin::Title--> --}}
                {{-- <h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2> --}}
                {{-- <!--end::Title--> --}}
            </div>
            {{-- <!--end::Aside--> --}}
        </div>
        {{-- <!--begin::Aside--> --}}
        {{-- <!--begin::Body--> --}}
        <div class="d-flex flex-center w-lg-50 p-10">
            {{-- <!--begin::Card--> --}}
            <div class="card rounded-3 w-md-550px">
                {{-- <!--begin::Card body--> --}}
                <div class="card-body p-10 p-lg-20">
                    {{-- <!-- Begin Session Status --> --}}
                    <x-auth-session-status class="mb-4" :status="session('status')" />
                    {{-- <!-- End Session Status --> --}}
                    {{-- <!-- Begin Validation Errors --> --}}
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    {{-- <!-- End Validation Errors --> --}}
                    {{-- <!-- Begin message --> --}}
                    <x-auth-message class="mb-4" />
                    {{-- <!-- End message --> --}}
                    {{-- begin::Card Body Content --}}
                    @yield('card-body-content')
                    {{-- end::Card Body Content --}}
                </div>
                {{-- <!--end::Card body--> --}}
            </div>
            {{-- <!--end::Card--> --}}
        </div>
        {{-- <!--end::Body--> --}}
    </div>
    {{-- <!--end::Authentication - Sign-in--> --}}
</div>
{{-- <!--end::Root--> --}}
@endsection
