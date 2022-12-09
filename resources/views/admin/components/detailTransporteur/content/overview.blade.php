@php
    use App\Models\Expedition;
    use App\Models\Camion;
    use App\Core\Util;
    
    $expeditions = Expedition::where('transporteur_id', $transporteur->id)->get();
    $camions = Camion::where('transporteur_id', $transporteur->id)->get();
    
@endphp
<!--begin:::Tab pane-->
<div class="tab-pane fade show active" id="kt_ecommerce_customer_overview" role="tabpanel">
    <div class="row row-cols-1 row-cols-md-2 mb-6 mb-xl-9">
        <div class="col">
            <!--begin::Card-->
            <div class="card pt-4 h-md-100 mb-6 mb-md-0">
                <!--begin::Card header-->
                <div class="card-header border-0">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="fw-bold">Cote du transporteur</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <div class="fw-bold fs-2">
                        <div class="d-flex">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                            <span class="svg-icon svg-icon-info svg-icon-2x">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M18.3721 4.65439C17.6415 4.23815 16.8052 4 15.9142 4C14.3444 4 12.9339 4.73924 12.003 5.89633C11.0657 4.73913 9.66 4 8.08626 4C7.19611 4 6.35789 4.23746 5.62804 4.65439C4.06148 5.54462 3 7.26056 3 9.24232C3 9.81001 3.08941 10.3491 3.25153 10.8593C4.12155 14.9013 9.69287 20 12.0034 20C14.2502 20 19.875 14.9013 20.7488 10.8593C20.9109 10.3491 21 9.81001 21 9.24232C21.0007 7.26056 19.9383 5.54462 18.3721 4.65439Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <div class="ms-2">
                                {{ $transporteur->note }}
                                <span class="text-muted fs-4 fw-semibold">Points</span>
                            </div>
                        </div>
                        <div class="fs-7 fw-normal text-muted">
                            A la fin de chaque expédition, vous serez noté.
                        </div>
                    </div>
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <div class="col">
            <!--begin::Reward Tier-->
            <a href="#" class="card bg-info hoverable h-md-100">
                <!--begin::Body-->
                <div class="card-body">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen020.svg-->
                    <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M14 18V16H10V18L9 20H15L14 18Z" fill="currentColor" />
                            <path opacity="0.3"
                                d="M20 4H17V3C17 2.4 16.6 2 16 2H8C7.4 2 7 2.4 7 3V4H4C3.4 4 3 4.4 3 5V9C3 11.2 4.8 13 7 13C8.2 14.2 8.8 14.8 10 16H14C15.2 14.8 15.8 14.2 17 13C19.2 13 21 11.2 21 9V5C21 4.4 20.6 4 20 4ZM5 9V6H7V11C5.9 11 5 10.1 5 9ZM19 9C19 10.1 18.1 11 17 11V6H19V9ZM17 21V22H7V21C7 20.4 7.4 20 8 20H16C16.6 20 17 20.4 17 21ZM10 9C9.4 9 9 8.6 9 8V5C9 4.4 9.4 4 10 4C10.6 4 11 4.4 11 5V8C11 8.6 10.6 9 10 9ZM10 13C9.4 13 9 12.6 9 12V11C9 10.4 9.4 10 10 10C10.6 10 11 10.4 11 11V12C11 12.6 10.6 13 10 13Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <div class="text-white fw-bold fs-2 mt-5">
                        Premium Member
                    </div>
                    <div class="fw-semibold text-white">
                        Tier Milestone Reached
                    </div>
                </div>
                <!--end::Body-->
            </a>
            <!--end::Reward Tier-->
        </div>
    </div>
    <div class="card pt-4 mb-6 mb-xl-9">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <!--begin::Card title-->
            <div class="card-title flex-column">
                <h2>Historique des expéditions </h2>
                <br>
                <h4 class="card-subtitle">{{ $expeditions->count() }} expédition(s)</h4>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 pb-5">
            @if ($expeditions->count() <= 0)
                <tbody class="fs-6 fw-semibold text-gray-600">
                    <tr><td>Aucune expédition</td></tr>
                </tbody>
                @else
            
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed gy-5" id="table_liste_expeditions">
                <!--begin::Table head-->
                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                    <!--begin::Table row-->
                    <tr class="text-start text-muted text-uppercase gs-0">
                        <th class="min-w-100px">ID</th>
                        <th>Statut</th>
                        <th class="min-w-100px">Départ</th>
                        <th class="min-w-100px">Arrivée</th>
                        <th>Action</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                
                <tbody class="fs-6 fw-semibold text-gray-600">
                        @foreach ($expeditions as $expedition)
                            <tr>
                                <td>{{$expedition->string_id}}</td>
                            </tr>
                            <!--begin::Table row-->
                            <tr>
                                {{-- <!--begin::Expéditeur--> --}}
                                <td data-order="{{ $expedition->depart->date_depart }}">
                                    <div class="d-flex align-items-center justify-content-start">
                                        {{-- <!--begin:: Avatar--> --}}
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="../../demo1/dist/apps/user-management/users/view.html">
                                                {{ $expedition->depart->date_depart }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                {{-- <!--end::Expéditeur--> --}}
                                <!--begin::Status=-->
                                <td>
                                    <span class="badge badge-light-success">{{ $expedition->etat->nom }}</span>
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>{{ $expedition->depart->adresseComplet() }}
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Date=-->
                                <td>{{ $expedition->arrivee->adresseComplet() }}
                                </td>
                                <!--end::Date=-->
                                <td>
                                    <a href="{{route('expedition.infos',$expedition->id)}}">
                                    <button class="btn btn-sm btn-light-success">Voir</button></a>
                                </td>
                            </tr>
                            <!--end::Table row-->
                        @endforeach
                    

                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
            @endif

        </div>
        <!--end::Card body-->

    </div>
    <!--begin::Card-->
    <div class="card pt-4 mb-6 mb-xl-9">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <!--begin::Card title-->
            <div class="card-title flex-column">
                <h2>Véhicules </h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 pb-5">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed gy-5" id="table_liste_vehicules">
                <!--begin::Table head-->
                <thead class="border-bottom border-gray-200 fs-7 fw-bold">
                    <!--begin::Table row-->
                    <tr class="text-start text-muted text-uppercase gs-0">
                        <th>Marque</th>
                        <th>Type</th>
                        <th>Matricule</th>
                        <th>Capacité</th>
                        <th class="min-w-100px">Début circulation</th>
                        <th class="text-end min-w-80px">Action</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fs-6 fw-semibold text-gray-600">
                    @if ($camions->count() <= 0)
                        <td>Aucune expédition</td>
                    @else
                        @foreach ($camions as $camion)
                            @php
                                $color_class = Util::colorClassNames()[\mt_rand(0, 4)];
                            @endphp
                            <!--begin::Table row-->
                            <tr>
                                {{-- <!--begin::Expéditeur--> --}}
                                <td data-order="{{ $camion->marque->nom }}">
                                    <a href="../../demo1/dist/apps/user-management/users/view.html">
                                        {{ $camion->marque->nom }}
                                    </a>
                                </td>
                                {{-- <!--end::Expéditeur--> --}}
                                <!--begin::Status=-->
                                <td>
                                    {{ $camion->type->nom }}
                                </td>
                                <!--end::Status=-->
                                <!--begin::Amount=-->
                                <td>{{ $camion->immatriculation }}
                                    @if (false == $camion->est_approuve)
                                        <span class="badge badge-pill badge-danger">Non approuvé</span>
                                    @else
                                        <span class="badge badge-pill badge-success">Approuvé</span>
                                    @endif
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Amount=-->
                                <td data-order="{{ $camion->capacite }}">{{ $camion->capacite }}
                                </td>
                                <!--end::Amount=-->
                                <!--begin::Date=-->
                                <td data-order="{{ $camion->date_mis_en_circulation }}">{{ $camion->date_mis_en_circulation }}
                                </td>
                                <!--end::Date=-->
                                <!--begin::Action=-->
                                <td class="text-end">
                                    <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href={{route('admin.transporteur.approuver-camion',$camion->id)}} class="menu-link px-3">Voir</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <form action="{{route('admin.transporteur.approuver-camion',$camion->id)}}" method="POST" id="form_approuver_camion{{$camion->id}}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$camion->id}}">
                                            <a class="menu-link px-3" onclick="approuver_camion({{$camion->id}})">Approuver</a>
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </td>
                                <!--end::Action=-->
                            </tr>
                            <!--end::Table row-->
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
<!--end:::Tab pane-->
