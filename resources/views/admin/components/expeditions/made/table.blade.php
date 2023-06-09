{{-- <!--begin::Table--> --}}
<table id="kt_expeditions_effectuees_table" class="kt_expeditions_table table table-sm align-middle table-row-dashed fs-6 gy-4">
    {{-- <!--begin::Table head--> --}}
    <thead>
        {{-- <!--begin::Table row--> --}}
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="text-nowrap">Id</th>
            <th class="text-nowrap">Expediteur</th>
            <th class="text-nowrap">Départ</th>
            <th class="text-nowrap">Arrivée</th>
            <th class="text-nowrap">Transporteur</th>
            <th class="text-nowrap">Date Arrivée</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        {{-- <!--end::Table row--> --}}
    </thead>
    {{-- <!--end::Table head--> --}}
    {{-- <!--begin::Table body--> --}}
    <tbody class="fw-semibold text-gray-700">
        @foreach ($completed_expeditions as $expedition)
            <tr>
                {{-- <!--begin::ID--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold">{{ $expedition->string_id }}</span>
                </td>
                {{-- <!--end::ID--> --}}
                {{-- <!--begin::Expediteur--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold">{{ $expedition->expediteur->fullName() }}</span>
                </td>
                {{-- <!--end::Expediteur--> --}}
                {{-- <!--begin::depart--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold">{{ $expedition->depart->adresseComplet() }}</span>
                </td>
                {{-- <!--end::depart--> --}}
                {{-- <!--begin::Arrivee--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold">{{ $expedition->arrivee->adresseComplet() }}</span>
                </td>
                {{-- <!--end::Arrivee--> --}}
                {{-- <!--begin::Transporteur--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold">{{ $expedition->transporteur->fullName() }}</span>
                </td>
                {{-- <!--end::Transporteur--> --}}
                {{-- <!--begin::Date arrivée--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold">{{ '12/12/2022' }}</span>
                </td>
                {{-- <!--end::Transporteur--> --}}
                {{-- <!--begin::Actions--> --}}
                <td class="text-nowrap text-center">
                    {{-- <!--begin::Wrapper--> --}}
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        {{-- <!--begin::Action Details--> --}}
                        <div class="d-block">
                            <a class="btn btn-light-primary btn-sm" href="{{ route('expedition.infos', $expedition->id) }}">
                                <i class="bi bi-eye"></i> Voir
                            </a>
                        </div>
                        {{-- <!--end::Action Details--> --}}
                        {{-- <!--begin::Action Postulat--> --}}
                        {{-- <div class="d-block">
                            <button type="button"
                                id="btn_submit_form_cancel_expedition_{{ $loop->index + 1 }}"
                                class="btn btn-light-danger btn-sm btn_submit_form_cancel_expedition"
                                data-expedition-id="{{ $expedition->id }}">
                                <i class="bi bi-trash"></i> Annuler
                            </button>
                        </div> --}}
                        {{-- <!--end::Action Postulat--> --}}
                    </div>
                    {{-- <!--end::Wrapper--> --}}
                </td>
                {{-- <!--end::Actions--> --}}
            </tr>
            {{-- <!--end::Table row--> --}}
        @endforeach
    </tbody>
    {{-- <!--end::Table body--> --}}
</table>
{{-- <!--end::Table--> --}}
