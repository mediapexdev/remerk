<form id="kt_modal_edit_camion_form" class="form" method="POST" action="{{route('vehicules.update')}}" novalidate="novalidate">
    <div class="w-100">
        {{-- <!--begin::Hidden Input group--> --}}
        @csrf
        <input type="hidden" id="camion_id" name="camion_id">
        <input type="hidden" name="transporteur_id" value="{{$transporteur->id}}">
        {{-- <!--end::Hidden Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-10 row">
            <div class="col fv-row">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Quel est le type du véhicule ?</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                        data-bs-toggle="tooltip" title="Choisir le type du véhicule"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Select--> --}}
                <select name="type_camion" id="select_type_camion"
                    class="form-select form-select-solid select_camion select_regions"
                    data-select-suffix="depart" data-control="select2" data-hide-search="false"
                    data-allow-clear="true" data-placeholder="Séléctionner le type" tabindex="-1" required>
                    <option></option>
                    @php
                        foreach($types as $type) {
                    @endphp
                            <option value="{{$type->id}}">{{$type->nom}}</option>
                    @php
                        }
                    @endphp
                </select>
                {{-- <!--end::Select--> --}}
            </div>
            <div class="col fv-row">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Fournissez la marque du véhicule</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                        data-bs-toggle="tooltip" title="Choisir la marque du véhicule"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Select--> --}}
                <select name="marque_camion" id="select_marque_camion"
                    class="form-select form-select-solid select_expedition select_communes"
                    data-select-suffix="depart" data-control="select2" data-hide-search="true"
                    data-allow-clear="true" data-placeholder="Séléctionner la marque" tabindex="-1" required>
                    <option id="default_marque"></option>
                    @php
                        foreach($marques as $marque) {
                    @endphp
                            <option value="{{$marque->id}}"> {{$marque->nom}} </option>
                    @php
                        }
                    @endphp
                </select>
                {{-- <!--end::Select--> --}}
            </div>
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-10 ">
            {{-- <!--begin::Label--> --}}
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">Saisissez l'immatriculation du véhicule</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7"
                    data-bs-toggle="tooltip" title="Saisir l'immatriculation du véhicule"></i>
            </label>
            {{-- <!--end::Label--> --}}
            <div class="row">
                {{-- <!--begin::Inputs Group--> --}}
                <div class="col">
                    <input type="text" name="immatriculation1" id="immatriculation1"
                        class="form-control form-control-solid adresse form-input mb-2" placeholder="AA">
                </div>
                <div class="col">
                    <input type="text" name="immatriculation2" id="immatriculation2"
                        class="form-control form-control-solid adresse form-input mb-2" placeholder="XXX">
                </div>
                <div class="col">
                    <input type="text" name="immatriculation3" id="immatriculation3"
                        class="form-control form-control-solid adresse form-input mb-2" placeholder="AA">
                </div>
                {{-- <!--end::Inputs Group--> --}}
            </div>
        </div>
        <div class="mb-10 row">
            {{-- <!--begin::Label--> --}}
            <div class="col fv-row">
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">Le poids à vide du camion (en kg)</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7"
                    data-bs-toggle="tooltip" title="Saisir le poids à vide du camion"></i>
            </label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="number" name="poids_a_vide" id="poids_a_vide"
                class="form-control form-control-solid adresse" placeholder="Entrer le poids à vide">
            {{-- <!--end::Input--> --}}
            </div>
            <div class="col fv-row">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">La capacité du camion (en kg)</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7"
                        data-bs-toggle="tooltip" title="Saisir la capacicité"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <input type="number" name="capacite" id="capacite"
                    class="form-control form-control-solid adresse" placeholder="Saisir la capacicité">
                {{-- <!--end::Input--> --}}
            </div>
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="fv-row mb-10 ">
            {{-- <!--begin::Label--> --}}
            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                <span class="required">Date de mise en circulation</span>
                <i class="fas fa-exclamation-circle ms-2 fs-7"
                    data-bs-toggle="tooltip" title="Choisir la date de mise en circulation"></i>
            </label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Input--> --}}
            <input type="date" name="date_mise_en_circulation" id="date_mise_en_circulation"
                class="form-control form-control-solid date" placeholder="">
            {{-- <!--end::Input--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
    </div>
    {{-- <!--begin::Actions--> --}}
    <div class="d-flex flex-stack pt-10">
        {{-- <!--begin::Wrapper--> --}}
        <div class="me-2">
            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg--> --}}
                <span class="svg-icon svg-icon-3 me-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                    </svg>
                </span>
                {{-- <!--end::Svg Icon--> --}}
                <span>Retour</span>
            </button>
        </div>
        {{-- <!--end::Wrapper--> --}}
        {{-- <!--begin::Wrapper--> --}}
        <div>
            <button type="button" id="submit_form_update_camion" class="btn btn-lg btn-primary" data-kt-stepper-action="button">
                <span class="indicator-label">
                    <span>Modifier</span>
                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg--> --}}
                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                        </svg>
                    </span>
                    {{-- <!--end::Svg Icon--> --}}
                </span>
                <span class="indicator-progress">
                    <span>Patientez ...</span>
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
        </div>
        {{-- <!--end::Wrapper--> --}}
    </div>
    {{-- <!--end::Actions--> --}}
</form>
