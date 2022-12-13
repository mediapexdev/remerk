@php
$body_classes = "app-default";
@endphp

@extends('expediteur.layout')

@section('title')
<title>Détails Expédition - Remërk</title>
@endsection

@section('component-body-content')
{{--
<!--begin::Row--> --}}
<div class="d-block">
    {{--
    <!--begin::Toolbar--> --}}
    @include('expediteur.components.expeditions.infos.toolbar')
    {{--
    <!--end::Toolbar--> --}}
    {{--
    <!--begin::Content--> --}}
    <div class="d-flex flex-column gap-7 gap-lg-10">
        {{--
        <!--begin::Tab content--> --}}
        <div class="tab-content">
            {{--
            <!--begin::Tab pane--> --}}
            <div id="kt_expedition_summary" class="tab-pane fade show active" role="tab-panel">
                {{--
                <!--begin::Expedition Summary--> --}}
                @include('expediteur.components.expeditions.infos.details.index')
                {{--
                <!--end::Expedition Summary--> --}}
            </div>
            {{--
            <!--end::Tab pane--> --}}
            {{--
            <!--begin::Tab pane--> --}}
            <div id="kt_expedition_history" class="tab-pane fade" role="tab-panel">
                {{--
                <!--begin::Expedition History--> --}}
                @include('expediteur.components.expeditions.infos.history.history')
                {{--
                <!--end::Expedition History--> --}}
            </div>
            {{--
            <!--end::Tab pane--> --}}
            {{--
            <!--begin::Tab pane--> --}}
            <div id="kt_expedition_postulants" class="tab-pane fade" role="tab-panel">
                {{--
                <!--begin::Expedition History--> --}}
                @include('expediteur.components.expeditions.infos.postulants.postulants')
                {{--
                <!--end::Expedition History--> --}}
            </div>
            {{--
            <!--end::Tab pane--> --}}
        </div>
        {{--
        <!--end::Tab content--> --}}
    </div>
    {{--
    <!--end::Content--> --}}
</div>
{{--
<!--end::Row--> --}}
@endsection

@section('component-modals')
<div id="modal_details_postulant_wrapper"></div>
@endsection

@section('custom-js')
<script type="text/javascript"
    src="{{URL::asset('assets/js/custom/apps/expeditions/sender/postulants/postulants.js')}}"></script>
<script type="text/javascript"
    src="{{URL::asset('assets/js/custom/apps/expeditions/sender/postulants/listing/postulants-one.js')}}"></script>
@endsection