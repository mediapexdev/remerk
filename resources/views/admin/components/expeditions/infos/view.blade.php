@extends('admin.layout')

@section('title')
<title>Détails expédition - Remërk</title>
@endsection

@section('component-body-content')
{{--
<!--begin::Content--> --}}
<div class="d-flex flex-column gap-7 gap-lg-10">
    {{--
    <!--begin::Toolbar--> --}}
    @include('admin.components.expeditions.infos.toolbar')
    {{--
    <!--end::Toolbar--> --}}
    {{--
    <!--begin::Tab content--> --}}
    <div class="tab-content">
        {{--
        <!--begin::Tab pane--> --}}
        <div id="kt_expedition_summary" class="tab-pane fade show active" role="tab-panel">
            {{--
            <!--begin::Expedition Summary--> --}}
            @include('admin.components.expeditions.infos.details.index')
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
            @include('admin.components.expeditions.infos.history.history')
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
            @include('admin.components.expeditions.postulants')
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