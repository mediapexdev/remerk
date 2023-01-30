@php
$body_classes = 'app-default';

use App\Models\Transporteur;
use App\Models\Expedition;
use App\Models\Facture;

$transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
$expeditions = Expedition::where('transporteur_id', $transporteur->id)->get();

@endphp

@extends('transporteur.layout')

@section('title')
<title>Dashboard | Remërk</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/overview.css')}}">
@endsection

@section('component-body-content')

<div class="h-100">
    {{-- <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-xl-2 row-cols-xxl-2 mb-5 g-5"> --}}
    <div class="row g-5 mb-5">
        <div class="col-xl-4 mb-5 mb-xl-10">
            @include('transporteur.components.expeditions.overview.index')
        </div>
        <div class="col-xl-8 mb-5 mb-xl-10">
            {{-- <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-2 g-5"> --}}
                {{-- <div class="col h-586px">
                    @include('transporteur.components.widgets.charts.index')
                </div> --}}
                {{-- <div class="col"> --}}
                    @include('transporteur.components.widgets.pie_chart')
                {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
    {{-- <div class="row mb-10 mb-xxl-0 mb-xl-0 mb-lg-0 g-5"> --}}
    <div class="row g-5">
        <div class="col">
            @include('transporteur.components.vehicules.overview.index')
        </div>
        {{-- <div class="col">
            @include('transporteur.components.widgets.map')
        </div> --}}
    </div>
</div>

@endsection

@section('component-modals')
@include('transporteur.components.modals.postulat')
@include('transporteur.components.modals.create-camion')
@include('transporteur.components.modals.voir-postulat')
@endsection

@section('custom-js')
{{-- <script type="module" src="src/js/moments.js"></script> --}}

<script type="text/javascript" src="{{ URL::asset('assets/js/custom/dashboard/expeditions-overview.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/custom/apps/expeditions/carrier/postulat.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('assets/js/custom/utilities/modals/create-camion.js') }}"></script>
{{-- <script type="text/javascript" src="{{ URL::asset('assets/js/custom/apps/chart/performance_chart.js') }}"></script> --}}
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/dailychart.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/weeklychart.js')}}"></script> --}}
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/pie_chart.js')}}"></script>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Dark.js"></script>
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/map.js')}}"></script> --}}

{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/perMonth.js')}}"></script> --}}
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/perYear.js')}}"></script> --}}


@endsection