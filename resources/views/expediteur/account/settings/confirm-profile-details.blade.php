<div id="kt_modal_confirm_profile_details" class="modal fade"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    {{-- <!--begin::Modal Dialog--> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{-- <!--begin::Modal Content--> --}}
        <div class="modal-content">
            {{-- <!--begin::Modal Header--> --}}
            <div class="modal-header">
                {{-- <!--begin::Modal Title--> --}}
                <h3 class="modal-title">Confirmation</h3>
                {{-- <!--end::Modal Title--> --}}
                {{-- <!--begin::Close--> --}}
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                </div>
                {{-- <!--end::Close--> --}}
            </div>
            {{-- <!--end::Modal Header--> --}}
            {{-- <!--begin::Modal Body--> --}}
            <div class="modal-body">
                <p class="fw-semibold fs-6 mb-8">Veuillez saisir votre mot de passe pour confirmer les modifications.</p>
                {{-- <!--begin::Input group--> --}}
                <div class="fv-row mb-0" data-kt-password-meter="true">
                    {{-- <!--begin::Input wrapper--> --}}
                    <div class="position-relative mb-3 form-floating">
                        {{-- <!--begin::Input--> --}}
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control form-control-solid" placeholder="Mot de passe" title="" autocomplete="off" required>
                        {{-- <!--end::Input--> --}}
                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                            <i class="bi bi-eye-slash fs-2"></i>
                            <i class="bi bi-eye fs-2 d-none"></i>
                        </span>
                        {{-- <!--end::Input wrapper--> --}}
                        {{-- <!--begin::Label--> --}}
                        <label id="lbl_password_confirmation" for="password_confirmation" class="form-label fs-6 fw-semibold text-muted">Mot de passe</label>
                        {{-- <!--end::Label--> --}}
                    </div>
                </div>
                {{-- <!--end::Input group--> --}}
            </div>
            {{-- <!--end::Modal Body--> --}}
            {{-- <!--begin::Modal Footer--> --}}
            <div class="modal-footer">
                <button type="button" id="btn_cancel" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                <button type="button" id="btn_confirm" class="btn btn-primary">Confirmer</button>
            </div>
            {{-- <!--end::Modal Footer--> --}}
        </div>
        {{-- <!--end::Modal Content--> --}}
    </div>
    {{-- <!--end::Modal Dialog--> --}}
</div>
