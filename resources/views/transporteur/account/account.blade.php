@php
	$body_classes = "app-default";

	use App\Core\Util;
	use App\Models\Expedition;
	use App\Models\Transporteur;

	$__transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
	$__expeditions_count = Expedition::where('transporteur_id', $__transporteur->id)->count();
@endphp

@extends('transporteur.layout')

@section('title')
	<title>Mon profile - Rëmerk</title>
@endsection
@section('component-body-content')
    {{-- <!--begin::Navbar--> --}}
	<div class="card mb-5 mb-xl-10">
		<div class="card-body pt-9 pb-0">
			{{-- <!--begin::Details--> --}}
			<div class="d-flex flex-wrap flex-sm-nowrap mb-3">
				{{-- <!--begin::Pic--> --}}
				<div class="me-7 mb-4">
					<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
						@php
							$has_avatar = Auth::user()->hasAvatar();
							$avatar = (($has_avatar) ? Auth::user()->avatar : Util::getDefaultUserAvatar());
						@endphp
						<img src="{{$avatar}}" alt="Avatar">
						<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
					</div>
				</div>
				{{-- <!--end::Pic--> --}}
				{{-- <!--begin::Info--> --}}
				<div class="flex-grow-1">
					{{-- <!--begin::Title--> --}}
					@include('transporteur.account.title')
					{{-- <!--end::Title--> --}}
					{{-- <!--begin::Stats--> --}}
					@include('transporteur.account.stats')
					{{-- <!--end::Stats--> --}}
				</div>
				{{-- <!--end::Info--> --}}
			</div>
			{{-- <!--end::Details--> --}}
			{{-- <!--begin::Navs--> --}}
			<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
				{{-- <!--begin::Nav item--> --}}
				<li class="nav-item mt-2">
					<a class="nav-link text-active-primary ms-0 me-10 py-5 active"
						data-bs-toggle="tab" href="#kt_tab_account_overview">Aperçu</a>
				</li>
				{{-- <!--end::Nav item--> --}}
				{{-- <!--begin::Nav item--> --}}
				<li class="nav-item mt-2">
					<a class="nav-link text-active-primary ms-0 me-10 py-5"
						data-bs-toggle="tab" href="#kt_tab_account_settings">Paramètres</a>
				</li>
				{{-- <!--end::Nav item--> --}}
			</ul>
			{{-- <!--begin::Navs--> --}}
		</div>
	</div>
	{{-- <!--end::Navbar--> --}}
	{{-- <!--begin::details View--> --}}
	<div class="tab-content">
		<div id="kt_tab_account_overview" class="tab-pane fade show active" role="tabpanel">
			@include('transporteur.account.overview')
		</div>
		<div id="kt_tab_account_settings" class="tab-pane fade" role="tabpanel">
			@include('transporteur.account.settings.settings')
		</div>
	</div>
	{{-- <!--end::details View--> --}}
@endsection

@section('custom-js')
<script src="{{URL::asset('assets/js/custom/account/account.js')}}"></script>
<script src="{{URL::asset('assets/js/custom/account/settings/signin-methods.js')}}"></script>
<script src="{{URL::asset('assets/js/custom/account/settings/profile-details.js')}}"></script>
{{-- <script src="{{URL::asset('assets/js/custom/account/settings/deactivate-account.js')}}"></script> --}}
{{-- <script src="{{URL::asset('assets/js/custom/pages/user-profile/followers.js')}}"></script> --}}
@endsection
