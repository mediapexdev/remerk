<div id="kt_modal_postulat" class="modal fade" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    {{-- <!--begin::Modal Dialog--> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{-- <!--begin::Modal Content--> --}}
        <div class="modal-content">
            {{-- <!--begin::Modal Header--> --}}
            <div class="modal-header">
                {{-- <!--begin::Modal Title--> --}}
                <h3 class="modal-title">Proposez un montant</h3>
                {{-- <!--end::Modal Title--> --}}
            </div>
            {{-- <!--end::Modal Header--> --}}
            {{-- <!--begin::Modal Body--> --}}
            <div class="modal-body">
                <p class="fw-semibold fs-6 mb-8">Veuillez saisir le montant que vous proposez.</p>
                {{-- <!--begin::Input group--> --}}
                <div class="fv-row mb-0">
                    {{-- <!--begin::Input--> --}}
                    <input type="number" id="ipt_montant_postulat" class="form-control form-control-solid" placeholder="Montant" min="0">
                    <input type="hidden" id="ipt_btn_form_postulat_id">
                    {{-- <!--end::Input--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
            </div>
            {{-- <!--end::Modal Body--> --}}
            {{-- <!--begin::Modal Footer--> --}}
            <div class="modal-footer">
                <button type="button" id="btn_cancel_modal_postulat" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="btn_submit_modal_postulat" class="btn btn-primary">Soumettre</button>
            </div>
            {{-- <!--end::Modal Footer--> --}}
        </div>
        {{-- <!--end::Modal Content--> --}}
    </div>
    {{-- <!--end::Modal Dialog--> --}}
</div>
