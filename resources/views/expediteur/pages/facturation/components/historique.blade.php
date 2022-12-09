@php
    $url = Route::getCurrentRoute()->uri();
    $link = 'href=/facturation';
    $class = "btn btn-sm btn-light-primary";
    if ($url == 'dashboard')
    {
        $link = $link;
        $class = $class;
    }else {
        $link = '';
        $class='d-none';
    }

    use App\Models\Devis;
    use App\Models\Transporteur;
    use App\Models\Expedition;
    use App\Models\Expediteur;
    
    $expediteur_id = Expediteur::where('user_id', Auth::user()->id)->first()->id;
    $expeditions = Expedition::where('expediteur_id', $expediteur_id)->get();

    $nbr_devis = 0;
    foreach($expeditions as $expedition) {
        $nbr_devis += Devis::where('expedition_id', $expedition->id)->count();
    }

    // echo "<script>alert( \" $nbr_devis\")</script>";
@endphp

<!--begin::Tables widget 6-->
<div class="card card-flush h-xl-100">
    <!--begin::Header-->
    <div class="card-header">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800">Historique des transactions</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">Total {{$nbr_devis}} </span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">            
            <a {{$link}} class='{{$class}}'>Mes factures </a>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Tab Content-->
        <div class="tab-content">
            <!--begin::Tap pane-->
            <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1">
                <!--begin::Table container-->
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table table-row-dashed table-hover align-middle gs-0 gy-4 my-0">
                        <!--begin::Table head-->
                        <thead>
                            <tr class="fs-5 fw-bold text-gray-500 border-bottom-0">
                                <th class="min-w-15px">N°</th>
                                <th class="w-150px w-xxl-350px">Transporteur</th>
                                <th class="min-w-100px">Type</th>
                                <th class="w-250px w-xxl-450px">Itineraire</th>
                                <th class="min-w-145px">Montant</th>
                                <th class="min-w-145px">Date</th>
                            </tr>
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody class="cursor-pointer">
                            <tr class="">
                                <td class="">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-dark fw-bold  mb-1 fs-6">1</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-dark fw-bold  mb-1 fs-6">Modou Ndiaye</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-gray-800 fw-bold d-block mb-1 fs-6 badge badge-light-primary">Devis
                                    </p>
                                </td>
                                <td>
                                    <p class="text-dark fw-bold  d-block mb-1 fs-6">Colobane, Dakar - Bargny, Dakar</p>
                                </td>
                                <td class="">
                                    <div class="d-flex">
                                        <p class="text-dark fw-bold  d-block mb-1 fs-6">150 000 </p><span
                                            class="fw-semibold text-gray-400"> /Fr Cfa</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-dark fw-bold  d-block mb-1 fs-6">15/05/2022</p>
                                </td>
                            </tr>

                            <tr class="">
                                <td class="ms-2">
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-dark fw-bold  mb-1 fs-6">2</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-dark fw-bold  mb-1 fs-6">Saliou Diallo</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span
                                        class="text-gray-800 fw-bold d-block mb-1 fs-6 badge badge-light-secondary">Facture</span>
                                </td>
                                <td>
                                    <p class="text-dark fw-bold  d-block mb-1 fs-6">Medina, Dakar - Sabodala, Kolda</p>
                                </td>
                                <td class="">
                                    <div class="d-flex">
                                        <p class="text-dark fw-bold  d-block mb-1 fs-6">350 000 </p><span
                                            class="fw-semibold text-gray-400"> /Fr Cfa</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-dark fw-bold  d-block mb-1 fs-6">12/10/2022</p>
                                </td>
                            </tr>
                        </tbody>
                        <!--end::Table body-->
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Tap pane-->
        </div>
        <!--end::Tab Content-->
    </div>
    <!--end: Card Body-->
</div>
<!--end::Tables widget 6-->