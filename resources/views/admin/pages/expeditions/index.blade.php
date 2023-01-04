@php
use App\Models\Matiere;
use App\Models\Expedition;
use App\Models\Expediteur;
use App\Models\EtatExpedition;

$expediteurs = Expediteur::get();

$pending_expeditions = Expedition::where('etat_expedition_id',
EtatExpedition::EN_ATTENTE)->orderByDesc('created_at')->get();

$current_expeditions = Expedition::whereIn('etat_expedition_id', [
EtatExpedition::EN_ATTENTE_DE_PAIEMENT,
EtatExpedition::EN_ATTENTE_DE_CHARGEMENT,
EtatExpedition::CHARGE,
EtatExpedition::EN_TRANSIT,
EtatExpedition::DECHARGE
])->orderByDesc('created_at')->get();

$completed_expeditions = Expedition::where([
'etat_expedition_id' => EtatExpedition::TERMINEE
])->orderByDesc('created_at')->get();

$etat_expeditions = EtatExpedition::get();
$t_colors_classes = ['danger', 'info', 'primary', 'success', 'warning'];
@endphp

@extends('admin.layout')

@section('title')
<title>Expéditions | Remërk</title>
@endsection

@section('component-body-content')

{{--
<!--begin::Expeditions--> --}}
<div class="card mb-5 mb-xl-10">
    {{--
    <!--begin::Card body--> --}}
    <div class="card-body">
        {{--
        <!--begin::Nav--> --}}
        @include('admin.components.expeditions.navigation')
        {{--
        <!--end::Nav--> --}}
        {{--
        <!--begin::Content--> --}}
        <div class="tab-content">
            {{--
            <!--begin::Expeditions Disponibles--> --}}
            <div id="rk_tab_pending_expeditions" class="tab-pane fade show active" role="tabpanel">
                @include('admin.components.expeditions.pending.view')
            </div>
            {{--
            <!--end::Expeditions Disponibles--> --}}
            {{--
            <!--begin::Expeditions En Cours--> --}}
            <div id="rk_tab_expeditions_in_progress" class="tab-pane fade" role="tabpanel">
                @include('admin.components.expeditions.in-progress.view')
            </div>
            {{--
            <!--end::Expeditions En Cours--> --}}
            {{--
            <!--begin::Expeditions Effectuées--> --}}
            <div id="rk_tab_expeditions_made" class="tab-pane fade" role="tabpanel">
                @include('admin.components.expeditions.made.view')
            </div>
            {{--
            <!--end::Expeditions Effectuées--> --}}
        </div>
        {{--
        <!--end::Content--> --}}
    </div>
    {{--
    <!--end::Card body--> --}}
</div>
{{--
<!--end::Expeditions--> --}}
@endsection

@section('component-modals')
@endsection

@section('scripts')
{{-- <script src="{{URL::asset('assets/js/custom/apps/expeditions/admin/expeditions.js')}}"></script> --}}
<script src="{{URL::asset('assets/js/custom/apps/expeditions/admin/listing/made.js')}}"></script>
<script src="{{URL::asset('assets/js/custom/apps/expeditions/admin/listing/pending.js')}}"></script>
<script src="{{URL::asset('assets/js/custom/apps/expeditions/admin/listing/in-progress.js')}}"></script>
@endsection
