<div class="modal fade" id="modal_voir_postulat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    role="dialog" aria-hidden="true">
    <!--begin::Modal Dialog-->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--begin::Modal Content-->
        <div class="modal-content">
            <!--begin::Modal Header-->
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    <span>Détails Postulat</span>
                    <div class="fs-6 fw-bold text-gray-700 text-nowrap" id="date_modification_postulat">Dernière
                        modification: </div>
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!--end::Modal Header-->
            <!--begin::Modal Body-->
            <div class="modal-body">
                <div class="d-flex text-start text-muted text-uppercase gs-0"> Montant
                </div>
                <div class="text-dark fw-bold  mb-1 fs-6" id="montant_postulat">
                    <span class="text-gray-700"></span>
                </div>
                <form action="{{route('postulant.update')}}" method="POST" id="form_update_postulant">
                    @csrf
                    <div class="d-flex position-relative mt-10">
                        <input name="montant_postulat_update"
                            class="form-control form-control-solid adresse form-input mb-2"
                            placeholder="Veuillez donner une nouvelle proposition" type="number"
                            id="montant_form_edit">
                    </div>
                    <input type="hidden" name="postulant_id" id="postulant_id" value="">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <!--begin::Submit-->
                        <div class="d-flex flex-center">
                            <button type="button" onclick="editPostulat()"class="btn btn-lg btn-primary fw-bold" id="btn_edit_postulat">
                                <span class="indicator-label">Modifier</span>
                                <span class="indicator-progress">Patientez...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <button type="button" onclick="update_postulat()"class="btn btn-lg btn-primary fw-bold" id="btn_update_postulat">
                                <span class="indicator-label">Changer</span>
                                <span class="indicator-progress">Patientez...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                        </div>
                        <!--end::Submit-->
                    </div>
                </form>
                <p class="fw-semibold text-dark fs-6 mb-6 ms-1">Remplissez le montant que vous proposez avant d'appuyer
                    sur le <strong> bouton envoyer </strong> pour
                </p>
                <!--end::Recaptcha-->
            </div>
            <!--end::Modal Body-->
            <!--begin::Modal Footer-->

            <!--end::Modal Footer-->
        </div>
        <!--end::Modal Content-->
    </div>
    <!--end::Modal Dialog-->
</div>
