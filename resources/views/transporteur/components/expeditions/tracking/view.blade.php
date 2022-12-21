@php
    $body_classes = 'app-default';

    use App\Models\EtatExpedition;
    use App\Models\ExpeditionsTracking;
    
    $expedition_tracking = ExpeditionsTracking::where('expedition_id', $expedition->id)->first();
@endphp

@extends('transporteur.layout')

@section('title')
<title>Suivi expéditions - Remërk</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/tracking.css')}}">
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}">
@endsection

@section('component-body-content')
    {{-- <!--begin::Row--> --}}
    <div class="d-block">
        {{-- <!--begin::Toolbar--> --}}
        @include('transporteur.components.expeditions.tracking.toolbar')
        {{-- <!--end::Toolbar--> --}}
        {{-- <!--begin::Content--> --}}
        <div class="d-flex flex-column gap-7 gap-lg-10">
            {{-- <!--begin::Tab content--> --}}
            <div class="tab-content">
                {{-- <!--begin::Tab pane--> --}}
                <div id="kt_expedition_tracking" class="tab-pane fade show active" role="tab-panel">
                    {{-- <!--begin::Wrapper--> --}}
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        {{-- <!--begin::Expedition Tracking--> --}}
                        <div id="tracking_steps_wrapper">
                            @include('transporteur.components.expeditions.tracking.steps.index')
                        </div>
                        {{-- <!--end::Expedition Tracking--> --}}
                    </div>
                    {{-- <!--end::Wrapper--> --}}
                </div>
                {{-- <!--end::Tab pane--> --}}
                {{-- <!--begin::Tab pane--> --}}
                <div id="kt_expedition_summary" class="tab-pane fade" role="tab-panel">
                    {{-- <!--begin::Expedition Summary--> --}}
                    @include('transporteur.components.expeditions.infos.details.index')
                    {{-- <!--end::Expedition Summary--> --}}
                </div>
                {{-- <!--end::Tab pane--> --}}
            </div>
            {{-- <!--end::Tab content--> --}}
        </div>
        {{-- <!--end::Content--> --}}
    </div>
    {{-- <!--end::Row--> --}}
@endsection

@section('component-modals')
    @include('transporteur.components.modals.confirmation-delivery')
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/tracking.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
@endsection
