@php
	$body_classes = "app-default";

    use App\Core\Util;
    use App\Models\Matiere;
    use App\Models\Expedition;
    use App\Models\Expediteur;
    use App\Models\EtatExpedition;

    $expediteur          = Expediteur::where('user_id', Auth::user()->id)->first();
    $pending_expeditions = Expedition::where('etat_expedition_id', EtatExpedition::EN_ATTENTE)->orderByDesc('created_at')->get();

    $current_expeditions = Expedition::where('expediteur_id', $expediteur->id)->whereIn('etat_expedition_id', [
        EtatExpedition::EN_ATTENTE_DE_PAIEMENT,
        EtatExpedition::EN_ATTENTE_DE_CHARGEMENT,
        EtatExpedition::CHARGE,
        EtatExpedition::EN_TRANSIT,
        EtatExpedition::DECHARGE
    ])->orderByDesc('created_at')->get();

    $completed_expeditions = Expedition::where([
        'expediteur_id'         => $expediteur->id,
        'etat_expedition_id'    => EtatExpedition::TERMINEE
    ])->orderByDesc('created_at')->get();

    $matieres = Matiere::all();
@endphp

@extends('expediteur.layout')

@section('title')
	<title>Mes expéditions - Remërk</title>
@endsection

@section('component-body-content')
{{-- <!--begin::Row--> --}}
<div class="d-block">
    @if(!$pending_expeditions->count() && !$current_expeditions->count() && !$completed_expeditions->count())
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
                    <h2 class="ms-2 mt-4">Mes expéditions</h2>
                </div>
            </div>
            {{-- <!--end::Card title--> --}}
            {{-- <div class="card-toolbar"></div> --}}
        </div>
        {{-- <!--end::Card header--> --}}
        {{-- <!--begin::Card body--> --}}
        <div class="card-body">
            {{-- <!--begin::Nav--> --}}
            @include('expediteur.components.expeditions.navigation')
            {{-- <!--end::Nav--> --}}
            {{-- <!--begin::Content--> --}}
            <div class="tab-content">
                {{-- <!--begin::Expeditions Disponibles--> --}}
                <div id="kt_tab_pending_expeditions" class="tab-pane fade show active" role="tabpanel">
                    @include('expediteur.components.expeditions.pending.view')
                </div>
                {{-- <!--end::Expeditions Disponibles--> --}}
                {{-- <!--begin::Expeditions En Cours--> --}}
                <div id="kt_tab_expeditions_in_progress" class="tab-pane fade" role="tabpanel">
                    @include('expediteur.components.expeditions.in-progress.view')
                </div>
                {{-- <!--end::Expeditions En Cours--> --}}
                {{-- <!--begin::Expeditions Effectuées--> --}}
                <div id="kt_tab_expeditions_made" class="tab-pane fade" role="tabpanel">
                    @include('expediteur.components.expeditions.made.view')
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
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/expeditions.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/listing/made.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/listing/pending.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/sender/listing/in-progress.js')}}"></script>
@endsection
