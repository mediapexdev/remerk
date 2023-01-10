@php
	use App\Core\Util;
	use App\Models\User;
	use App\Models\Expedition;
	use App\Models\Expediteur;
	use App\Models\Transporteur;

	$user_by_role = null;
    $__expeditions_count = null;

    switch (Auth::user()->role_id) {
        case User::EXPEDITEUR:
            $user_by_role = Expediteur::where('user_id', Auth::user()->id)->first();
            $__expeditions_count = Expedition::where('expediteur_id', $user_by_role->id)->count();
            break;
        case User::TRANSPORTEUR:
            $user_by_role = Transporteur::where('user_id', Auth::user()->id)->first();
            $__expeditions_count = Expedition::where('transporteur_id', $user_by_role->id)->count();
            break;
		case User::ADMIN:
        default:
			exit;
            break;
    }
@endphp

{{-- @extends('transporteur.layout') --}}

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
					@include('components.account.title')
					{{-- <!--end::Title--> --}}
					{{-- <!--begin::Stats--> --}}
					@include('components.account.stats')
					{{-- <!--end::Stats--> --}}
				</div>
				{{-- <!--end::Info--> --}}
			</div>
			{{-- <!--end::Details--> --}}
			{{-- <!--begin::Navs--> --}}
			<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x rk-nav-tabs border-transparent fs-5 fw-bold">
				{{-- <!--begin::Nav item--> --}}
				<li class="nav-item rk-nav-item mt-2">
					<a class="nav-link rk-nav-link text-active-primary ms-0 me-10 py-5 active"
						data-bs-toggle="tab" href="#kt_tab_account_overview">
						<span class="nav-text">Aperçu</span>
					</a>
				</li>
				{{-- <!--end::Nav item--> --}}
				{{-- <!--begin::Nav item--> --}}
				<li class="nav-item rk-nav-item mt-2">
					<a class="nav-link rk-nav-link text-active-primary ms-0 me-10 py-5"
						data-bs-toggle="tab" href="#kt_tab_account_settings">
						<span class="nav-text">Paramètres</span>
					</a>
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
			@include('components.account.overview')
		</div>
		<div id="kt_tab_account_settings" class="tab-pane fade" role="tabpanel">
			@include('components.account.settings.settings')
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
