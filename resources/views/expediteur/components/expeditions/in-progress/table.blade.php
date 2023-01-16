@php
use App\Models\EtatExpedition;
@endphp
{{-- <!--begin::Table--> --}}
<table id="kt_expeditions_en_cours_table" class="kt_expeditions_table table table-sm align-middle table-row-dashed fs-6 gy-4">
    {{-- <!--begin::Table head--> --}}
    <thead>
        {{-- <!--begin::Table row--> --}}
        <tr class="text-start text-gray-600 text-gray-700-on-dark fw-bold fw-medium-on-dark fs-7 text-uppercase gs-0">
            <th class="text-nowrap">Statut</th>
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
        @foreach ($current_expeditions as $expedition)
            {{-- <!--begin::Table row--> --}}
            <tr>
                {{-- <!--begin::Status--> --}}
                <td class="text-nowrap">
                    {{-- <!--begin::Badges--> --}}
                    <span class="badge badge-light-primary">{{ $expedition->etat->nom }}</span>
                    {{-- <!--end::Badges--> --}}
                </td>
                {{-- <!--end::Status--> --}}
                {{-- <!--begin::Matière Type--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->matiereType() }}</span>
                </td>
                {{-- <!--end::Matière Type--> --}}
                {{-- <!--begin::Poids Matière--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->matiereWeight() }}</span>
                </td>
                {{-- <!--end::Poids Type--> --}}
                {{-- <!--begin::Adresse Départ--> --}}
                <td class="text-nowrap">
                    <span class="fw-bold fw-medium-on-dark">{{ $expedition->adresseDepartComplet() }}</span>
                </td>
                {{-- <!--end::Adresse Départ--> --}}
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
                    <a class="btn btn-light-primary btn-sm" href="{{ route('expedition.infos', $expedition->id) }}">Details</a>
                </td>
                {{-- <!--end::Actions--> --}}
            </tr>
            {{-- <!--end::Table row--> --}}
        @endforeach
    </tbody>
{{-- <!--end::Table body--> --}}
</table>
{{-- <!--end::Table--> --}}
