@php
    $body_classes = "app-blank app-blank";
@endphp
@extends('base.base')

@section('title')
<title>S'inscrire - Remërk</title>
@endsection

@section('content')
{{-- <!--begin::Root--> --}}
<div id="kt_app_root" class="d-flex flex-column flex-root">
    {{-- <!--begin::Authentication - Multi-steps--> --}}
    <div id="kt_create_account_stepper" class="d-flex flex-column flex-lg-row flex-column-fluid stepper stepper-pills stepper-column stepper-multistep">
        {{-- <!--begin::Aside--> --}}
        <div class="d-flex flex-column flex-lg-row-auto w-lg-350px w-xl-500px">
            <div class="d-flex flex-column position-lg-fixed top-0 bottom-0 w-lg-350px w-xl-500px scroll-y bgi-size-cover bgi-position-center"
                style="background-image: url(assets/media/misc/auth-bg.png)">
                {{-- <!--begin::Header--> --}}
                <div class="d-flex flex-center py-5 py-lg-15 mt-lg-15">
                    {{-- <!--begin::Logo--> --}}
                    <a href="#">
                        <img src="assets\images\Logo-Officiel---Monochrome-Blanc.png" class="h-75px img-fluid" alt="Logo" title="Logo">
                    </a>
                    {{-- <!--end::Logo--> --}}
                </div>
                {{-- <!--end::Header--> --}}
                {{-- <!--begin::Body--> --}}
                <div class="d-flex flex-row-fluid justify-content-center p-10">
                    {{-- <!--begin::Nav--> --}}
                    @include('auth.register.navigation')
                    {{-- <!--end::Nav--> --}}
                </div>
                {{-- <!--end::Body--> --}}
                {{-- <!--begin::Footer--> --}}
                <div class="d-flex flex-center flex-wrap px-5 py-10">
                    {{-- <!--begin::Links--> --}}
                    <div class="d-flex fw-normal px-5">
                        <span class="fw-semibold">Vous avez déjà un compte ?</span>
                        <a class="text-white ms-2" href="{{ route('login') }}">Se connecter</a>
                    </div>
                    {{-- <!--end::Links--> --}}
                </div>
                {{-- <!--end::Footer--> --}}
            </div>
        </div>
        {{-- <!--begin::Aside--> --}}
        {{-- <!--begin::Body--> --}}
        <div class="d-flex flex-column flex-lg-row-fluid py-10">
            {{-- <!--begin::Content--> --}}
            <div class="d-flex flex-center flex-column flex-column-fluid">
                {{-- <!--begin::Wrapper--> --}}
                <div class="w-lg-650px w-xl-700px p-10 p-lg-15 mx-auto">
                    {{-- <!-- Begin Validation Errors --> --}}
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    {{-- <!-- End Validation Errors --> --}}
                    {{-- <!--begin::Form--> --}}
                    <form id="kt_create_account_form" class="my-auto pb-5" method="POST"
                        action="{{ route('register.phoneNumberVerification') }}" novalidate="novalidate">
                        {{-- <!--begin::Step 1--> --}}
                        @include('auth.register.steps.steps')
                        {{-- <!--end::Step 1--> --}}
                        {{-- <!--begin::Actions--> --}}
                        <div class="d-flex flex-stack pt-15">
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg--> --}}
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                                            <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    {{-- <!--end::Svg Icon--> --}}
                                    <span>Précédent</span>
                                </button>
                            </div>
                            <div>
                                @csrf
                                <button type="submit" id="kt_password_register_submit"
                                    class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                                    <span class="indicator-label">
                                        <span>Soumettre</span>
                                        {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg--> --}}
                                        <span class="svg-icon svg-icon-4 ms-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                                <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        {{-- <!--end::Svg Icon--> --}}
                                    </span>
                                    <span class="indicator-progress">
                                        <span>Patientez ...</span>
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">
                                    <span>Continuer</span>
                                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg--> --}}
                                    <span class="svg-icon svg-icon-4 ms-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    {{-- <!--end::Svg Icon--> --}}
                                </button>
                            </div>
                        </div>
                        {{-- <!--end::Actions--> --}}
                    </form>
                    {{-- <!--end::Form--> --}}
                </div>
                {{-- <!--end::Wrapper--> --}}
            </div>
            {{-- <!--end::Content--> --}}
        </div>
        {{-- <!--end::Body--> --}}
    </div>
    {{-- <!--end::Authentication - Multi-steps--> --}}
</div>
{{-- <!--end::Root--> --}}
@endsection

@section('scripts')
<script src="assets/js/custom/utilities/modals/create-account.js"></script>
@endsection
