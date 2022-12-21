@php
    $body_classes = 'app-default';

    use App\Models\Transporteur;

    $transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
@endphp

@extends('transporteur.layout')

@section('title')
	<title>Dashboard - Remërk</title>
@endsection

@section('component-body-content')
<a href="{{route('test')}}"><button >send Message</button></a>
{{-- <!--begin::Row--> --}}
<div class="row gy-5 g-xl-10">
    {{-- <!--begin::Col--> --}}
    <div class="col-xl-4 mb-xl-10">
        @include('transporteur.components.expeditions.overview.overview')
    </div>
    {{-- <!--end::Col--> --}}
    {{-- <!--begin::Col--> --}}
    <div class="col-xl-8 mb-5 mb-xl-10">
        @include('transporteur.components.vehicules.overview.overview')
    </div>
    {{-- <!--end::Col--> --}}
</div>
{{-- <!--end::Row--> --}}
@endsection

@section('component-modals')
    @include('transporteur.components.modals.postulat')
    @include('transporteur.components.modals.create-camion')
    @include('transporteur.components.modals.voir-postulat')
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/dashboard/expeditions-overview.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/postulat.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/utilities/modals/create-camion.js')}}"></script>
@endsection
