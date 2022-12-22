@php
    use App\Models\EtatExpedition;
    use App\Models\ExpeditionsTracking;

    $expedition_tracking = ExpeditionsTracking::where('expedition_id', $expedition->id)->first();
    $infos = [
        EtatExpedition::EN_ATTENTE_DE_PAIEMENT      => 'date_select_postulant',
        EtatExpedition::EN_ATTENTE_DE_CHARGEMENT    => 'date_paiement',
        EtatExpedition::CHARGE                      => 'date_chargement',
        EtatExpedition::EN_TRANSIT                  => 'date_depart',
        EtatExpedition::EN_ATTENTE_DE_DECHARGEMENT  => 'date_arrivee',
        EtatExpedition::DECHARGE                    => 'date_dechargement',
        EtatExpedition::TERMINEE                    => 'date_livraison'
    ];
@endphp
<div class="card card-flush py-4 flex-row-fluid">
    <!--begin::Card header-->
    <div class="card-header">
        <div class="card-title">
            <h3>Historique de l'expédition</h3>
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle fs-6 gy-5 mb-0">
                <!--begin::Table head-->
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">Date</th>
                        <th class="min-w-70px">Statut</th>
                        <th class="min-w-175px">Commentaire</th>
                    </tr>
                    {{-- <!--begin::Separator--> --}}
                    <tr>
                        <td class="text-gray-700 py-0" scope="row" colspan="3">
                            <div class="separator my-0"></div>
                        </td>
                    </tr>
                    {{-- <!--end::Separator--> --}}
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                    <tr>
                        <!--begin::Date-->
                        <td>{{ (new \DateTime($expedition->created_at, new \DateTimeZone('UTC')))->format('d/m/Y') }}</td>
                        <!--end::Date-->
                        <!--begin::Status-->
                        <td>
                            <!--begin::Badges-->
                            <span class="badge badge-light-primary">En attente</span>
                            <!--end::Badges-->
                        </td>
                        <!--end::Status-->
                        <!--begin::Comment-->
                        <td>En attente de postulant</td>
                        <!--end::Comment-->
                    </tr>
                    @foreach ($infos as $id => $date)
                        @php
                            $etat = EtatExpedition::find($id);
                        @endphp
                        @if($expedition_tracking->$date)
                            {{-- <!--begin::Separator--> --}}
                            <tr>
                                <td class="text-gray-700 py-0" scope="row" colspan="3">
                                    <div class="separator my-0"></div>
                                </td>
                            </tr>
                            {{-- <!--end::Separator--> --}}
                            <tr>
                                <!--begin::Date-->
                                {{-- <td>{{ (new \DateTime($expedition_tracking->$date, new \DateTimeZone('UTC')))->format('d/m/Y H:i') }}</td> --}}
                                <td>{{ (new \DateTime($expedition_tracking->$date, new \DateTimeZone('UTC')))->format('d/m/Y') }}</td>
                                <!--end::Date-->
                                <!--begin::Status-->
                                <td>
                                    <!--begin::Badges-->
                                    <span class="badge badge-light-primary">{{$etat->nom}}</span>
                                    <!--end::Badges-->
                                </td>
                                <!--end::Status-->
                                <!--begin::Comment-->
                                <td>{{$etat->comment}}</td>
                                <!--end::Comment-->
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table Wrapper-->
    </div>
    <!--end::Card body-->
</div>
