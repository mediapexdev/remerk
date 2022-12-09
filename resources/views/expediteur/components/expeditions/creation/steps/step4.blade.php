<div data-kt-stepper-element="content">
    <div class="w-100">
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-5">
            {{-- <!--begin::Fieldset--> --}}
            <fieldset id="fieldset_contact_depart" class="form-control fieldset_contact">
                {{-- <!--begin::Legend--> --}}
                <legend class="w-auto px-2 d-flex align-items-center fs-6 fw-semibold mb-3">Contact à l'enlèvement (facultatif)</legend>
                {{-- <!--end::Legend--> --}}
                {{-- <!--begin::Row--> --}}
                <div class="row">
                    {{-- <!--begin::Input group--> --}}
                    <div class="fv-row form-floating col-md-6 mb-5">
                        {{-- <!--begin::Input--> --}}
                        <input type="text" name="nom_contact_depart"
                            id="nom_contact_depart" class="form-control form-control-solid nom_contact"
                            data-step-contact="depart" placeholder="Prénom et Nom" :value="old('nom_contact_depart')">
                        {{-- <!--end::Input--> --}}
                        {{-- <!--begin::Label--> --}}
                        <label for="nom_contact_depart" class="form-label fs-6 fw-semibold text-muted">Prénom et Nom</label>
                        {{-- <!--end::Label--> --}}
                    </div>
                    {{-- <!--end::Input group--> --}}
                    {{-- <!--begin::Input group--> --}}
                    <div class="fv-row form-floating col-md-6 mb-5">
                        {{-- <!--begin::Input--> --}}
                        <input type="tel" name="phone_contact_depart"
                            id="phone_contact_depart" class="form-control form-control-solid phone_contact"
                            data-step-contact="depart" placeholder="Numéro de Téléphone" :value="old('phone_contact_depart')">
                        {{-- <!--end::Input--> --}}
                        {{-- <!--begin::Label--> --}}
                        <label for="phone_contact_depart" class="form-label fs-6 fw-semibold text-muted">Numéro de Téléphone</label>
                        {{-- <!--end::Label--> --}}
                    </div>
                    {{-- <!--end::Input group--> --}}
                </div>
                {{-- <!--end::Row--> --}}
            </fieldset>
            {{-- <!--end::Fieldset--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-0">
            {{-- <!--begin::Fieldset--> --}}
            <fieldset id="fieldset_contact_arrivee" class="form-control fieldset_contact">
                {{-- <!--begin::Legend--> --}}
                <legend class="w-auto px-2 d-flex align-items-center fs-6 fw-semibold mb-3">Contact à la livraison (facultatif)</legend>
                {{-- <!--end::Legend--> --}}
                {{-- <!--begin::Row--> --}}
                <div class="row">
                    {{-- <!--begin::Input group--> --}}
                    <div class="fv-row form form-floating col-md-6 mb-5">
                        {{-- <!--begin::Input--> --}}
                        <input type="text" name="nom_contact_arrivee"
                            id="nom_contact_arrivee" class="form-control form-control-solid nom_contact"
                            data-step-contact="arrivee" placeholder="Prénom et Nom" :value="old('nom_contact_arrivee')">
                        {{-- <!--end::Input--> --}}
                        {{-- <!--begin::Label--> --}}
                        <label for="nom_contact_arrivee" class="form-label fs-6 fw-semibold text-muted">Prénom et Nom</label>
                        {{-- <!--end::Label--> --}}
                    </div>
                    {{-- <!--end::Input group--> --}}
                    {{-- <!--begin::Input group--> --}}
                    <div class="fv-row form-floating col-md-6 mb-5">
                        {{-- <!--begin::Input--> --}}
                        <input type="tel" name="phone_contact_arrivee"
                            id="phone_contact_arrivee" class="form-control form-control-solid phone_contact"
                            data-step-contact="arrivee" placeholder="Numéro de Téléphone" :value="old('phone_contact_arrivee')">
                        {{-- <!--end::Input--> --}}
                        {{-- <!--begin::Label--> --}}
                        <label for="phone_contact_arrivee" class="form-label fs-6 fw-semibold text-muted">Numéro de Téléphone</label>
                        {{-- <!--end::Label--> --}}
                    </div>
                    {{-- <!--end::Input group--> --}}
                </div>
                {{-- <!--end::Row--> --}}
            </fieldset>
            {{-- <!--end::Fieldset--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
    </div>
</div>
