@php
    use App\Core\Util;
    use App\Models\EtatExpedition;
@endphp
{{-- <!--begin::Table--> --}}
<table id="kt_expeditions_en_cours_table" class="kt_expeditions_table table table-sm align-middle table-row-dashed fs-6 gy-4">
    {{-- <!--begin::Table head--> --}}
    <thead>
        {{-- <!--begin::Table row--> --}}
        <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
            <th class="text-truncate">Expediteur</th>
            <th class="text-truncate">Statut</th>
            <th class="text-truncate">Matière</th>
            <th class="text-truncate">Poids</th>
            <th class="text-truncate">Départ</th>
            <th class="text-truncate">Arrivée</th>
            <th class="text-truncate">Date prévue</th>
            <th class="text-truncate text-center">Actions</th>
        </tr>
        {{-- <!--end::Table row--> --}}
    </thead>
    {{-- <!--end::Table head--> --}}
    {{-- <!--begin::Table body--> --}}
    <tbody class="fw-semibold text-gray-700">
        @foreach ($current_expeditions as $expedition)
            @php
                $postulant = $expedition->getPostulant($transporteur->id)
            @endphp
            {{-- <!--begin::Table row--> --}}
            <tr>
                {{-- <!--begin::Expéditeur--> --}}
                <td class="text-truncate">
                    <div class="d-flex align-items-center">
                        {{-- <!--begin:: Avatar --> --}}
                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-0">
                            @php
                                $expediteur = $expedition->expediteur;
                                $color_class = Util::colorClassNames()[\mt_rand(0, 4)];
                            @endphp
                            @if($expediteur->hasAvatar())
                                <div class="symbol-label">
                                    <img class="w-100" src="{{$expediteur->avatar()}}" alt="{{$expediteur->fullName()}}">
                                </div>
                            @else
                                <div class="symbol-label fs-3 bg-light-{{$color_class}} text-{{$color_class}}">{{\mb_substr($expediteur->prenom(), 0, 1)}}</div>
                            @endif
                        </div>
                        {{-- <!--end::Avatar--> --}}
                        {{-- <!--begin::Title--> --}}
                        <div class="ms-5">
                            <span class="text-gray-800 fs-5 fw-bold">{{ $expedition->expediteur->fullName() }}</span>
                        </div>
                        {{-- <!--end::Title--> --}}
                    </div>
                </td>
                {{-- <!--end::Expéditeur--> --}}
                {{-- <!--begin::Status--> --}}
                <td class="text-truncate">
                    {{-- <!--begin::Badges--> --}}
                    <span class="badge badge-light-primary">{{ $expedition->etat->nom }}</span>
                    {{-- <!--end::Badges--> --}}
                </td>
                {{-- <!--end::Status--> --}}
                {{-- <!--begin::Matière Type--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->matiereType() }}</span>
                </td>
                {{-- <!--end::Matière Type--> --}}
                {{-- <!--begin::Poids Matière--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->matiereWeight() }}</span>
                </td>
                {{-- <!--end::Poids Type--> --}}
                {{-- <!--begin::Adresse Départ--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->adresseDepartComplet() }}</span>
                </td>
                {{-- <!--end::Adresse Départ--> --}}
                {{-- <!--begin::Adresse Arrivée--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{ $expedition->adresseArriveeComplet() }}</span>
                </td>
                {{-- <!--end::Adresse Arrivée--> --}}
                {{-- <!--begin::Date--> --}}
                <td class="text-truncate" data-order="{{$expedition->depart->date_depart}}">
                    <span class="fw-bold">{{ (new \DateTime($expedition->depart->date_depart, new \DateTimeZone('UTC')))->format('d-m-Y') }}</span>
                </td>
                {{-- <!--end::Date--> --}}
                {{-- <!--begin::Actions--> --}}
                <td class="text-truncate text-center">
                    <a class="btn btn-light-primary btn-sm" href="{{ route('expedition.suivi', $expedition->id) }}">Suivi</a>
                </td>
                {{-- <!--end::Actions--> --}}
            </tr>
            {{-- <!--end::Table row--> --}}
        @endforeach
    </tbody>
{{-- <!--end::Table body--> --}}
</table>
{{-- <!--end::Table--> --}}
