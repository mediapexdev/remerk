@php
$body_classes = 'app-default';
@endphp

@extends('expediteur.layout')

@section('title')
<title>Ma facture - Remërk</title>
@endsection

@section('component-body-content')
{{--
<!--begin::Row--> --}}
<div class="row gy-5 g-xl-10">
    <!--begin::Paiement -->
    <div class="card">
        <!--begin::Body-->
        <div class="card-body p-lg-20">
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
                                    <div class="fw-semibold fs-7 text-gray-600 m-3">
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
                                        <div class="fw-bold fs-5 text-gray-800 mb-4">
                                            <span>Facture N° R-00{{$facture->id}}</span>
                                            <br>
                                            <span>Date: {{\date('d/m/Y',
                                                \strtotime($facture->created_at))}}</span>
                                        </div>
                                        <div class="fw-bold fs-6 text-gray-800">{{$expediteur->fullName()}}</div>
                                        <div class="fw-semibold fs-7 text-gray-600">{{$expediteur->adresse}}</div>
                                        <div class="fw-semibold fs-7 text-gray-600">{{$expediteur->phoneNumber(true)}}
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
                                            <tr class="border-bottom fs-6 fw-bold text-muted">
                                                <th class="min-w-200px pb-2">Description</th>
                                                <th class="min-w-70px text-center pb-2">Poids</th>
                                                <th class="min-w-80px text-center pb-2">Transporteur</th>
                                                <th class="min-w-100px text-end pb-2">Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="fw-bold text-gray-700 fs-5 text-start">
                                                <td class="pt-6">
                                                    <span>Transport de {{$expedition->matiereType()}}</span>
                                                </td>
                                                <td class="pt-6">
                                                    <span>{{$expedition->matiereWeight()}}</span>
                                                </td>
                                                <td class="pt-6">
                                                    <span>{{$transporteur->fullName()}}</span>
                                                </td>
                                                <td class="pt-6 fw-semi-bold fs-6 text-gray-800">
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
                                            <div class="fw-semibold pe-10 text-gray-600 fs-5">Montant net à payer:</div>
                                            <!--end::Code-->
                                            <!--begin::Label-->
                                            <div class="text-start fw-bold fs-4 text-gray-800">
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
                        <p class="m-5">Conditions de paiement:</p>
                    </div>
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="m-0">
                    <!--begin::Invoice 2 sidebar-->
                    <div
                        class="d-print-none border border-dashed border-gray-300 card-rounded h-lg-100 min-w-md-350px p-9 bg-lighten">
                        <!--begin::Labels-->
                        <div class="mb-8">
                            <!--begin::Action-->
                            @if($facture->etat == 1)
                            <form action="{{route('payerFacture')}}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="expedition_id" value="{{$facture->expedition_id}}">
                                <input type="hidden" name="facture_id" value="{{$facture->id}}">
                                <button type="submit" class="btn btn-sm btn-success">Payer</button>
                            </form>
                            @else
                            <a href="{{route('facturation')}}">
                                <button class="btn btn-sm btn-info">
                                    <i class="bi bi-backspace"></i>
                                    <span>Retour</span>
                                </button>
                            </a>
                            @endif
                            <button type="button" class="btn btn-sm btn-primary my-1 me-12" onclick="imprimer()">
                                <i class="bi bi-printer-fill"></i>
                                <span>Imprimer ou Télécharger</span>
                            </button>
                            <!--end::Action-->
                        </div>
                        <!--end::Labels-->
                        <!--begin::Title-->
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">PAYMENT DETAILS</h6>
                        <!--end::Title-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Paypal:</div>
                            <div class="fw-bold text-gray-800 fs-6">codelabpay@codelab.co</div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Account:</div>
                            <div class="fw-bold text-gray-800 fs-6">Nl24IBAN34553477847370033
                                <br />AMB NLANBZTC
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-15">
                            <div class="fw-semibold text-gray-600 fs-7">Payment Term:</div>
                            <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center">14 days
                                <span class="fs-7 text-danger d-flex align-items-center">
                                    <span class="bullet bullet-dot bg-danger mx-2"></span>
                                    Due in 7 days
                                </span>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Title-->
                        <h6 class="mb-8 fw-bolder text-gray-600 text-hover-primary">PROJECT OVERVIEW</h6>
                        <!--end::Title-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Project Name</div>
                            <div class="fw-bold fs-6 text-gray-800">
                                <span>SaaS App Quickstarter</span>
                                <a href="#" class="link-primary ps-1">View Project</a>
                            </div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="mb-6">
                            <div class="fw-semibold text-gray-600 fs-7">Completed By:</div>
                            <div class="fw-bold text-gray-800 fs-6">Mr. Dewonte Paul</div>
                        </div>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <div class="m-0">
                            <div class="fw-semibold text-gray-600 fs-7">Time Spent:</div>
                            <div class="fw-bold fs-6 text-gray-800 d-flex align-items-center">
                                <span>230 Hours</span>
                                <span class="fs-7 text-success d-flex align-items-center">
                                    <span class="bullet bullet-dot bg-success mx-2"></span>
                                    35$/h Rate
                                </span>
                            </div>
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Invoice 2 sidebar-->
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
@endsection