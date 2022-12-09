<div class="current" data-kt-stepper-element="content">
    <div class="w-100">
        {{-- <!--begin::Row--> --}}
        <div class="row">
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Choisissez la région</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Choisir la région"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Select--> --}}
                <select name="region_depart" id="select_regions_depart"
                    class="form-select form-select-solid select_expedition select_regions"
                    data-select-suffix="depart" data-control="select2" data-hide-search="false"
                    data-placeholder="Séléctionner une région" data-allow-clear="true"
                    data-dropdown-parent="#kt_modal_create_expedition" tabindex="-1" required>
                    <option></option>
                    @php
                        foreach($regions as $region) {
                    @endphp
                        <option value="{{$region->id}}">{{$region->nom}}</option>
                    @php
                        }
                    @endphp
                </select>
                {{-- <!--end::Select--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Choisissez la commune</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Choisir la commune"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Select--> --}}
                <select name="commune_depart" id="select_communes_depart"
                    class="form-select form-select-solid select_expedition select_communes"
                    data-select-suffix="depart" data-control="select2" data-hide-search="false"
                    data-placeholder="Séléctionner une commune" data-allow-clear="true"
                    data-dropdown-parent="#kt_modal_create_expedition" tabindex="-1" disabled required>
                    <option></option>
                    @php
                        if(isset($communes)) {
                            foreach($communes as $commune) {
                    @endphp
                        <option value="{{$commune->id}}">{{$commune->nom}}</option>
                    @php
                            }
                        }
                    @endphp
                </select>
                {{-- <!--end::Select--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
        </div>
        {{-- <!--end::Row--> --}}
        {{-- <!--begin::Row--> --}}
        <div class="row">
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Saisissez l'adresse d'enlèvement</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Saisir l'adresse d'enlèvement"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <input type="text" name="adresse_depart" id="adresse_depart"
                    class="form-control form-control-solid adresse" placeholder="L'adresse d'enlèvement">
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Date prévue</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Choisir la date de départ"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <input type="date" name="date_depart" id="date_depart"
                    class="form-control form-control-solid date" placeholder="Date d'enlèvement"
                    min="{{(new \DateTime("today", new \DateTimeZone('UTC')))->format('Y-m-d')}}"
                    max="{{(new \DateTime('now', new \DateTimeZone('UTC')))->add(new \DateInterval('P1M'))->format('Y-m-d')}}">
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
        </div>
        {{-- <!--end::Row--> --}}
    </div>
</div>
