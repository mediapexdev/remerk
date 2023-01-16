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
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/custom/expeditions/overview.css') }}">
@endsection

@section('component-body-content')
    <div class="h-100">
        {{--
    <!--begin::Row--> --}}
        <div class="row mb-10 mb-xxl-0 mb-xl-0 mb-lg-0">
            {{--
        <!--begin::Left Col--> --}}
            <div class="col-xl-4 gx-5 mb-5">
                <div class="col mb-5">
                    @include('transporteur.components.expeditions.overview.index')
                </div>
                <div class="col">
                    @include('transporteur.components.vehicules.overview.index')
                </div>
            </div>
            {{--
        <!--begin::Left Col--> --}}
            {{--
        <!--begin::Right Col--> --}}
            <div class="col-xl-8">
                <div class="col mb-5">
                    @include('transporteur.components.widgets.map')
                </div>
                {{-- <div class="col">
                @include('transporteur.components.widgets.overview')
            </div> --}}
                <div class="col">
                    @include('transporteur.components.widgets.pie_chart')
                </div>
            </div>
            {{--
        <!--begin::Right Col--> --}}
            {{--
        <!--end::Row--> --}}
        </div>
    </div>
@endsection

@section('component-modals')
    @include('transporteur.components.modals.postulat')
    @include('transporteur.components.modals.create-camion')
    @include('transporteur.components.modals.voir-postulat')
@endsection

@section('custom-js')
    <script type="text/javascript" src="{{ URL::asset('assets/js/custom/dashboard/expeditions-overview.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/custom/apps/expeditions/carrier/postulat.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/custom/utilities/modals/create-camion.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/custom/apps/chart/performance_transporteur.js') }}">
    </script>
    <script src="{{URL::asset('assets/js/custom/apps/chart/pie_chart.js')}}"></script>


    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Dark.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/senegalHigh.js"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/map.js')}}"></script>
    
@endsection
