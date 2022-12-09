<div data-kt-stepper-element="content">
    <div class="w-100">
        {{-- <!--begin::Row--> --}}
        <div class="row">
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Type de produit/matériel</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sélectionner le type de matiere"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <select name="matiere" id="select_matieres"
                    class="form-select form-select-solid select_expedition"
                    data-control="select2" data-hide-search="false"
                    data-placeholder="Séléctionner un type de matiere" data-allow-clear="true"
                    data-dropdown-parent="#kt_modal_create_expedition" tabindex="-1" required>
                    <option></option>
                    @php
                        use App\Models\Matiere;
                        $matieres = Matiere::all();
                        foreach($matieres as $matiere) {
                    @endphp
                        <option value="{{$matiere->id}}">{{$matiere->type}}</option>
                    @php
                        }
                    @endphp
                </select>
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Poids du produit/matériel</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sélectionner le type de matiere"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <select name="poids_matiere" id="select_poids_matieres"
                    class="form-select form-select-solid select_expedition"
                    data-control="select2" data-hide-search="false"
                    data-placeholder="Séléctionner le poids de la matiere" data-allow-clear="true"
                    data-dropdown-parent="#kt_modal_create_expedition" tabindex="-1" required>
                    <option></option>
                    @php
                        use App\Models\PoidsMatiere;
                        $poids_matieres = PoidsMatiere::all();
                        foreach($poids_matieres as $poids_matiere) {
                    @endphp
                        <option value="{{$poids_matiere->id}}">{{$poids_matiere->poids}}</option>
                    @php
                        }
                    @endphp
                </select>
                {{-- <!--end::Input--> --}}
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
                    <span class="required">Type de véhicule</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sélectionner le type de véhicule"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <select name="type_vehicule" id="select_types_vehicules"
                    class="form-select form-select-solid select_expedition"
                    data-control="select2" data-hide-search="false"
                    data-placeholder="Séléctionner un type de véhicule" data-allow-clear="true"
                    data-dropdown-parent="#kt_modal_create_expedition" tabindex="-1" disabled required>
                    <option></option>
                    @php
                        if(isset($types_vehicule)) {
                            foreach($types_vehicule as $type_vehicule) {
                    @endphp
                        <option value="{{$type_vehicule->id}}">{{$type_vehicule->nom}}</option>
                    @php
                            }
                        }
                    @endphp
                </select>
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
            {{-- <!--begin::Input group--> --}}
            <div class="fv-row col-md-6 mb-10">
                {{-- <!--begin::Label--> --}}
                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                    <span class="required">Nombre de véhicules</span>
                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sélectionner le nombre de véhicules"></i>
                </label>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Input--> --}}
                <select name="nombre_vehicules" id="select_nombre_vehicules"
                    class="form-select form-select-solid select_expedition"
                    data-control="select2" data-hide-search="false"
                    data-placeholder="Séléctionner le nombre de véhicules" data-allow-clear="true"
                    data-dropdown-parent="#kt_modal_create_expedition" tabindex="-1" required>
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                {{-- <!--end::Input--> --}}
            </div>
            {{-- <!--end::Input group--> --}}
        </div>
        {{-- <!--end::Row--> --}}
    </div>
</div>
