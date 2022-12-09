<div class="" data-kt-stepper-element="content">
    {{-- <!--begin::Wrapper--> --}}
    <div class="w-100">
        {{-- <!--begin::Heading--> --}}
        <div class="pb-6 pb-lg-8">
            {{-- <!--begin::Title--> --}}
            <h2 class="fw-bold text-dark">Informations professionnelles</h2>
            {{-- <!--end::Title--> --}}
            {{-- <!--begin::Notice--> --}}
            <div class="text-muted fw-semibold fs-6 mb-5">
                <span>Si vous avez besoin de plus d'informations cliquez sur ce</span>
                <a href="#" class="link-primary fw-bold">lien</a>.
            </div>
            <div class="notice d-flex bg-light-info rounded border-info border border-dashed p-6">
                {{-- <!--begin::Icon--> --}}
                {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg--> --}}
                <span class="svg-icon svg-icon-2tx svg-icon-info me-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                        <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                        <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                    </svg>
                </span>
                {{-- <!--end::Svg Icon--> --}}
                {{-- <!--end::Icon--> --}}
                {{-- <!--begin::Wrapper--> --}}
                <div class="d-flex flex-stack flex-grow-1">
                    {{-- <!--begin::Content--> --}}
                    <div class="fw-semibold">
                        <div class="fs-6 text-gray-700">Cette étape est facultative, vous pouvez la sauter.</div>
                    </div>
                    {{-- <!--end::Content--> --}}
                </div>
                {{-- <!--end::Wrapper--> --}}
            </div>
            {{-- <!--end::Notice--> --}}
        </div>
        {{-- <!--end::Heading--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-8 fv-plugins-icon-container">
            {{-- <!--begin::Label--> --}}
            <label class="form-label mb-1">Entreprise</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="text" name="entreprise" id="entreprise"
                class="form-control form-control-lg form-control-solid"
                placeholder="" :value="old('entreprise')">
            {{-- <!--end::Input--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-8 fv-plugins-icon-container">
            {{-- <!--begin::Label--> --}}
            <label class="form-label mb-1">Adresse e-mail</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="email" name="email" id="email"
                class="form-control form-control-lg form-control-solid"
                placeholder="votreEmail@mail.com" :value="old('email')">
            {{-- <!--end::Input--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-8 fv-plugins-icon-container">
            {{-- <!--begin::Label--> --}}
            <label class="form-label mb-1">Site web</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="url" name="siteweb" id="siteweb"
                class="form-control form-control-lg form-control-solid"
                placeholder="votreSiteWeb.net" :value="old('siteweb')">
            {{-- <!--end::Input--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
</div>
