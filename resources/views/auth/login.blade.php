@extends('auth.layout')

@section('title')
<title>Remerk - Se connecter</title>
@endsection
{{-- <!--begin::Authentication - Sign-in --> --}}
@section('card-body-content')
{{-- <!--begin::Form--> --}}
<form id="kt_sign_in_form" class="form w-100" method="POST" action="{{route('login')}}" novalidate="novalidate">
    @csrf
    {{-- <!--begin::Heading--> --}}
    <div class="text-center mb-11">
        {{-- <!--begin::Title--> --}}
        <h1 class="text-dark fw-bolder mb-3">Se connecter</h1>
        {{-- <!--end::Title--> --}}
    </div>
    {{-- <!--end::Heading--> --}}
    {{-- <!--begin::Input group--> --}}
    <div class="fv-row mb-8 form-floating">
        {{-- <!--begin::phone--> --}}
        <input type="tel" name="phone"
            id="phone" class="form-control form-control-lg bg-transparent text-gray-900-on-dark"
            placeholder="Téléphone" :value="old('phone')" autocomplete="off" required autofocus>
        <label for="phone">Téléphone</label>
        {{-- <!--end::phone--> --}}
    </div>
    {{-- <!--end::Input group--> --}}
    {{-- <!--begin::Input group--> --}}
    <div class="fv-row mb-3" data-kt-password-meter="true">
        {{-- <!--begin::Input wrapper--> --}}
        <div class="position-relative mb-3 form-floating">
            {{-- <!--begin::Input--> --}}
            <input type="password" name="password"
                id="password" class="form-control form-control-lg bg-transparent text-gray-900-on-dark"
                placeholder="Mot de passe" autocomplete="current-password" required>
            {{-- <!--end::Input--> --}}
            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                <i class="bi bi-eye-slash fs-2"></i>
                <i class="bi bi-eye fs-2 d-none"></i>
            </span>
            {{-- <!--begin::Label--> --}}
            <label for="password">Mot de passe</label>
            {{-- <!--end::Label--> --}}
        </div>
        {{-- <!--end::Input wrapper--> --}}
    </div>
    {{-- <!--end::Input group--> --}}
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        {{-- <!--begin::Link--> --}}
        <a href="{{ route('password.request') }}" class="link-primary">Mot de passe oublié ?</a>
        {{-- <!--end::Link--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
    {{-- <!--begin::Submit button--> --}}
    <div class="d-grid mb-10">
        <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
            {{-- <!--begin::Indicator label--> --}}
            <span class="indicator-label">S'identifier</span>
            {{-- <!--end::Indicator label--> --}}
            {{-- <!--begin::Indicator progress--> --}}
            <span class="indicator-progress">
                <span>Patientez ...</span>
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            {{-- <!--end::Indicator progress--> --}}
        </button>
    </div>
    {{-- <!--end::Submit button--> --}}
    {{-- <!--begin::Sign up--> --}}
    <div class="text-gray-600 text-gray-700-on-dark text-center fw-semibold fs-6">
        <span>Pas encore membre ?</span>
        <a href="{{ route('register') }}" class="link-primary">S'inscrire</a>
    </div>
    {{-- <!--end::Sign up--> --}}
</form>
{{-- <!--end::Form--> --}}
@endsection
{{-- <!--end::Authentication - Sign-in--> --}}
@section('scripts')
<script src="assets/js/custom/authentication/sign-in/general.js"></script>
@endsection
