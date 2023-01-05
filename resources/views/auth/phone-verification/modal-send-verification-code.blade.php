<div id="kt_modal_send_verification_code" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    {{-- <!--begin::Modal Dialog--> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{-- <!--begin::Modal Content--> --}}
        <div class="modal-content">
            {{-- <!--begin::Modal Header--> --}}
            <div class="modal-header">
                {{-- <!--begin::Modal Title--> --}}
                <h3 class="modal-title">Vérification du numéro de téléphone</h3>
                {{-- <!--end::Modal Title--> --}}
            </div>
            {{-- <!--end::Modal Header--> --}}
            {{-- <!--begin::Modal Body--> --}}
            <div class="modal-body">
                <p class="text-dark fs-6 mb-6 ms-1">Cliquez sur le <strong>bouton envoyer</strong> pour recevoir un code de vérification du numéro de téléphone renseigné.</p>
                {{-- <!--begin::Recaptcha--> --}}
                <div class="d-flex">
                    <div id="recaptcha-container"></div>
                </div>
                {{-- <!--end::Recaptcha--> --}}
            </div>
            {{-- <!--end::Modal Body--> --}}
            {{-- <!--begin::Modal Footer--> --}}
            <div class="modal-footer">
                {{-- <!--begin::Submit--> --}}
                <div class="d-flex flex-center">
                    <button type="button" id="kt_send_verification_code_submit" class="btn btn-lg btn-primary fw-bold">
                        <span class="indicator-label">Envoyer</span>
                        <span class="indicator-progress">
                            <span>Patientez ...</span>
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                {{-- <!--end::Submit--> --}}
            </div>
            {{-- <!--end::Modal Footer--> --}}
        </div>
        {{-- <!--end::Modal Content--> --}}
    </div>
    {{-- <!--end::Modal Dialog--> --}}
</div>
