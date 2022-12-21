<!--begin::Table container-->
<!--begin::Table-->
<table class="table table-striped align-middle gs-0 gy-4" id="tableVehicule">
    <!--begin::Table head-->
    <thead>
        <tr class="fw-bold text-muted bg-light">
            <th class="ps-4  rounded-start">Véhicules</th>
            <th class="">Type</th>
            <th class="">Immatriculation</th>
            <th class="">Poids à vide</th>
            <th class="">Capacité</th>
            <th class="">Date mise en circulation</th>
            <th class="">Status</th>
            <th class=" text-center rounded-end">Actions</th>
        </tr>
    </thead>
    <!--end::Table head-->
    <!--begin::Table body-->
    <tbody>
        @foreach ($camions as $camion)
        <tr class="">
            <td>
                <div class="d-flex align-items-center">
                    <button class="btn btn-sm btn-light-primary m-1 p-3 cursor-default"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                        <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                    </svg></button>
                    <div class="d-flex justify-content-start flex-column">
                        <span class="text-dark fw-bold mb-1 fs-6">
                            {{$camion->modele}}
                        </span>
                        <span class="text-muted fw-semibold text-muted d-block fs-7"><span>{{ $camion->marque->nom
                                }}</span></span>
                    </div>
                </div>
            </td>
            <td>
                <span class="text-dark fw-bold d-block mb-1 fs-6">{{ $camion->type->nom }}</span>
            </td>
            <td>
                <span class="text-dark fw-bold d-block mb-1 fs-6">{{$camion->immatriculation}}</span>
            </td>
            <td>
                <span class="text-dark fw-bold d-block mb-1 fs-6">{{ $camion->poids_a_vide }} Tonnes</span>
            </td>
            <td>
                <span class="badge badge-light text-dark fs-7 fw-bold">{{ $camion->capacite }} Tonnes</span>
            </td>
            <td class="">
                <span class="fs-7 fw-bold">{{
                    (new \DateTime($camion->date_mis_en_circulation, new \DateTimeZone('UTC')))->format('d/m/Y')
                    }}</span>
            </td>
            <td>
                @if (!$camion->est_approuve)
                <span class="badge badge-pill badge-danger">Non approuvé</span>
                @else
                <span class="badge badge-pill badge-success">Approuvé</span>
                @endif
            </td>
            <td class="text-center">
                {{-- <a data-bs-toggle="modal" href="#kt_modal_edit_camion" onclick="modifier_modal_edit({{ $camion }})"
                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                fill="currentColor" />
                            <path
                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a> --}}
                <form action="{{ route('vehicules.delete') }}" method="POST" id="form_delete_camion{{$camion->id}}"
                    class="d-inline">
                    @csrf
                    <input type="hidden" name="id_camion" value="{{ $camion->id }}">
                    <button type="button"  onclick="delete_camion({{$camion->id}})"
                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                        {{-- Supprimer --}}
                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <!--end::Table body-->
</table>
<!--end::Table-->