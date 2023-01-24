@php
    use App\Models\ExpeditionsTracking;

    $suivi = ExpeditionsTracking::where('expedition_id', $expedition->id)->orderBy('created_at')->get();
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
            <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0">
                <!--begin::Table head-->
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="min-w-100px">Date</th>
                        <th class="min-w-70px">Statut</th>
                        <th class="min-w-175px">Commentaire</th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-semibold text-gray-600">
                        <tr>
                            <!--begin::Date-->
                            <td>{{ (new \DateTime($expedition->created_at, new \DateTimeZone('UTC')))->format('d-m-Y') }}
                            </td>
                            <!--end::Date-->
                            <!--begin::Status-->
                            <td>
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">En attente</div>
                                <!--end::Badges-->
                            </td>
                            <!--end::Status-->
                            <!--begin::Comment-->
                            <td>En attente de postulant</td>
                            <!--end::Comment-->
                        </tr>
                    @foreach ($suivi as $etat)
                        <tr>
                            <!--begin::Date-->
                            <td>{{ (new \DateTime($etat->created_at, new \DateTimeZone('UTC')))->format('d m Y H:i') }}
                            </td>
                            <!--end::Date-->
                            <!--begin::Status-->
                            <td>
                                <!--begin::Badges-->
                                <div class="badge badge-light-primary">{{$etat->etat->nom}}</div>
                                <!--end::Badges-->
                            </td>
                            <!--end::Status-->
                            <!--begin::Comment-->
                            <td>{{$etat->etat->comment}}</td>
                            <!--end::Comment-->
                        </tr>
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
