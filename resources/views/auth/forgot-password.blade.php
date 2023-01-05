@extends('auth.layout')

@section('title')
<title>Réinitialisation du mot de passe</title>
@endsection
{{-- <!--begin::Authentication - Password reset -->     --}}
@section('card-body-content')
{{-- <!--begin::Form--> --}}
<form id="kt_password_reset_form" class="form w-100" method="POST"
    action="{{ route('password.phoneNumberVerification') }}" novalidate="novalidate">
    @csrf
    {{-- <!--begin::Heading--> --}}
    <div class="text-center mb-10">
        {{-- <!--begin::Title--> --}}
        <h1 class="text-dark fw-bolder mb-3">Mot de passe oublié ?</h1>
        {{-- <!--end::Title--> --}}
        {{-- <!--begin::Link--> --}}
        <div class="text-gray-600 text-gray-700-on-dark fw-semibold fs-6">Entrez votre numéro de téléphone pour réinitialiser votre mot de passe.</div>
        {{-- <!--end::Link--> --}}
    </div>
    {{-- <!--end::Heading--> --}}
    {{-- <!--begin::Input group--> --}}
    <div class="fv-row mb-8 form-floating">
        {{-- <!--begin::Phone--> --}}
        <input type="tel" name="phone" id="ipt_phone" placeholder="Numéro de téléphone"
            autocomplete="off" class="form-control bg-transparent text-gray-900-on-dark" :value="old('phone')" autofocus>
        <label for="floatingInput">Téléphone</label>
        {{-- <!--end::Phone--> --}}
    </div>
    {{-- <!--begin::Actions--> --}}
    <div class="fv-row d-flex flex-wrap justify-content-center pb-lg-0">
        <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
            {{-- <!--begin::Indicator label--> --}}
            <span class="indicator-label">Soumettre</span>
            {{-- <!--end::Indicator label--> --}}
            {{-- <!--begin::Indicator progress--> --}}
            <span class="indicator-progress">
                <span>Patientez ...</span>
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
            {{-- <!--end::Indicator progress--> --}}
        </button>
        <a href="{{route('login')}}" class="btn btn-secondary">Annuler</a>
    </div>
    {{-- <!--end::Actions--> --}}
</form>
{{-- <!--end::Form--> --}}
@endsection
{{-- <!--end::Authentication - Password reset--> --}}
@section('scripts')
<script src="assets/js/custom/authentication/reset-password/reset-password.js"></script>
@endsection
