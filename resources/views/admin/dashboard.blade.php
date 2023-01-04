@extends('admin.layout')

@section('title')
<title>Admin | Remërk</title>
@endsection

@section('component-body-content')
	<!--begin::Row-->
	<div class="row mb-10 gx-5 gx-xl-10">
		<!--begin::Col-->
		<div class="col col-sm-6">
			@include('admin.components.dashboard.expeditions')
			@include('admin.components.dashboard.transporteurs')
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col col-sm-6">
			@include('admin.components.dashboard.messages')
			@include('admin.components.dashboard.vehicules')
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
	{{-- <!--begin::Row-->
	<div class="row gx-5 gx-xl-10">
		<!--begin::Tables widget 16-->
		<div class="card card-flush h-xl-100">
			<!--begin::Body-->
			@include('admin.components.dashboard.transporteurs')
			<!--end: Card Body-->
		</div>
		<!--end::Tables widget 16-->
	</div>
	<!--end::Row--> --}}
@endsection

{{-- begin::Component Footer Content --}}
	@section('component-footer-content')
	
	@endsection
{{-- end::Component Footer Content --}}

{{-- begin::Custom Script Content --}}
@section('scripts')
	@include('admin.components.dashboard.scripts')
@endsection
{{-- end::Custom Script Content --}}