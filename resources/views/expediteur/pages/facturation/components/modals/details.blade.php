<div class="modal-dialog modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">
                <span>Devis N0: 00{{$devis->id}}</span>
                <div class="fs-6 fw-bold text-gray-700 text-nowrap">Date: {{date('d/m/Y', strtotime($expedition->created_at))}}</div>
            </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            <!--begin::Table-->
            <table class="table align-middle table-responsive">
                <!--begin::Table head-->
                <thead class="fs-7 fw-bold">
                    <!--begin::Table row-->
                    <tr class="text-start text-muted text-uppercase gs-0">
                        <th>Marchandises</th>
                        <th>Véhicule(s)</th>
                        <th class="min-w-100px">Montant</th>
                    </tr>
                    <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="">
                    <tr class="">
                        <td class="">
                            <div class="d-flex align-items-center">
                                <div class="d-flex justify-content-start flex-column">
                                    <p class="text-dark fw-bold  mb-1 fs-6">
                                        {{$type_matiere}} <br>
                                        <span class="text-gray-700">{{$poids_matiere}}</span>
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="text-center">
                                    <p class="text-dark fw-bold  mb-1 fs-6">
                                        {{$nbre_camion}}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex">
                                <p class="text-dark fw-bold  d-block mb-1 fs-6">
                                    {{$montant_devis}} <span class="text-gray-700"> /Fr Cfa</span>
                                </p>
                            </div>
                        </td>
                    </tr>
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            <form method="POST" action="{{route('facture.store')}}">
                @csrf
                {{-- <input type="hidden" name="postulant_id" id="{{$postulant->transporteur->id}}"> --}}
                <input type="hidden" name="expedition_id" value="{{$expedition->id}}">
                <input type="hidden" name="montant" value="{{$devis->montant_propose}}">
                <button type="submit" class="btn btn-primary">Effectuer le paiment</button>
            </form>
        </div>
    </div>
</div>