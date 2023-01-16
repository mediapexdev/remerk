@extends('auth.layout')

@section('title')
<title>Remerk - Nouveau mot de passe</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}">
@endsection
{{-- <!--begin::Authentication - New password --> --}}
@section('card-body-content')
{{-- <!--begin::Form--> --}}
<form id="kt_new_password_form" class="form w-100" method="POST"
	action="{{ route('password.update') }}" novalidate="novalidate">
	@csrf
	{{-- <!-- begin::Password Reset Token --> --}}
	<input type="hidden" name="token" value="{{ $token }}">
	{{-- <!-- end::Password Reset Token --> --}}
	{{-- <!-- begin::Phone number --> --}}
	<input type="hidden" name="phone" value="{{ $request['phone'] }}">
	{{-- <!-- end::Phone number --> --}}
	{{-- <!--begin::Heading--> --}}
	<div class="text-center mb-10">
		{{-- <!--begin::Title--> --}}
		<h1 class="text-dark fw-bolder fw-semibold-on-dark mb-3">Nouveau mot de passe</h1>
		{{-- <!--end::Title--> --}}
		{{-- <!--begin::Link--> --}}
		<div class="text-gray-600 text-gray-700-on-dark fw-semibold fs-6">
			<span>Avez-vous déjà réinitialisé le mot de passe ?</span>
			<a class="link-primary fw-bold fw-medium-on-dark" href="{{ route('login') }}">S'identifier</a>
		</div>
		{{-- <!--end::Link--> --}}
	</div>
	{{-- <!--end::Heading--> --}}
	{{-- <!--begin::Input group--> --}}
	<div class="fv-row mb-8" data-kt-password-meter="true">
		{{-- <!--begin::Wrapper--> --}}
		<div class="mb-1">
			{{-- <!--begin::Input wrapper--> --}}
			<div class="position-relative mb-3">
				<input type="password" name="password" id="password" class="form-control bg-transparent text-white-dim-on-dark"
					placeholder="Mot de passe" :value="__('Password')" autocomplete="off" required>
				<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
					<i class="bi bi-eye-slash fs-2 text-gray-600-on-dark"></i>
					<i class="bi bi-eye fs-2 d-none"></i>
				</span>
			</div>
			{{-- <!--end::Input wrapper--> --}}
			{{-- <!--begin::Meter--> --}}
			<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
				<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
				<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
				<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
				<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
			</div>
			{{-- <!--end::Meter--> --}}
		</div>
		{{-- <!--end::Wrapper--> --}}
		{{-- <!--begin::Hint--> --}}
		<div class="text-gray-600 text-gray-700-on-dark">Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.</div>
		{{-- <!--end::Hint--> --}}
	</div>
	{{-- <!--end::Input group--> --}}
	{{-- <!--begin::Input group--> --}}
	<div class="fv-row mb-8" data-kt-password-meter="true">
		{{-- <!--begin::Input wrapper--> --}}
		<div class="position-relative mb-3">
			{{-- <!--begin::Repeat Password--> --}}
			<input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-transparent text-white-dim-on-dark"
				placeholder="Répéter le mot de passe" :value="__('Password Confirmation')" autocomplete="off" required>
			{{-- <!--end::Repeat Password--> --}}
			<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
				<i class="bi bi-eye-slash fs-2 text-gray-600-on-dark"></i>
				<i class="bi bi-eye fs-2 d-none"></i>
			</span>
		</div>
		{{-- <!--end::Input wrapper--> --}}
	</div>
	{{-- <!--end::Input group--> --}}
	{{-- <!--begin::Input group--> --}}
	<div class="fv-row mb-8">
		<label class="form-check form-check-inline">
			<input class="form-check-input" type="checkbox" name="toc" value="1" required>
			<span class="form-check-label fw-semibold text-gray-700 text-white-dim-on-dark fs-6 ms-1">
				<span>I Agree &</span>
				<a href="#" class="ms-1 link-primary">Terms and conditions</a>.
			</span>
		</label>
	</div>
	{{-- <!--end::Input group--> --}}
	{{-- <!--begin::Action--> --}}
	<div class="d-grid mb-10">
		<button type="submit" id="kt_new_password_submit" class="btn btn-primary">
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
	</div>
	{{-- <!--end::Action--> --}}
</form>
{{-- <!--end::Form--> --}}
@endsection
{{-- <!--end::Authentication - New password--> --}}
@section('scripts')
<script src="{{URL::asset('assets/js/custom/authentication/reset-password/new-password.js')}}"></script>
@endsection
