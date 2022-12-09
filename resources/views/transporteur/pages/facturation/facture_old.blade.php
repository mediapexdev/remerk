@php
    $body_classes = 'app-default';

    use App\Core\Util;
    use App\Models\Expedition;
    use App\Models\EtatExpedition;
    use App\Models\Facture;
    use App\Models\Transporteur;

    $transporteur_id = Transporteur::where('user_id', Auth::user()->id)->first()->id;
    $expeditions = Expedition::where([
        'transporteur_id'       => $transporteur_id,
        'etat_expedition_id'    => EtatExpedition::TERMINEE
    ])->orderByDesc('created_at')->get();
@endphp

@extends('transporteur.layout')

@section('title')
    <title>Factures - Remërk</title>
@endsection

@section('component-body-content')

@if (!$expeditions->count())
    @include('expediteur.components.default')
@else
<div class="card card-flush">
    <div class="row gy-5 g-xl-10">
        {{--
        <!--begin::Col--> --}}
        <div class="col-xl-4 mb-xl-10">
            {{--
            <!--begin::Engage widget 3--> --}}
            <img src="assets/images/Fitting_piece-dark.gif" alt="" class="img-fluid theme-dark-show rounded">
            <img src="assets/images/Fitting_piece.gif" alt="" class="img-fluid theme-light-show rounded">
            {{--
            <!--end::Engage widget 3--> --}}
        </div>
        {{--
        <!--end::Col--> --}}
        {{--
        <!--begin::Col--> --}}
        <div class="col-xl-8 mb-5 mb-xl-10">
            <!--begin::Card-->
            <div class="card card-flush border-dotted">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>Mes factures</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0 table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-dashed table-hover " id="table_facture">
                        @if (!empty($expeditions))
                        <!--begin::Table head-->
                        <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                            <!--begin::Table row-->
                            <tr class="text-start text-muted text-uppercase gs-0">
                                <th class="">No.</th>
                                <th>Expéditeur</th>
                                <th>Statut</th>
                                <th>Montant</th>
                                <th class="min-w-100px">Date</th>
                                <th>Action</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="fs-6 fw-semibold text-gray">
                            @foreach ($expeditions as $expedition)
                            <!--begin::Table row-->
                            <tr type="link" class="cursor-pointer">
                                <a>
                                    <!--begin::order=-->
                                    <td>
                                        <a class="text-gray-600 text-hover-primary mb-1">{{$expedition->facture()->id}}</a>
                                    </td>
                                    <!--end::order=-->
                                    <td>
                                        {{$expedition->expediteur->fullName()}}
                                    </td>
                                    <!--begin::Status=-->
                                    <td>
                                        @if($expedition->facture()->etat == 1)
                                        <span class="badge bordered badge-da">Non Payée</span>
                                        @elseIf($expedition->facture()->etat == 2)
                                        <span class="badge badge-light-success">Payée</span>
                                        @elseIf($expedition->facture()->etat == 3)
                                        <span class="badge badge-light-info">Versée</span>
                                        @else
                                        <span class="badge badge-light-danger">Annulée</span>
                                        @endif
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Amount=-->
                                    <td>{{$expedition->facture()->montant}}</td>
                                    <!--end::Amount=-->
                                    <!--begin::Date=-->
                                    <td>{{date('d/m/Y', strtotime($expedition->facture()->updated_at))}}</td>
                                    <!--end::Date=-->
                                    <td>
                                        <form action='{{route("transporteur.facture.show", ["id"=>$expedition->facture()->id]) }}' method="post">
                                            @csrf
                                            <input type="hidden" name="facture_id" value="{{$expedition->facture()->id}}">
                                            <button type="submit" class="btn btn-light-success">
                                                @if($expedition->facture()->etat == 1)Payer
                                                @elseIf($expedition->facture()->etat == 2)Voir
                                            </button>
                                        </form>
                                        @else
                                        <button class="btn btn-light-danger">err etat >2</button>
                                        @endif
                                    </td>
                                </a>
                            </tr>
                            <!--end::Table row-->
                            @endforeach
                            @else
                            <tr class="">
                                <div class="d-flex justify-content-center">
                                    <div class="m-0">
                                        <p>
                                            Vous n'avez pas encore reçu de proposition ? <a href="#">Contactez-nous</a>
                                        </p>
                                        <div>
                                            <img src={{ asset('assets/images/18770.png') }} alt="" height="250px"
                                                class="text-center">
                                            <div class="text-center">
                                                <button class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                                    data-bs-target="#kt_modal_create_expedition">Vous n'avez achevé aucune expédition pour le moment</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endif
                        </tbody>
                        <!--end::Table body-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        {{--
        <!--end::Col--> --}}
    </div>
</div>

@endif

@endsection
@section('custom-js')
<script>
    $(document).ready(function(){
        $('#table_facture').DataTable({
            responsive : true,
            info:false
        })
    });
</script>
@endsection