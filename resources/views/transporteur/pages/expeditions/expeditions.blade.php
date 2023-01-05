@php
	$body_classes = "app-default";

    use App\Models\Matiere;
    use App\Models\Expedition;
    use App\Models\EtatExpedition;
    use App\Models\Transporteur;
    use Illuminate\Support\Collection;

    $transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
    /*$vehicles = $transporteur->vehicules;

    $available_expeditions = Collection::make();
    $all_expeditions_available = Expedition::where('etat_expedition_id', EtatExpedition::EN_ATTENTE)->orderByDesc('created_at')->get();

    foreach ($all_expeditions_available as $expedition) {
        if($vehicles->contains(function ($vehicle) use($expedition) {
            return $expedition->expeditionMatiere->types_vehicule_id == $vehicle->id; })){
            $available_expeditions->push($expedition);
        }
    }*/
    $available_expeditions = Expedition::where('etat_expedition_id', EtatExpedition::EN_ATTENTE)->orderByDesc('created_at')->get();

    $current_expeditions = Expedition::where('transporteur_id', $transporteur->id)->whereIn('etat_expedition_id', [
        EtatExpedition::EN_ATTENTE_DE_PAIEMENT,
        EtatExpedition::EN_ATTENTE_DE_CHARGEMENT,
        EtatExpedition::CHARGE,
        EtatExpedition::EN_TRANSIT,
        EtatExpedition::DECHARGE
    ])->orderByDesc('created_at')->get();

    $completed_expeditions = Expedition::where([
        'transporteur_id'       => $transporteur->id,
        'etat_expedition_id'    => EtatExpedition::TERMINEE
    ])->orderByDesc('created_at')->get();

    $matieres = Matiere::all();
@endphp

@extends('transporteur.layout')

@section('title')
	<title>Expéditions | Remërk</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/expediteurs.css')}}">
@endsection

@section('component-body-content')
{{-- <!--begin::Row--> --}}
<div class="d-block">
    {{-- <!--begin::Toolbar--> --}}
    {{-- @include('transporteur.components.expeditions.toolbar') --}}
    {{-- <!--end::Toolbar--> --}}
    @if(!$available_expeditions->count() && !$current_expeditions->count() && !$completed_expeditions->count())
        @include('expediteur.components.globals.default')
    @else
    {{-- <!--begin::Expeditions--> --}}
    <div class="list-expeditions-widget card container-fluid mb-5 mb-xl-10">
        {{-- <!--begin::Card header--> --}}
        <div class="card-header">
            {{-- <!--begin::Card title--> --}}
            <div class="card-title">
                <div class="d-flex align-items-center">
                    <img src="{{URL::asset('assets/icons/expedition03.png')}}" style="height: 40px; width:40px;">
                    <h2 class="fw-bold ms-2 mt-4">Liste des expéditions</h2>
                </div>
            </div>
            {{-- <!--end::Card title--> --}}
            {{-- <div class="card-toolbar"></div> --}}
        </div>
        {{-- <!--end::Card header--> --}}
        {{-- <!--begin::Card body--> --}}
        <div class="card-body">
            {{-- <!--begin::Nav--> --}}
            @include('transporteur.components.expeditions.navigation')
            {{-- <!--end::Nav--> --}}
            {{-- <!--begin::Content--> --}}
            <div class="tab-content">
                {{-- <!--begin::Expeditions Disponibles--> --}}
                <div id="kt_tab_available_expeditions" class="tab-pane fade show active" role="tabpanel">
                    @include('transporteur.components.expeditions.available.view')
                </div>
                {{-- <!--end::Expeditions Disponibles--> --}}
                {{-- <!--begin::Expeditions En Cours--> --}}
                <div id="kt_tab_expeditions_in_progress" class="tab-pane fade" role="tabpanel">
                    @include('transporteur.components.expeditions.in-progress.view')
                </div>
                {{-- <!--end::Expeditions En Cours--> --}}
                {{-- <!--begin::Expeditions Effectuées--> --}}
                <div id="kt_tab_expeditions_made" class="tab-pane fade" role="tabpanel">
                    @include('transporteur.components.expeditions.made.view')
                </div>
                {{-- <!--end::Expeditions Effectuées--> --}}
            </div>
            {{-- <!--end::Content--> --}}
        </div>
        {{-- <!--end::Card body--> --}}
    </div>
    {{-- <!--end::Expeditions--> --}}
    @endif
</div>
{{-- <!--end::Row--> --}}
@endsection

@section('component-modals')
    @include('transporteur.components.modals.postulat')
    @include('transporteur.components.modals.voir-postulat')
    <div id="modal_details_expediteur_wrapper"></div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/details-expediteur.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/postulat.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/listing/made.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/listing/available.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/listing/in-progress.js')}}"></script>
@endsection
