<div class="" data-kt-stepper-element="content">
    {{-- <!--begin::Wrapper--> --}}
    <div class="w-100">
        {{-- <!--begin::Heading--> --}}
        <div class="pb-10 pb-lg-12">
            {{-- <!--begin::Title--> --}}
            <h2 class="fw-bold text-dark">Informations professionnelles</h2>
            {{-- <!--end::Title--> --}}
            {{-- <!--begin::Notice--> --}}
            <div class="text-muted fw-semibold fs-6">
                <span>Si vous avez besoin de plus d'informations cliquez sur ce</span>
                <a href="#" class="link-primary fw-bold">lien</a>.
            </div>
            {{-- <!--end::Notice--> --}}
        </div>
        {{-- <!--end::Heading--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-8 fv-plugins-icon-container">
            {{-- <!--begin::Label--> --}}
            <label class="form-label mb-1 required">Votre numéro de Téléphone</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="tel" name="phone" id="ipt_phone"
                class="form-control form-control-lg form-control-solid"
                :value="old('phone')" placeholder="" required>
            {{-- <!--end::Input--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-8 fv-plugins-icon-container" data-kt-password-meter="true">
            {{-- <!--begin::Wrapper--> --}}
            <div class="mb-0">
                {{-- <!--begin::Label--> --}}
                <label class="form-label mb-1 required">Créer un mot de passe</label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input wrapper--> --}}
                <div class="position-relative mb-3">
                    {{-- <!--begin::Input--> --}}
                    <input type="password" name="password" id="password"
                        class="form-control form-control-lg form-control-solid"
                        placeholder="" :value="__('Password')" autocomplete="off" required>
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                    {{-- <!--end::Input--> --}}
                </div>
                {{-- <!--end::Input wrapper--> --}}
                {{-- <!--begin::Meter--> --}}
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                {{-- <!--end::Meter--> --}}
            </div>
            {{-- <!--end::Wrapper--> --}}
            {{-- <!--begin::Hint--> --}}
            <div class="text-muted">Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles.</div>
            {{-- <!--end::Hint--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--end::Input group--> --}}
        <div class="fv-row mb-0 fv-plugins-icon-container" data-kt-password-meter="true">
            {{-- <!--begin::Label--> --}}
            <label class="form-label mb-1 required">Répéter le mot de passe</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input wrapper--> --}}
            <div class="position-relative mb-3">
                {{-- <!--begin::Input --> --}}
                {{-- <!--begin::Repeat Password--> --}}
                <input type="password" name="password_confirmation"
                    id="password_confirmation" class="form-control form-control-lg form-control-solid"
                    placeholder="" :value="__('Password Confirmation')" autocomplete="off" required>
                {{-- <!--end::Repeat Password--> --}}
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="bi bi-eye-slash fs-2"></i>
                    <i class="bi bi-eye fs-2 d-none"></i>
                </span>
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input wrapper--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
</div>
