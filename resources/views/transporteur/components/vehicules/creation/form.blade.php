<form id="kt_modal_create_camion_form" class="form" method="POST" action="{{route('vehicules.store')}}"
    novalidate="novalidate">
    <div class="">
        {{--
        <!--begin::Hidden Input group--> --}}
        @csrf
        <input type="hidden" name="transporteur_id" value="{{$transporteur->id}}">
        {{--
        <!--end::Hidden Input group--> --}}
        {{--
        <!--begin::Input group--> --}}
        <div class="fv-row mb-10 row">
            <div class="col fv-row">
                {{--
                <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Type de véhicule</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="Choisir le type de véhicule"></i>
                </label>
                {{--
                <!--end::Label--> --}}
                {{--
                <!--begin::Select--> --}}
                <select name="type_camion" id="select_type_camion"
                    class="form-select form-select-solid select_camion select_regions" data-select-suffix="depart"
                    data-control="select2" data-hide-search="false" data-allow-clear="true"
                    data-placeholder="Séléctionner le type" tabindex="-1" required>
                    <option></option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}"> {{$type->nom}} </option>
                    @endforeach
                </select>
                {{--
                <!--end::Select--> --}}
            </div>
            <div class="col fv-row">
                {{--
                <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Marque</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="Choisir la marque"></i>
                </label>
                {{--
                <!--end::Label--> --}}
                {{--
                <!--begin::Select--> --}}
                <select name="marque_camion" id="select_marque_camion"
                    class="form-select form-select-solid select_expedition select_communes" data-select-suffix="depart"
                    data-control="select2" data-hide-search="true" data-allow-clear="true"
                    data-placeholder="Séléctionner la marque" tabindex="-1" required>
                    <option></option>
                    @foreach($marques as $marque)
                    <option value="{{$marque->id}}"> {{$marque->nom}} </option>
                    @endforeach
                </select>
                {{--
                <!--end::Select--> --}}
            </div>
            <div class="col fv-row">
                {{--
                <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Modèle</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="Entrez le modèle du véhicule"></i>
                </label>
                {{--
                <!--end::Label--> --}}
                {{--
                <!--begin::Input--> --}}
                <input type="text" name="modele_vehicule" id="model"
                    class="form-control form-control-solid form-input" placeholder="Entrer le modèle">
                {{--
                <!--end::Input--> --}}
            </div>
        </div>
        {{--
        <!--end::Input group--> --}}
        {{--
        <!--begin::Input group--> --}}
        <div class="fv-row mb-10 ">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        {{--
                        <!--begin::Label--> --}}
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Numéro d'immatriculation</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Saisir l'immatriculation du véhicule"></i>
                        </label>
                        {{--
                        <!--end::Label--> --}}
                        {{--
                        <!--begin::Inputs Group--> --}}
                        <div class="col">
                            <input type="text" name="immatriculation1" id="immatriculation1"
                                class="form-control form-control-solid form-input" placeholder="AA">
                        </div>
                        <div class="col">
                            <input type="text" name="immatriculation2" id="immatriculation2"
                                class="form-control form-control-solid form-input" placeholder="XXX">
                        </div>
                        <div class="col">
                            <input type="text" name="immatriculation3" id="immatriculation3"
                                class="form-control form-control-solid form-input" placeholder="AB">
                        </div>
                        {{--
                        <!--end::Inputs Group--> --}}
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        {{--
                        <!--begin::Label--> --}}
                        <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                            <span class="required">Date de mise en circulation</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Choisir la date de mise en circulation"></i>
                        </label>
                        {{--
                        <!--end::Label--> --}}
                        {{--
                        <!--begin::Input--> --}}
                        <input type="date" name="date_mise_en_circulation" id="date_mise_en_circulation"
                            class="form-control form-control-solid date" placeholder="">
                        {{--
                        <!--end::Input--> --}}
                    </div>
                </div>
            </div>
        </div>
        {{--
        <!--end::Input group--> --}}
        <div class="mb-10 row">
            {{--
            <!--begin::Label--> --}}
            <div class="col fv-row">
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Poids à vide (en kg)</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="Saisir le poids à vide du camion"></i>
                </label>
                {{--
                <!--end::Label--> --}}
                {{--
                <!--begin::Input--> --}}
                <input type="number" name="poids_a_vide" id="poids_a_vide"
                    class="form-control form-control-solid adresse" placeholder="Entrer le poids à vide">
                {{--
                <!--end::Input--> --}}
            </div>
            <div class="col fv-row">
                {{--
                <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">La capacité (en kg)</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                        title="Entrer la capacicité"></i>
                </label>
                {{--
                <!--end::Label--> --}}
                {{--
                <!--begin::Input--> --}}
                <input type="number" name="capacite" id="capacite" class="form-control form-control-solid adresse"
                    placeholder="Saisir la capacicité">
                {{--
                <!--end::Input--> --}}
            </div>
        </div>
        {{--
        <!--end::Input group--> --}}
    </div>
    {{--
    <!--begin::Actions--> --}}
    <div class="d-flex flex-stack pt-10">
        {{--
        <!--begin::Wrapper--> --}}
        <div>
            <button type="button" id="submit_form_ajout_camion" class="btn btn-lg btn-primary"
                data-kt-stepper-action="button">
                <span class="indicator-label">
                    <span>Soumettre</span>
                    {{--
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg--> --}}
                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1"
                                transform="rotate(-180 18 13)" fill="currentColor" />
                            <path
                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    {{--
                    <!--end::Svg Icon--> --}}
                </span>
                <span class="indicator-progress">
                    <span>Patientez ...</span>
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        {{--
        <!--end::Wrapper--> --}}
    </div>
    {{--
    <!--end::Actions--> --}}
</form>