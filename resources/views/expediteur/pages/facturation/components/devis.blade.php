@php
    use App\Models\Devis;
    use App\Models\Transporteur;
    use App\Models\Expedition;
    use App\Models\Expediteur;
    
    $expediteur_id = Expediteur::where('user_id', Auth::user()->id)->first()->id;
    $transporteur_id = Transporteur::where('user_id', Auth::user()->id);
    $expeditions = Expedition::where('expediteur_id', $expediteur_id)->get();
    
    $expeditions_devis = [];
    foreach ($expeditions as $expedition) {
        if ($expedition->transporteur_id) {
            $expeditions_devis[]=$expedition;
        }
    }
    $url = Route::getCurrentRoute()->uri();
    $link = 'href=/facturation';
    $class = 'class=tab-pane class=fade id=kt_tab_devis role=tabpanel';
    if ($url == 'dashboard') {
        $class = 'class=d-block';
    } else {
        $class = $class;
    }
@endphp
<div {{ $class }}>
    <!--begin::Card-->
    <div class="card card-flush h-xl-100">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Mes devis</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed gy-5">
                <!--begin::Table body-->
                <tbody>
                    @if (empty($expeditions_devis))
                            <td>
                                <div class="d-flex justify-content-center">
                                    <div class="d-block">
                                        <p>
                                            Vous n'avez pas encore reçu de devis ? <a href="#">Contactez-nous</a>
                                        </p>
                                        <img src={{ asset('assets/images/18770.png') }} alt=""
                                            height="250px" class="">
                                        <div class="text-center">
                                            <button class="btn btn-sm btn-light-primary">Faire une expedition</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    @else
                    <!--begin::Table head-->
                    <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                        <!--begin::Table row-->
                        <tr class="text-start text-muted text-uppercase gs-0">
                            <th class="">No.</th>
                            <th>Transporteur</th>
                            <th>Itineraire</th>
                            {{-- <th class="min-w-100px">Montant</th> --}}
                            <th class="min-w-100px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                    </thead>
                    <!--end::Table head-->
                    @foreach ($expeditions_devis as $expedition)
                    {{-- <tr>
                        <td class="">
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <p class="text-dark fw-bold  mb-1 fs-6">{{ $expedition->devis()->id }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <p class="text-dark fw-bold  mb-1 fs-6">
                                        {{ $expedition->transporteur->prenom() . ' ' . $expedition->transporteur->nom()
                                        }}
                                    </p>
                                </div>
                            </div>

                        </td>
                        <td>
                            <p class="text-dark fw-bold  d-block mb-1 fs-6">
                                {{ $expedition->adresseDepartComplet() }} -
                                {{ $expedition->adresseArriveeComplet() }}
                            </p>
                        </td>
                        <td class="">
                            <button type="url" href="{{ route('devis.detail', $expedition->id) }}"
                                class="btn btn-primary btn-block btn_voir" id="button_{{ $expedition->id }}"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Voir">
                                <i class="bi bi-eye-fill fs-4"></i>
                            </button>
                        </td>
                    </tr> --}}
                    @endforeach
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

<div class="modal fade modal_show" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div id="detail" class="modal-content">

        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(() => {
        $('.btn_voir').click(e => {
            let that = e.currentTarget;
            e.preventDefault();
            $.ajax({
                    method: $(that).attr('method'),
                    url: $(that).attr('href'),
                    data: $(that).serialize()
                })
                .done((data) => {
                    $('#detail').html(data);
                    $('.modal_show').modal('show');
                })
                .fail((data) => {
                    console.log(data);
                });
        });
    });
</script>