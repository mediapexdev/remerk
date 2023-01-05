<div data-kt-stepper-element="content">
    {{-- <!--begin::Wrapper--> --}}
    <div class="w-100">
        {{-- <!--begin::Heading--> --}}
        <div class="pb-10 pb-lg-12">
            {{-- <!--begin::Title--> --}}
            <h2 class="fw-bold text-dark">Informations personnelles</h2>
            {{-- <!--end::Title--> --}}
            {{-- <!--begin::Notice--> --}}
            <div class="text-gray-600 text-gray-700-on-dark fw-semibold fs-6">
                <span>Si vous avez besoin de plus d'informations cliquez sur ce</span>
                <a href="#" class="link-primary fw-bold">lien</a>.
            </div>
            {{-- <!--end::Notice--> --}}
        </div>
        {{-- <!--end::Heading--> --}}
        <div class="row">
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row mb-8 fv-plugins-icon-container col-md-6">
                {{-- <!--begin::Label--> --}}
                <label class="form-label mb-1 required">Prénom</label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <input type="text" name="prenom" id="prenom"
                    class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                    placeholder="Prenom" :value="old('prenom')" required>
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row mb-8 fv-plugins-icon-container col-md-6">
                {{-- <!--begin::Label--> --}}
                <label class="form-label mb-1 required">Nom</label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <input type="text" name="nom" id="nom"
                    class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                    placeholder="Nom" :value="old('nom')" required>
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
        </div>
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-8 fv-plugins-icon-container">
            {{-- <!--begin::Label--> --}}
            <label class="form-label mb-1 required">Adresse</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="text" name="adresse" id="adresse"
                class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                placeholder="Rue, Quartier, Ville" :value="old('adresse')" required>
            {{-- <!--end::Input--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
</div>
