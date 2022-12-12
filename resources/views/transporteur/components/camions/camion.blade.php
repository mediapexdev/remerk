@php
    use App\Models\Camion;
    use App\Models\Transporteur;
    
    $user_id = Auth::user()->id;
    $transporteur = Transporteur::where('user_id', $user_id)->first();
    $camions = Camion::where('transporteur_id', $transporteur->id)->get();
@endphp
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Mes véhicules</span>
            <span class="text-muted mt-1 fw-semibold fs-7">{{ $camions->count() }} Véhicules enregistrés</span>
        </h3>
        <!--begin::Menu-->
        <div class="card-toolbar nav-item">
            <div data-bs-toggle="modal" href="#kt_modal_create_camion" class="btn btn-sm btn-light-primary">Ajouter un
                Véhicule</div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="border-0">
                        <th class="p-0 min-w-150px"></th>
                        <th class="p-0 min-w-80px"></th>
                        <th class="p-0 min-w-100px"></th>
                        <th class="p-0 min-w-100px"></th>
                        <th class="p-0 min-w-100px"></th>
                        <th class="p-0 min-w-80px text-end"></th>
                    </tr>
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody>
                    @foreach ($camions as $camion)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-45px me-5">
                                        <img alt="Pic" src="assets/media/avatars/300-6.jpg" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Name-->
                                    <div class="d-flex justify-content-start flex-column">
                                        <a href="#"
                                            class="text-dark fw-bold text-hover-primary mb-1 fs-6">{{ $camion->type->nom }}</a>
                                        <a href="#"
                                            class="text-muted text-hover-primary fw-semibold text-muted d-block fs-7">
                                            <span class="text-dark">Marque</span>: {{ $camion->marque->nom }}</a>
                                    </div>
                                    <!--end::Name-->
                                </div>
                            </td>
                            <td class="text-end">
                                <a href="#"
                                    class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $camion->immatriculation }}</a>
                            </td>
                            <td class="text-end">
                                <a href="#"
                                    class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $camion->poids_a_vide }}
                                    / {{ $camion->capacite }}</a>
                            </td>
                            <td class="text-end">
                                @if (false == $camion->est_approuve)
                                    <span class="badge badge-pill badge-danger">Non approuvé</span>
                                @else
                                    <span class="badge badge-pill badge-success">Approuvé</span>
                                @endif
                            </td>
                            <td class="text-end">
                                <a href="#"
                                    class="text-dark fw-bold text-hover-primary d-block mb-1 fs-6">{{ $camion->date_mis_en_circulation }}</a>
                            </td>

                            <td class="text-end row row-sm">
                                <div class="col-6">
                                <a data-bs-toggle="modal" href="#kt_modal_edit_camion"
                                    onclick="modifier_modal_edit({{ $camion }})"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                </div>
                                <div class="col-6">
                                <form action="{{ route('vehicules.delete') }}" method="POST" id="form_delete_camion">
                                    @csrf
                                    <input type="hidden" name="id_camion" value="{{ $camion->id }}">
                                    <button type="button" onclick="deleteCamion(this)"
                                        class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
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
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<script src={{URL::asset("assets/js/custom/utilities/modals/edit-camion.js")}}></script>

<script>
    function deleteCamion(button) {
        button.addEventListener('click', e => {
            e.preventDefault();
            Swal.fire({
                html: `Voulez-vous vraiment supprimer ce camion`,
                icon: "info",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(e){
                if(e.isConfirmed) {           
                    $('#form_delete_camion').submit();
                    console.log('ok');
                }          
        });
        });
    }

    function modifier_modal_edit(camion) {
        document.querySelector('#camion_id').value = camion.id;
    }
</script>
