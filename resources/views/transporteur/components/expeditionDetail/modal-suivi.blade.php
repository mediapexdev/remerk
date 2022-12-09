@php
    use App\Models\EtatExpedition;
@endphp
<div class="modal fade" id="kt_modal_suivi" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" role="dialog" aria-hidden="true">
    <!--begin::Modal Dialog-->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <!--begin::Modal Content-->
        <div class="modal-content">
            <!--begin::Modal Header-->
            <div class="modal-header">
                <!--begin::Modal Title-->
                <h3 class="modal-title">Code de confirmation</h3>
                <!--end::Modal Title-->
            </div>
            <!--end::Modal Header-->
            <!--begin::Modal Body-->
            <div class="modal-body" >
                        <div class="d-flex">
                            <input class="form-control form-control-solid adresse form-input mb-2" name="code_expedition" type="text" id="id_code_suivi">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <!--begin::Submit-->
                            <div class="d-flex flex-center">
                                <button type="button" onclick="finaliser_suivi({{ $expedition->id }},this)"class="btn btn-lg btn-primary fw-bold">
                                    <span class="indicator-label">Envoyer</span>
                                    <span class="indicator-progress">Patientez...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <!--end::Submit-->
                        </div>
                <p class="fw-semibold text-dark fs-6 mb-6 ms-1">Remplissez le code de confirmation transmis par le client<strong> bouton envoyer </strong> pour
                    </p>
            </div>
            <!--end::Modal Body-->
            <!--begin::Modal Footer-->
            
            <!--end::Modal Footer-->
        </div>
        <!--end::Modal Content-->
    </div>
    <!--end::Modal Dialog-->
</div>
