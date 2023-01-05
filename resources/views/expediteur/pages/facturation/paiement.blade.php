@php
$body_classes = 'app-default';
@endphp

@extends('expediteur.layout')

@section('title')
<title>Ma facture | Remërk</title>
@endsection

@section('styles')
<link type="text/css" rel="stylesheet" href="https://paytech.sn/cdn/paytech.min.css">
@endsection

@section('component-body-content')
{{--
<!--begin::Row--> --}}
<div class="row gy-0 g-xl-10">
    <div class="container d-xxl-none d-xl-none d-lg-none pb-5">
        <div class="row d-flex flex-row-reverse d-print-none">
            <div class="col-xl-4 col-xxl-4 col-4">
                @if($facture->etat == 1)
                <button class="btn btn-sm btn-success w-100" onclick="buy(this)"><i class="bi bi-cash-stack"></i>
                    <span>Payer</span>
                </button>
                @else
                <a href="{{route('facturation')}}" class="btn btn-sm btn-info w-100">
                    <i class="bi bi-backspace"></i>
                    <span>Retour</span>
                </a>
                @endif
            </div>
            <div class="col-xl-8 col-xxl-8 col-8">
                <button type="button" class="btn btn-sm btn-primary w-100" onclick="imprimer()">
                    <i class="bi bi-printer-fill"></i>
                    <span>Imprimer ou Télécharger</span>
                </button>
            </div>
        </div>
    </div>
    <!--begin::Paiement -->
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-20 m-0 p-0 pt-5">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0" id="facture">
                    <!--begin::Invoice2content-->
                    <div class="container-fluid">
                        <!--begin::Top-->
                        <div class="row">
                            <!--begin::Logo-->
                            <div class="col-6">
                                <div class="container-fluid">
                                    <img class="d-block h-50px"
                                        src="{{URL::asset('assets/images/Logo-2-removebg.png')}}" alt="Logo">
                                    <div class="fw-semibold fs-7 text-gray-700 m-3">
                                        <div><span>S15 Hann Maristes</span></div>
                                        <div><span>Dakar, Sénégal</span></div>
                                        <div><span>+221 33 832 60 00</span></div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Logo-->
                            <div class="col-6">
                                <div class="d-flex align-items-end flex-column">
                                    <div class="d-flex align-items-start flex-column">
                                        <div class="fw-bold fs-5 text-gray-800 text-gray-900-in-dark mb-4">
                                            <span>Facture N° R-00{{$facture->id}}</span>
                                            <br>
                                            <span>Date: {{\date('d/m/Y', \strtotime($facture->created_at))}}</span>
                                        </div>
                                        <div class="fw-bold fs-6 text-gray-800 text-gray-900-in-dark">{{$expediteur->fullName()}}</div>
                                        <div class="fw-semibold fs-7 text-gray-700">{{$expediteur->adresse}}</div>
                                        <div class="fw-semibold fs-7 text-gray-700">{{$expediteur->phoneNumber(true)}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Wrapper-->
                        <hr class="h-75px">
                        <div class="mt-5">
                            <!--begin::Content-->
                            <div class="flex-grow-1">
                                <!--begin::Table-->
                                <div class="table-responsive border-bottom mb-9">
                                    <table class="table mb-3">
                                        <thead>
                                            <tr class="border-bottom fs-6 fw-bold text-gray-600 text-gray-700-in-dark">
                                                <th class="min-w-200px pb-2">Description</th>
                                                <th class="min-w-70px text-center pb-2">Poids</th>
                                                <th class="min-w-80px text-center pb-2">Transporteur</th>
                                                <th class="min-w-100px text-end pb-2">Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="fw-bold text-gray-800 text-gray-900-in-dark fs-5 text-start">
                                                <td class="pt-6">
                                                    <span>Transport de {{$expedition->matiereType()}}</span>
                                                </td>
                                                <td class="pt-6">
                                                    <span>{{$expedition->matiereWeight()}}</span>
                                                </td>
                                                <td class="pt-6">
                                                    <span>{{$transporteur->fullName()}}</span>
                                                </td>
                                                <td class="pt-6 fw-semi-bold fs-6">
                                                    <span>{{number_format($facture->montant, 0, ',', ' ')}}</span>
                                                    <span class="text-gray-700"> Fr Cfa</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                                <!--begin::Container-->
                                <div class="d-flex justify-content-end">
                                    <!--begin::Section-->
                                    <div class="mw-300px mt-5">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-stack">
                                            <!--begin::Code-->
                                            <div class="fw-semibold pe-10 text-gray-800 fs-6">Montant net à payer :</div>
                                            <!--end::Code-->
                                            <!--begin::Label-->
                                            <div class="text-start fw-bold fs-5 text-gray-800 text-gray-900-in-dark">
                                                <span>{{number_format($facture->montant, 0, ',', ' ')}}</span>
                                                <span class="text-gray-700"> Fr Cfa</span>
                                            </div>
                                            <!--end::Label-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Section-->
                                </div>
                                <!--end::Container-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Invoice2content-->
                    <div class="mt-20">
                        <div class="text-gray-600">
                            <p class="fs-8 my-5">Conditions de paiement: </p>
                            <p class="fs-9">
                                Les paiements doivent être effectués en Franc CFA.
                                Le paiement de la totalité du prix doit être reçu avant la livraison de la marchandise.
                                Une retenue de 10% sera appliquée en cas de paiement tardif.
                                Nous nous réservons le droit de refuser tout paiement en cas de litige en cours.
                                Nous nous réservons le droit de modifier ces conditions de paiement à tout moment.
                            </p>
                        </div>
                    </div>
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="d-print-none col-xxl-4 col-xl-4 border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px bg-lighten">
                    <!--begin::Invoice sidebar-->
                    <div class="container py-5">
                        <!--begin::actions-->
                        <div class="mb-8">
                            <div class="container-fluid d-none d-xl-block d-xxl-block d-lg-block">
                                <div class="row align-items-center justify-content-center">
                                    <div class="col-xl-4 col-xxl-4 col-4">
                                        @if($facture->etat == 1)
                                        <button class="btn btn-sm btn-success w-100" onclick="buy(this)"><i class="bi bi-cash-stack"></i>
                                            <span>Payer</span>
                                        </button>
                                        @else
                                        <a href="{{route('facturation')}}" class="btn btn-sm btn-info w-100">
                                            <i class="bi bi-backspace"></i>
                                            <span>Retour</span>
                                        </a>
                                        @endif
                                    </div>
                                    <div class="col-xl-8 col-xxl-8 col-8">
                                        <button type="button" class="btn btn-sm btn-primary my-1 me-12" onclick="imprimer()">
                                            <i class="bi bi-printer-fill"></i>
                                            <span>Imprimer-Télécharger</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::actions-->
                        <!--begin::Title-->
                        <h6 class="mb-8 fw-bolder text-gray-800 text-gray-900-in-dark text-center">DETAILS DU PAIEMENT</h6>
                        <!--end::Title-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <p class="text-gray-700 text-gray-800-in-dark fs-6">
                                Paiement possible via Orange Money, Wave, Free-Money, Carte bancaire, Paypal, et partout au Sénégal.
                            </p>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="my-5 container-fluid">
                            <div class="d-flex flex-column">
                                <div class="d-flex justify-content-around m-2">
                                    <img src="assets/images/mobile_money/om.png" alt="" class="img" height="90px">
                                    <img src="assets/images/mobile_money/wave.png" alt="" class="img" height="90px">
                                    <img src="assets/images/mobile_money/free.png" alt="" class="img" height="90px">
                                </div>
                                <div class="d-flex justify-content-around m-2">
                                    <img src="assets/images/mobile_money/e-money.png" alt="" class="img" height="90px">
                                    <img src="assets/images/mobile_money/wizall.png" alt="" class="img" height="90px">
                                    <img src="assets/images/mobile_money/ecobank.png" alt="" class="img" height="90px">
                                </div>
                                <div class="d-flex justify-content-around m-2">
                                    <img src="assets/images/mobile_money/visa.png" alt="" class="img" height="90px">
                                    <img src="assets/images/mobile_money/mastercard.png" alt="" class="img"
                                        height="90px">
                                    <img src="assets/images/mobile_money/orabank.png" alt="" class="img" height="90px">
                                </div>

                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="m-0 d-none">
                            <div class="text-gray-400 fs-10">
                                <p class="m-5">Conditions de paiement: </p>
                                <p class="">
                                    Les paiements doivent être effectués en Franc CFA.
                                    Le paiement de la totalité du prix doit être reçu avant la livraison de la marchandise.
                                    Une retenue de 10% sera appliquée en cas de paiement tardif.
                                    Nous nous réservons le droit de refuser tout paiement en cas de litige en cours.
                                    Nous nous réservons le droit de modifier ces conditions de paiement à tout moment.
                                </p>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Invoice sidebar-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Paiement-->
</div>
<!--end::Row-->
@endsection

@section('component-modals')
@endsection

@section('custom-js')

<script type="text/javascript" src="https://paytech.sn/cdn/paytech.min.js"></script>
<script>
    function buy(btn) {
        (new PayTech({
            facture_id        : {{$expedition->id}}, //will be sent to paiement.php page
            expedition_id     : {{$facture->id}},
        })).withOption({
            requestTokenUrl   : '/payer-facture',
            method            : 'POST',
            headers           : {
                "Accept"      : "text/html",
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            prensentationMode : PayTech.OPEN_IN_POPUP,
            willGetToken      : function () {
            },
            didGetToken       : function (token, redirectUrl) {
            },
            didReceiveError   : function (error) {
            },
            didReceiveNonSuccessResponse: function (jsonResponse) {
            }
        }).send();
    }
</script>
@endsection