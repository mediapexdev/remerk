@php
    $body_classes = 'app-default';

    use App\Core\Util;
    use App\Models\Expediteur;
    use App\Models\Expedition;
    use App\Models\Postulants;

    $expediteur = Expediteur::where('user_id', Auth::user()->id)->first();
    $expeditions = Expedition::where('expediteur_id', $expediteur->id)->orderByDesc('created_at')->get();
    $postulants = null;

    foreach ($expeditions as $expedition) {
        $postulants = ((null == $postulants) ?
        Postulants::where('expedition_id', $expedition->id)->orderByDesc('created_at')->get() :
        $postulants->concat(Postulants::where('expedition_id', $expedition->id)->orderByDesc('created_at')->get()));
    }
@endphp

@extends('expediteur.layout')

@section('title')
    <title>Postulants | Remërk</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/postulants.css')}}">
@endsection

@section('component-body-content')
@if (!$expeditions->count())
    @include('expediteur.components.default')
@else
{{-- <!--begin::Card--> --}}
<div class="card card-flush">
    <div class="row gy-5 g-xl-10">
        {{-- <!--begin::Col--> --}}
        <div class="col-xl-4 mb-xl-10 d-none d-xl-block d-xxl-block">
            {{-- <!--begin::Engage widget 3--> --}}
            <img class="img-fluid theme-dark-show rounded" src="{{URL::asset('assets/images/Fitting_piece-dark.gif')}}" alt="">
            <img class="img-fluid theme-light-show rounded" src="{{URL::asset('assets/images/Fitting_piece.gif')}}" alt="">
            {{-- <!--end::Engage widget 3--> --}}
        </div>
        {{-- <!--end::Col--> --}}
        {{-- <!--begin::Col--> --}}
        <div class="col-xl-8 mb-5 mb-xl-10">
            {{-- <!--begin::Card--> --}}
            <div class="card card-flush border-dotted">
                {{-- <!--begin::Card header--> --}}
                <div class="card-header border-0">
                    {{-- <!--begin::Card title--> --}}
                    <div class="card-title">
                        <h2>Postulants</h2>
                    </div>
                    {{-- <!--end::Card title--> --}}
                </div>
                {{-- <!--end::Card header--> --}}
                {{-- <!--begin::Card body--> --}}
                <div class="card-body pt-0">
                    {{-- <!--begin::List --> --}}
                    @include('expediteur.components.expeditions.postulants.list')
                    {{-- <!--end::List--> --}}
                </div>
                {{-- <!--end::Card body--> --}}
            </div>
            {{-- <!--end::Card--> --}}
        </div>
        {{-- <!--end::Col--> --}}
    </div>
</div>
@endif
@endsection

@section('component-modals')
<div id="modal_details_postulant_wrapper"></div>
@endsection

@section('custom-js')
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/expeditions.js')}}"></script> --}}
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/postulants/postulants.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/postulants/listing/postulants-all.js')}}"></script>
@endsection
