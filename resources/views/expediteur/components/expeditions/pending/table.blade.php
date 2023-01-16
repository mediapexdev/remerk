{{-- <!--begin::Table--> --}}
<table id="kt_expeditions_en_attente_table" class="kt_expeditions_table table table-sm align-middle table-row-dashed fs-6 gy-4">
    {{-- <!--begin::Table head--> --}}
    <thead>
        {{-- <!--begin::Table row--> --}}
        <tr class="text-start text-gray-600 text-gray-700-on-dark fw-bold fw-medium-on-dark fs-7 text-uppercase gs-0">
            <th class="text-nowrap">Matière</th>
            <th class="text-nowrap">Poids</th>
            <th class="text-nowrap">Départ</th>
            <th class="text-nowrap">Arrivée</th>
            <th class="text-nowrap">Date prévue</th>
            <th class="text-nowrap text-center">Actions</th>
        </tr>
        {{-- <!--end::Table row--> --}}
    </thead>
    {{-- <!--end::Table head--> --}}
    {{-- <!--begin::Table body--> --}}
    <tbody class="fw-semibold fw-medium-on-dark text-gray-700 text-white-dim-on-dark">
        @foreach ($pending_expeditions as $expedition)
            {{-- @php
                $postulant = $expedition->getPostulant($transporteur->id)
            @endphp --}}
            {{-- <!--begin::Table row--> --}}
            <tr>
                {{-- <!--begin::Matière Type--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->matiereType() }}</span>
                </td>
                {{-- <!--end::Matière Type--> --}}
                {{-- <!--begin::Poids Matière--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->matiereWeight() }}</span>
                </td>
                {{-- <!--end::Poids Matière--> --}}
                {{-- <!--begin::Adresse départ--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->adresseDepartComplet() }}</span>
                </td>
                {{-- <!--end::Adresse départ--> --}}
                {{-- <!--begin::Adresse Arrivée--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->adresseArriveeComplet() }}</span>
                </td>
                {{-- <!--end::Adresse Arrivée--> --}}
                {{-- <!--begin::Date--> --}}
                <td class="text-nowrap" data-order="{{$expedition->depart->date_depart}}">
                    <span class="fw-bold fw-medium-on-dark">{{ (new \DateTime($expedition->depart->date_depart, new \DateTimeZone('UTC')))->format('d-m-Y') }}</span>
                </td>
                {{-- <!--end::Date--> --}}
                {{-- <!--begin::Actions--> --}}
                <td class="text-nowrap text-center">
                    {{-- <!--begin::Wrapper--> --}}
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        {{-- <!--begin::Action Details--> --}}
                        <div class="d-block">
                            <a class="btn btn-light-primary btn-sm" href="{{ route('expedition.infos', $expedition->id) }}">Détails</a>
                        </div>
                        {{-- <!--end::Action Details--> --}}
                        {{-- <!--begin::Action Postulat--> --}}
                        <div class="d-block">
                            <button type="button"
                                id="btn_submit_form_cancel_expedition_{{ $loop->index + 1 }}"
                                class="btn btn-light-warning btn-sm btn_submit_form_cancel_expedition"
                                data-expedition-id="{{ $expedition->id }}">Annuler</button>
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
<form id="form_cancel_expedition" method="POST" action="{{ route('expedition.delete') }}" style="display: none !important;">
    @csrf
    <input type="hidden" name="expedition_id" id="expedition_id">
</form>
{{-- <!--end::Form Cancel Expédition--> --}}
