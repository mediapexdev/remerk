@php
$body_classes = 'app-default';

use App\Core\Util;
use App\Models\Facture;
use App\Models\Expedition;
use App\Models\EtatExpedition;
use App\Models\Transporteur;

$transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
$expeditions = Expedition::where([
'transporteur_id' => $transporteur->id,
'etat_expedition_id' => EtatExpedition::TERMINEE
])->orderByDesc('created_at')->get();
@endphp

@extends('transporteur.layout')

@section('title')
<title>Factures | Remërk</title>
@endsection

@section('component-body-content')
{{--
<!--begin::Card--> --}}
    <div class="card card-flush h-100">
        {{--
        <!--begin::Card header--> --}}
        <div class="card-header">
            {{--
            <!--begin::Card title--> --}}
            <div class="card-title">
                <div class="d-flex align-items-center">
                    <img src="assets/icons/facture01.png" style="height: 35px; width:35px;">
                    <h2 class="ms-2">Mes factures</h2>
                </div>
            </div>
            {{--
            <!--end::Card title--> --}}
        </div>
        @if (0!==$expeditions->count())
        {{--
        <!--end::Card header--> --}}
        {{--
        <!--begin::Card body--> --}}
        <div class="card-body">
            {{--
            <!--begin::Table--> --}}
            <table id="kt_factures_table" class="table table-sm align-middle table-row-dashed">
                {{--
                <!--begin::Table head--> --}}
                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                    {{--
                    <!--begin::Table row--> --}}
                    <tr class="text-start text-gray-600 text-gray-700-in-dark text-uppercase gs-0">
                        {{-- <th class="">No.</th> --}}
                        <th>Expédition</th>
                        <th>Expéditeur</th>
                        <th>Status</th>
                        <th>Montant</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                    {{--
                    <!--end::Table row--> --}}
                </thead>
                {{--
                <!--end::Table head--> --}}
                {{--
                <!--begin::Table body--> --}}
                <tbody class="fs-6 fw-semibold text-gray">
                    @foreach ($expeditions as $expedition)
                    @php
                    $facture = $expedition->facture();
                    @endphp
                    {{--
                    <!--begin::Table row--> --}}
                    <tr>
                        {{--
                        <!--begin::Expédition--> --}}
                        <td class="text-truncate">
                            <a class="text-gray-700 text-hover-primary"
                                href="{{ route('expedition.infos', $facture->expedition->id) }}">{{$facture->expedition->string_id}}</a>
                        </td>
                        {{--
                        <!--end::Expédition--> --}}
                        {{--
                        <!--begin::Expéditeur--> --}}
                        <td>
                            <div class="d-flex align-items-center">
                                @php
                                $expediteur = $expedition->expediteur;
                                $color_class = Util::colorClassNames()[\mt_rand(0, 4)];
                                @endphp
                                {{--
                                <!--begin:: Avatar --> --}}
                                <div id="expediteur_avatar_{{ $expediteur->id }}"
                                    class="symbol symbol-circle symbol-50px overflow-hidden me-0 expediteur_avatar cursor-pointer"
                                    data-method="GET" data-route="{{ route('expediteur.details', $expediteur->id) }}">
                                    @if($expediteur->hasAvatar())
                                    <div class="symbol-label">
                                        <img class="w-100" src="{{$expediteur->avatar()}}"
                                            alt="{{$expediteur->fullName()}}">
                                    </div>
                                    @else
                                    <div class="symbol-label fs-3 bg-light-{{$color_class}} text-{{$color_class}}">
                                        {{\mb_substr($expediteur->prenom(), 0, 1)}}</div>
                                    @endif
                                </div>
                                {{--
                                <!--end::Avatar--> --}}
                                {{--
                                <!--begin::Title--> --}}
                                <div class="ms-5">
                                    <span id="expediteur_title_{{ $expediteur->id }}"
                                        class="expediteur_title text-gray-800 text-hover-primary fs-5 fw-bold cursor-pointer"
                                        data-route="{{ route('expediteur.details', $expediteur->id) }}">{{
                                        $expediteur->fullName() }}</span>
                                </div>
                                {{--
                                <!--end::Title--> --}}
                            </div>
                        </td>
                        {{--
                        <!--end::Expéditeur--> --}}
                        {{--
                        <!--begin::Status--> --}}
                        <td class="text-truncate">
                            @if(1 == $facture->etat)
                            <span class="badge bordered badge-da">Non Payée</span>
                            @elseIf(2 == $facture->etat)
                            <span class="badge badge-light-success">Payée</span>
                            @elseIf(3 == $facture->etat)
                            <span class="badge badge-light-info">Versée</span>
                            @else
                            <span class="badge badge-light-danger">Annulée</span>
                            @endif
                        </td>
                        {{--
                        <!--end::Status--> --}}
                        {{--
                        <!--begin::Amount--> --}}
                        <td><span>{{$facture->montant}}</span></td>
                        {{--
                        <!--end::Amount--> --}}
                        {{--
                        <!--begin::Date--> --}}
                        <td class="text-truncate"><span>{{\date('d-m-Y', \strtotime($facture->created_at))}}</span></td>
                        {{--
                        <!--end::Date--> --}}
                        <td>
                            <button type="button" class="btn btn-sm btn-light-primary btn_action_facture"
                                data-facture-id="{{$facture->id}}" {{(2 !=$facture->etat) ? 'disabled' : ''}}>
                                @if(2 == $facture->etat)
                                Voir
                                @else
                                Aucune
                                @endif
                            </button>
                        </td>
                    </tr>
                    {{--
                    <!--end::Table row--> --}}
                    @endforeach
                </tbody>
                {{--
                <!--end::Table body--> --}}
            </table>
            {{--
            <!--end::Table--> --}}
            <form id="form_show_facture" method="POST" action="{{route('facture.show') }}">
                @csrf
                <input type="hidden" name="facture_id">
            </form>
            @else
            <div class="container mb-10">
                <div class="d-flex justify-content-center">
                    <div class="my-2 text-center">
                        <p class="h5 text-center">
                            <span>Vous n'avez pas encore reçu de proposition ? <span>
                                    <a href="#" class="text-primary text-hover-info">Contactez-nous</a>
                        </p>
                        <div>
                            <img class="text-center" src="{{ asset('assets/images/accueil2.png') }}" alt=""
                                height="250px">
                            <div class="text-center">
                                <button class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_create_expedition">Faire une annonce</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
        {{--
        <!--end::Card body--> --}}
    </div>
    {{--
    <!--end::Card--> --}}
@endsection
@section('component-modals')
<div id="modal_details_expediteur_wrapper"></div>
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/details-expediteur.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/facturation/facturation.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/facturation/listing/factures.js')}}"></script>
@endsection
