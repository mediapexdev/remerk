{{-- <!--begin::Table--> --}}
<table id="kt_expeditions_en_attente_table" class="kt_expeditions_table table table-sm align-middle table-row-dashed fs-6 gy-4">
    {{-- <!--begin::Table head--> --}}
    <thead>
        {{-- <!--begin::Table row--> --}}
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="text-truncate">Id</th>
            <th class="text-truncate">Expediteur</th>
            <th class="text-truncate">Matière</th>
            <th class="text-truncate">Départ</th>
            <th class="text-truncate">Arrivée</th>
            <th class="text-truncate">Date</th>
            <th class="text-truncate text-center">Actions</th>
        </tr>
        {{-- <!--end::Table row--> --}}
    </thead>
    {{-- <!--end::Table head--> --}}
    {{-- <!--begin::Table body--> --}}
    <tbody class="fw-semibold text-gray-700">
        @foreach ($pending_expeditions as $expedition)
            <tr>
                {{-- <!--begin::ID--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->string_id }}</span>
                </td>
                {{-- <!--end::ID--> --}}
                {{-- <!--begin::Expediteur--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->expediteur->fullName() }}</span>
                </td>
                {{-- <!--end::Expediteur--> --}}
                {{-- <!--begin::Matiere type--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->matiereType() }}</span>
                </td>
                {{-- <!--end::AMatiere type--> --}}
                {{-- <!--begin::Matiere poids--> --}}
                {{-- <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->matiereWeight() }}</span>
                </td> --}}
                {{-- <!--end::Matiere poids--> --}}
                {{-- <!--begin::depart--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->depart->adresseComplet() }}</span>
                </td>
                {{-- <!--end::depart--> --}}
                {{-- <!--begin::Arrivee--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->arrivee->adresseComplet() }}</span>
                </td>
                {{-- <!--end::Arrivee--> --}}
                {{-- <!--begin::Date--> --}}
                <td class="text-truncate" data-order="{{$expedition->depart->date_depart}}">
                    <span class="fw-bold">{{ (new \DateTime($expedition->depart->date_depart, new \DateTimeZone('UTC')))->format('d-m-Y') }}</span>
                </td>
                {{-- <!--end::Date--> --}}
                {{-- <!--begin::Actions--> --}}
                <td class="text-truncate text-center">
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
                        <div class="d-block">
                            <button type="button"
                                id="btn_submit_form_cancel_expedition_{{ $loop->index + 1 }}"
                                class="btn btn-light-danger btn-sm btn_submit_form_cancel_expedition"
                                data-expedition-id="{{ $expedition->id }}">
                                <i class="bi bi-trash"></i> Annuler
                            </button>
                        </div>
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
{{-- <!--begin::Form Cancel Expédition--> --}}
<form id="form_cancel_expedition" method="POST" action="{{ route('admin.expedition.delete') }}" style="display: none !important;">
    @csrf
    <input type="hidden" name="expedition_id" id="expedition_id">
</form>

{{-- <!--end::Form Cancel Expédition--> --}}