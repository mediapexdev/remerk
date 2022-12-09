@php
    use App\Models\Devis;
    use App\Models\Transporteur;
    use App\Models\Expedition;
    use App\Models\Expediteur;
    use App\Models\Facture;
    
    $expediteur_id = Expediteur::where('user_id', Auth::user()->id)->first()->id;
    $facture_id = Facture::where('user_id', Auth::user()->id);
    $expeditions = Expedition::where('expediteur_id', $expediteur_id)->get();

    $nbr_devis = 0;
    foreach($expeditions as $expedition)
    {
        $nbr_devis += Devis::where('expedition_id', $expedition->id)->count();
    }

    $nbr_facture = 0;
    foreach($expeditions as $expedition)
    {
        $nbr_facture += Facture::where('expedition_id', $expedition->id)->count();
    }
    "<script>alert( \" \")</script>";
@endphp

<div class="card">
    <div class="card-body">
        <ul class="nav nav-custom nav-tabs fw-semibold flex-column">
            <!--begin:::Transactions-->
            <li class="nav-item">
                <a class="btn btn-outline btn-outline-dashed btn-active-light-primary p-6 mb-5 nav-link text-active-primary pb-4 active position-relative" data-bs-toggle="tab"
                    href="#kt_tab_historique">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <img src="assets/icons/transaction-80.png" style="height: 35px; widht:35px;">
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <h3 class="  flex-wrap">
                                Transactions
                                {{-- <span class="position-absolute top-0 end-0 translate-middle  badge badge-square badge-primary">{{$nbr_devis + $nbr_facture}}</span> --}}
                            </h3>
                            <div class="fw-semibold opacity-50">
        
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <!--end:::Transactions-->
            <!--begin:::Devis-->
            <li class="nav-item">
                <a class="btn btn-outline btn-outline-dashed btn-active-light-primary p-6 mb-5 nav-link text-active-primary pb-4 position-relative" data-bs-toggle="tab"
                    href="#kt_tab_devis">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <img src="assets/icons/devis1-80.png" style="height: 35px; widht:35px;">
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <h3 class="  text-start ">
                                Devis
                                <span class="position-absolute top-0 end-0 translate-middle  badge badge-square badge-primary">{{$nbr_devis}}</span>
                            </h3>
                            <div class="fw-semibold opacity-50">
        
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <!--end:::Devis-->
            <!--begin:::Facture-->
            <li class="nav-item">
                <a class="btn btn-outline btn-outline-dashed btn-active-light-primary p-6 mb-5 nav-link text-active-primary pb-4 position-relative" data-bs-toggle="tab"
                    href="#kt_tab_facture">
                    <div class="row">
                        <div class="col-4 d-flex align-items-center">
                            <img src="assets/icons/facture0-80.png" style="height: 35px; widht:35px;">
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <h3 class="  flex-wrap">
                                Factures
                                <span class="position-absolute top-0 end-0 translate-middle  badge badge-square badge-primary">{{$nbr_facture}}</span>
                            </h3>
                            <div class="fw-semibold opacity-50">
        
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <!--end:::Facture-->
        </ul>
    </div>
</div>