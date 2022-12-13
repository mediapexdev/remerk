@php
	use App\Models\EtatExpedition;
@endphp

<table id="list_expedition_table" class="table align-middle table-row-dashed fs-6 gy-3">
    {{-- <!--begin::Table head--> --}}
    <thead>
        {{-- <!--begin::Table row--> --}}
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-20px">No: </th>
            <th>Marchandise</th>
            <th class="text-start min-w-150px">Départ</th>
            <th class="text-start min-w-150px">Arrivée</th>
            <th class="text-start min-w-140px">Transporteur</th>
            <th class="text-start min-w-100px">Camion(Nombre)</th>
            <th class="text-start min-w-200x">Date départ</th>
            <th class="text-start">Status</th>
            <th class="text-end"></th>
        </tr>
        {{-- <!--end::Table row--> --}}
    </thead>
    {{-- <!--end::Table head--> --}}
    {{-- <!--begin::Table body--> --}}
    <tbody class="fw-bold">
        @foreach($expeditions as $expedition)
            @php
                foreach ($expedition->postulants as $postulant) {
                    $postulant = $postulant;
                }
            @endphp
        <tr>
            <td>
                <a href="{{route('expediteur.detailExpedition',$expedition->id)}}" class="text-gray-600 text-hover-primary">{{$expedition->string_id}}</a>
            </td>
            <td>
                {{$expedition->expeditionMatiere->matiere->type}}
                <br>
                <span class="text-gray-600">{{$expedition->expeditionMatiere->poidsMatiere->poids}}</span>
            </td>
            <td class="text-start">
                <p>
                    {{$expedition->depart->adresseComplet()}}
                </p>
            </td>
            <td class="text-start">
                <p>
                    {{$expedition->arrivee->adresseComplet()}}
                </p>
            </td>
            <td class="text-start">
                @if(!isset($expedition->transporteur_id))
                    <p class="text-gray-600">-----</p>
                @else
                    {{$expedition->transporteur->fullName()}}
                @endif
            </td>
            <td class="text-start">
                @if(!isset($expedition->transporteur_id))
                    <p class="text-gray-600">----</p>
                @else
                    {{$expedition->expeditionMatiere->typeVehicule->nom . ' (' .
                    $expedition->expeditionMatiere->nombre_vehicules . ') '}}
                @endif
            </td>
            <td class="text-start">
                <span class="text-gray-800 fw-bolder">{{\date('d-m-Y', \strtotime($expedition->created_at))}}</span>
            </td>
            <td class="text-start">
                @switch($expedition->etat_expedition_id)
                    @case(EtatExpedition::EN_ATTENTE)
                        <span class="badge py-2 px-2 fs-7 badge-light-warning">En attente</span>
                        @break
                    @case(EtatExpedition::EN_ATTENTE_DE_PAIEMENT)
                        <span class="badge py-2 px-2 fs-7 badge-warning">En attente de paiement</span>
                        @break
                    @case(EtatExpedition::EN_ATTENTE_DE_CHARGEMENT)
                        <span class="badge py-2 px-2 fs-7 badge-light-primary">En attente de chargement</span>
                        @break
                    @case(EtatExpedition::CHARGE)
                        <span class="badge py-2 px-2 fs-7 badge-light-primary">Charger</span>
                        @break
                    @case(EtatExpedition::EN_TRANSIT)
                        <span class="badge py-2 px-2 fs-7 badge-success">En transit</span>
                        @break
                    @case(EtatExpedition::DECHARGE)
                        <span class="badge py-2 px-2 fs-7 badge-light-success">Decharger</span>
                        @break
                    @case(EtatExpedition::TERMINEE)
                        <span class="badge py-2 px-2 fs-7 badge-primary">Terminer</span>
                        @break
                    @default
                        <span class="badge py-2 px-2 fs-7 badge-light-danger">Annulée</span>
                        @break
                @endswitch
            </td>
            <td class="text-end">
                <div class="container">
                    <div class="dropdown">
                        <button class="btn btn-secondary rotate py-2 px-2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                            fill="currentColor" />
                                    </svg>
                                <!--end::Svg Icon-->
                            </span>
                        </button>
                        <div class="dropdown-menu">
                            <button class="dropdown-item btn btn-danger py-2 px-2 m-1" data-bs-toggle="modal" data-bs-target="#kt_modal_confirm_cancel">Annuler</button>
                            @isset($postulant)
                                @if ($expedition->etat->id == 2)
                                <form action="{{route('choixPostulant')}}" method="post" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="expedition_id" value="{{$expedition->id}}">
                                    <input type="hidden" name="transporteur_id" value="{{$postulant->transporteur->id}}">
                                    <input type="hidden" name="postulant_id" value="{{$postulant->id}}">
                                    <input type="hidden" name="montant" value="{{$postulant->montant}}">
                                    <button type="submit" class="dropdown-item btn btn-light-success py-2 px-2 m-1">Effectuer le paiement</button>
                                </form>
                                @endif
                            @endisset
                        </div>
                    </div>
                </div>
                
            </td>
        </tr>
        @endforeach
    </tbody>
    {{-- <!--end::Table body--> --}}
</table>
