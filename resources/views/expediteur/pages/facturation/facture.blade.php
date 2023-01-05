@php
$body_classes = 'app-default';

use App\Core\Util;
use App\Models\Facture;
use App\Models\Expedition;
use App\Models\Expediteur;
use App\Models\Transporteur;

$expediteur = Expediteur::where('user_id', Auth::user()->id)->first();
$expeditions = Expedition::where('expediteur_id', $expediteur->id)->orderByDesc('created_at')->get();
$expeditions_facture = [];

foreach ($expeditions as $expedition) {
if ($expedition->facture()) {
$expeditions_facture[] = $expedition;
}
}
@endphp

@extends('expediteur.layout')

@section('title')
<title>Mes factures - Remërk</title>
@endsection

@section('component-body-content')

@if (!$expeditions->count())
@include('expediteur.components.globals.default')
@else
{{--
<!--begin::Card--> --}}
<div class="card card-flush">
    {{-- <div class="row gy-5 g-xl-10"> --}}
        {{--
        <!--begin::Col--> --}}
        {{-- <div class="col-xl-4 mb-xl-10 d-none d-xl-block d-xxl-block"> --}}
            {{--
            <!--begin::Engage widget 3--> --}}
            {{-- <img class="img-fluid theme-dark-show rounded"
                src="{{URL::asset('assets/images/Fitting_piece-dark.gif')}}" alt=""> --}}
            {{-- <img class="img-fluid theme-light-show rounded" src="{{URL::asset('assets/images/Fitting_piece.gif')}}"
                alt=""> --}}
            {{--
            <!--end::Engage widget 3--> --}}
        {{-- </div> --}}
        {{--
        <!--end::Col--> --}}
        {{--
        <!--begin::Col--> --}}
        <div class="mx-5">
            {{--
            <!--begin::Card--> --}}
            {{-- <div class="card card-flush border-dotted "> --}}
                {{--
                <!--begin::Card header--> --}}
                <div class="card-header border-0">
                    {{--
                    <!--begin::Card title--> --}}
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <img src="{{URL::asset('assets/icons/facture01.png')}}" style="height: 35px; width:35px;">
                            <h2 class="ms-2">Mes factures</h2>
                        </div>
                    </div>
                    {{--
                    <!--end::Card title--> --}}
                </div>
                {{--
                <!--end::Card header--> --}}
                {{--
                <!--begin::Card body--> --}}
                <div class="card-body">
                    {{--
                    <!--begin::Table--> --}}
                    <table id="kt_factures_table" class="table table-sm align-middle table-row-dashed">
                        @if (!empty($expeditions_facture))
                        {{--
                        <!--begin::Table head--> --}}
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            {{--
                            <!--begin::Table row--> --}}
                            <tr class="text-start text-gray-600 text-gray-700-on-dark text-uppercase gs-0">
                                {{-- <th class="">No.</th> --}}
                                <th>Expédition</th>
                                <th>Transporteur</th>
                                <th>Status</th>
                                <th>Montant</th>
                                <th>Date</th>
                                <th>Action</th>
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
                            $factures = Facture::where('expedition_id',
                            $expedition->id)->orderByDesc('created_at')->get();
                            @endphp
                            @foreach($factures as $facture)
                            {{--
                            <!--begin::Table row--> --}}
                            <tr>
                                {{--
                                <!--begin::order--> --}}
                                {{--
                                <!--begin::Expédition id--> --}}
                                <td class="text-truncate">
                                    <a class="text-gray-700 text-hover-primary"
                                        href="{{ route('expedition.infos', $facture->expedition->id) }}">{{$facture->expedition->string_id}}</a>
                                </td>
                                {{--
                                <!--end::Expédition--> --}}
                                {{--
                                <!--begin::Transporteur--> --}}
                                <td>
                                    <div class="d-flex align-items-center">
                                        @php
                                        $transporteur = $expedition->transporteur;
                                        $color_class = Util::colorClassNames()[\mt_rand(0, 4)];
                                        @endphp
                                        {{--
                                        <!--begin:: Avatar --> --}}
                                        <div id="transporteur_avatar_{{ $transporteur->id }}"
                                            class="symbol symbol-circle symbol-50px overflow-hidden me-0 transporteur_avatar cursor-pointer"
                                            data-method="GET"
                                            data-route="{{ route('transporteur.details', $transporteur->id) }}">
                                            @if($transporteur->hasAvatar())
                                            <div class="symbol-label">
                                                <img class="w-100" src="{{$transporteur->avatar()}}"
                                                    alt="{{$transporteur->fullName()}}">
                                            </div>
                                            @else
                                            <div
                                                class="symbol-label fs-3 bg-light-{{$color_class}} text-{{$color_class}}">
                                                {{\mb_substr($transporteur->prenom(), 0, 1)}}</div>
                                            @endif
                                        </div>
                                        {{--
                                        <!--end::Avatar--> --}}
                                        {{--
                                        <!--begin::Title--> --}}
                                        <div class="ms-5">
                                            <span id="transporteur_title_{{ $transporteur->id }}"
                                                class="transporteur_title text-gray-800 text-hover-primary fs-5 fw-bold cursor-pointer"
                                                data-route="{{ route('transporteur.details', $transporteur->id) }}">{{
                                                $transporteur->fullName() }}</span>
                                        </div>
                                        {{--
                                        <!--end::Title--> --}}
                                    </div>
                                </td>
                                {{--
                                <!--end::Transporteur--> --}}
                                {{--
                                <!--begin::Status--> --}}
                                <td class="text-truncate">
                                    @if(1 == $facture->etat)
                                    <span class="badge bordered badge-warning">Non Payée</span>
                                    @elseIf(2 == $facture->etat)
                                    <span class="badge badge-light-success">Payée</span>
                                    @else
                                    <span class="badge badge-light-danger">Annulée</span>
                                    @endif
                                </td>
                                {{--
                                <!--end::Status--> --}}
                                {{--
                                <!--begin::Amount--> --}}
                                <td><span>{{number_format($facture->montant, 0, ',', ' ')}}</span> <span
                                        class="text-gray-600">FrCFA</span></td>
                                {{--
                                <!--end::Amount--> --}}
                                {{--
                                <!--begin::Date--> --}}
                                <td class="text-truncate"><span>{{\date('d-m-Y',
                                        \strtotime($facture->created_at))}}</span></td>
                                {{--
                                <!--end::Date--> --}}
                                <td>
                                    <button type="button" class="btn btn-sm btn-light-primary btn_action_facture"
                                        data-facture-id="{{$facture->id}}">
                                        @if(1 == $facture->etat)
                                        Payer
                                        @else
                                        Voir
                                        @endif
                                    </button>
                                </td>
                            </tr>
                            {{--
                            <!--end::Table row--> --}}
                            @endforeach
                            @endforeach
                            @else
                            <tr>
                                <div class="d-flex justify-content-center">
                                    <div class="m-0">
                                        <p>
                                            <span>Vous n'avez pas encore reçu de proposition ? <span>
                                                    <a href="#" class="text-primary text-hover-info">Contactez-nous</a>
                                        </p>
                                        <div>
                                            <img class="text-center" src="{{ asset('assets/images/18770.png') }}" alt=""
                                                height="250px">
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_create_expedition">Faire une
                                                    expedition</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endif
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
                </div>
                {{--
                <!--end::Card body--> --}}
                {{--
            </div> --}}
            {{--
            <!--end::Card--> --}}
            {{--
        </div> --}}
        {{--
        <!--end::Col--> --}}
    </div>
</div>
@endif
@endsection
@section('component-modals')
<div id="modal_details_transporteur_wrapper"></div>
<!-- Button trigger modal -->
@if(session('rep'))

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="min-height: 480px; min-width:640px">
        <div class="modal-content p-0">
            <div class="modal-body p-0">
                {{-- <iframe src="{{$response['redirect_url']}}" frameborder="0"></iframe> --}}
                <iframe src="{{session('rep')['redirect_url']}}" frameborder="0" width="100%" height="600"></iframe>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('custom-js')
<script type="text/javascript"
    src="{{URL::asset('assets/js/custom/apps/expeditions/sender/facturation/facturation.js')}}"></script>
<script type="text/javascript"
    src="{{URL::asset('assets/js/custom/apps/expeditions/sender/facturation/listing/factures.js')}}"></script>
<script src="{{Url::asset('assets/js/custom/apps/')}} "></script>
<script>
    $('document').ready(function(){
        @if(Session::has('rep'))
            $('#exampleModal').modal('show');
        @endif
    });
</script>
@endsection