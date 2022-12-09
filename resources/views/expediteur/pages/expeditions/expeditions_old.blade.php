@php
	$body_classes = "app-default";

    use App\Models\Expediteur;
	use App\Models\Expedition;
	use App\Models\EtatExpedition;
    use App\Models\ExpeditionsDepart;
    use App\Models\ExpeditionsMatiere;

    $expediteur = Expediteur::where('user_id', Auth::user()->id)->first();
    $expeditions = Expedition::where('expediteur_id', $expediteur->id)->get();
@endphp

@extends('expediteur.layout')

@section('title')
	<title>Mes expéditions - Rëmerk</title>
@endsection

@section('component-body-content')
{{-- <!--begin::Row--> --}}
<div class="row gy-5 g-xl-10 h-100">
    @if (!$expeditions->count())
        @include('expediteur.components.default')
    @else
    <div class="card card-flush h-xl-100 table-responsive">
        {{-- <!--begin::Card header--> --}}
        <div class="card-header pt-7">
            {{-- <!--begin::Title--> --}}
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Mes expéditions</span>
                <span class="text-gray-400 mt-1 fw-semibold fs-6"></span>
            </h3>
            {{-- <!--end::Title--> --}}
            {{-- <!--begin::Actions--> --}}
            <div class="card-toolbar">
                {{-- <!--begin::Filters--> --}}
                <div class="d-flex flex-stack flex-wrap gap-4">
                    {{-- <!--begin::Status--> --}}
                    <div class="d-flex align-items-center fw-bold">
                        {{-- <!--begin::Label--> --}}
                        <div class="text-gray-400 fs-7 me-2">Status</div>
                        {{-- <!--end::Label--> --}}
                        {{-- <!--begin::Select--> --}}
                        <select class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                            data-control="select2" data-hide-search="true" data-dropdown-css-class="w-150px"
                            data-placeholder="Select an option" data-kt-table-widget-4="filter_status">
                            <option></option>
                            <option value="Show All" selected="selected">- Tout -</option>
                            <option value="Shipped">En attente</option>
                            <option value="Pending">En cours</option>
                            <option value="Confirmed">Terminées</option>
                            <option value="Rejected">Annulées</option>
                        </select>
                        <!--end::Select-->
                    </div>
                    {{-- <!--end::Status--> --}}
                    {{-- <!--begin::Search--> --}}
                    <div class="position-relative my-1">
                        {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg--> --}}
                        <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                            </svg>
                        </span>
                        {{-- <!--end::Svg Icon--> --}}
                        <input type="text" id="search"
                            class="form-control w-150px fs-7 ps-12" placeholder="Recherche" />
                    </div>
                    {{-- <!--end::Search--> --}}
                </div>
                {{-- <!--begin::Filters--> --}}
            </div>
            {{-- <!--end::Actions--> --}}
        </div>
        {{-- <!--end::Card header--> --}}
        {{-- <!--begin::Card body--> --}}
        <div class="card-body pt-2">
            {{-- <!--begin::Table--> --}}
            @include('expediteur.components.expeditions.list')
            {{-- <!--end::Table--> --}}
        </div>
        {{-- <!--end::Card body--> --}}
    </div>
    @endif
</div>
{{-- <!--end::Row--> --}}
@endsection

@section('component-modals')
    @include('expediteur.components.modals.confirm_cancel')
@endsection
@section('custom-js')
<script src="{{URL::asset('assets/js/custom/apps/expeditions/expeditions.js')}}"></script>
<script>
    $(document).ready(function(){
        var table = $('#list_expedition_table').DataTable({
            responsive : true,
            info:false
        });

        $('#search').on( 'keyup', function () {
            table
        .columns(2)
            table.search( this.value ).draw();
        });
    });
</script>
@endsection