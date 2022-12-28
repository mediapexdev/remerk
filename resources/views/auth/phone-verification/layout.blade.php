@extends('auth.layout')

@section('title')
<title>Remerk - Vérification du numéro de téléphone</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}">
@endsection
{{-- <!--begin::Authentication - Two-steps --> --}}
@section('card-body-content')
{{-- <!--begin::Form--> --}}
<form id="kt_sing_in_two_steps_form" class="form w-100 mb-13" method="POST" action="{{$route}}">
    @csrf
    {{-- <!--begin::Icon--> --}}
    <div class="text-center mb-10">
        <img class="mh-125px" src="assets/media/svg/misc/smartphone-2.svg" alt="Logo" title="Logo">
    </div>
    {{-- <!--end::Icon--> --}}
    {{-- <!--begin::Heading--> --}}
    <div class="text-center mb-10">
        {{-- <!--begin::Title--> --}}
        <h1 class="text-dark mb-3">Vérification en deux étapes</h1>
        {{-- <!--end::Title--> --}}
        {{-- <!--begin::Sub-title--> --}}
        <div class="text-muted fw-semibold fs-5 mb-5">Entrez le code de vérification que nous avons envoyé à</div>
        {{-- <!--end::Sub-title--> --}}
        {{-- <!--begin::Mobile no--> --}}
        <div class="fw-bold text-dark fs-3">{{ \substr($phone_number, 0, 2) . ' ***** ' . \substr($phone_number, 7, 2) }}</div>
        {{-- <!--end::Mobile no--> --}}
    </div>
    {{-- <!--end::Heading--> --}}
    {{-- <!--begin::Hidden Inputs--> --}}
    <input type="hidden" name="phone" value="{{$phone_number}}">
    @yield('hidden-inputs')
    {{-- <!--end::Hidden Inputs--> --}}
    {{-- <!--begin::Section--> --}}
    <div class="mb-10">
        {{-- <!--begin::Label--> --}}
        <div class="fw-bold text-start text-dark fs-6 mb-1 ms-1">Tapez votre code de sécurité à 6 chiffres</div>
        {{-- <!--end::Label--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="d-flex flex-wrap flex-stack">
            <input type="text" name="code_1" id="code_1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" value="" required autofocus>
            <input type="text" name="code_2" id="code_2" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" value="" required>
            <input type="text" name="code_3" id="code_3" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" value="" required>
            <input type="text" name="code_4" id="code_4" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" value="" required>
            <input type="text" name="code_5" id="code_5" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" value="" required>
            <input type="text" name="code_6" id="code_6" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" value="" required>
        </div>
        {{-- <!--end::Input group--> --}}
    </div>
    {{-- <!--end::Section--> --}}
    {{-- <!--begin::Submit--> --}}
    <div class="d-flex flex-center">
        <button type="submit" id="kt_sing_in_two_steps_submit" class="btn btn-lg btn-primary fw-bold">
            <span class="indicator-label">Soumettre</span>
            <span class="indicator-progress">
                <span>Patientez ...</span>
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
            </span>
        </button>
    </div>
    {{-- <!--end::Submit--> --}}
</form>
{{-- <!--end::Form--> --}}
{{-- <!--begin::Notice--> --}}
<div class="text-center fw-semibold fs-5">
    <span class="text-muted me-1">Je n'ai pas reçu le code ?</span>
    <a href="#" class="link-primary fs-5 me-1">Renvoyer</a>
    <span class="text-muted me-1">ou</span>
    <a href="tel:+221338326000" class="link-primary fs-5">appelez-nous</a>
</div>
{{-- <!--end::Notice--> --}}
{{-- <!--begin::Modal--> --}}
@include('auth.phone-verification.modal-send-verification-code')
{{-- <!--end::Modal--> --}}
@endsection
{{-- <!--end::Authentication - Two-stes--> --}}
@section('scripts')
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script src="{{URL::asset('assets/js/custom/authentication/sign-in/two-steps.js')}}"></script>
@endsection
