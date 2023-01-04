@php
    $body_classes = 'app-default';

    use App\Models\Expedition;
    use App\Models\Expediteur;
    
    $user_id     = Auth::user()->id;
    $expediteur  = Expediteur::where('user_id', $user_id)->first();
    $expeditions = Expedition::where('expediteur_id', $expediteur->id)->orderByDesc('created_at')->get();
@endphp

@extends('expediteur.layout')

@section('title')
	<title>Dashboard | Remërk</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/overview.css')}}">
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/postulants.css')}}">
@endsection

@section('component-body-content')
    @if (!$expeditions->count())
    <div class="h-100">
        @include('expediteur.components.globals.default')
    </div>
    @else
        {{-- <!--begin::Row--> --}}
        <div class="row gy-5 g-xl-10">
            {{-- <!--begin::Col--> --}}
            <div class="col-xl-4 mb-xl-10">
                {{-- <!--begin::Engage widget 3--> --}}
                @include('expediteur.components.expeditions.overview.overview')
                {{-- <!--end::Engage widget 3--> --}}
            </div>
            {{-- <!--end::Col--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-xl-8 mb-5 mb-xl-10">
                @include('expediteur.components.expeditions.postulants.overview')
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        <!--end::Row-->
    @endif
@endsection

@section('component-modals')
<div id="modal_details_postulant_wrapper"></div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/dashboard/expeditions-overview.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/expeditions.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/postulants/postulants.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/postulants/listing/postulants-all.js')}}"></script>
@endsection
