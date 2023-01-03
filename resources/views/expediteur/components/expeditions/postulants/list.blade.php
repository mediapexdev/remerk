@php
    use App\Core\Util;
@endphp
{{-- <!--begin::List postulants--> --}}
<div class="list_postulants_all">
    {{-- <!--begin::Table--> --}}
    <table id="kt_postulants_all_table" class="table table-sm align-middle table-row-dashed fs-6 gy-5 kt_postulants_table">
        @if(isset($postulants) && $postulants->count())
        {{-- <!--begin::Table head--> --}}
        <thead>
            {{-- <!--begin::Table row--> --}}
            <tr class="text-start text-gray-600 text-gray-700-in-dark fw-bold fs-7 text-uppercase gs-0">
                <th class="text-truncate text-center">Expédition ID</th>
                <th class="text-truncate">Transporteur</th>
                {{-- <th class="text-truncate">Montant <span class="text-gray-400 text-capitalize">(frcfa)</span></th> --}}
                <th class="text-truncate">Destination</th>
                <th class="text-truncate">Montant</th>
                <th class="text-truncate text-center">Actions</th>
            </tr>
            {{-- <!--end::Table row--> --}}
        </thead>
        {{-- <!--end::Table head--> --}}
        {{-- <!--begin::Table body--> --}}
        <tbody class="fw-semibold text-gray-700 text-gray-900-in-dark">
            @foreach ($postulants as $postulant)
            {{-- <!--begin::Table row--> --}}
            <tr>
                {{-- <!--begin::Expédition ID--> --}}
                <td class="text-truncate text-center">
                    <span class="fw-bold fs-5">Expédition: {{ $postulant->expedition->string_id }}</span>
                </td>
                {{-- <!--end::Expédition ID--> --}}
                {{-- <!--begin::Transporteur--> --}}
                <td class="text-truncate">
                    <div class="d-flex align-items-center">
                        {{-- <!--begin:: Avatar --> --}}
                        <div id="postulant_avatar_{{ $postulant->id }}"
                            class="symbol symbol-circle symbol-50px overflow-hidden me-0 postulant_avatar cursor-pointer"
                            data-method="GET" data-route="{{ route('postulant.details', $postulant->id) }}">
                            @php
                                $transporteur = $postulant->transporteur;
                                $color_class = Util::colorClassNames()[\mt_rand(0, 4)];
                            @endphp
                            @if($transporteur->hasAvatar())
                                <div class="symbol-label">
                                    <img class="w-100" src="{{$transporteur->avatar()}}" alt="{{$transporteur->fullName()}}">
                                </div>
                            @else
                                <div class="symbol-label fs-3 bg-light-{{$color_class}} text-{{$color_class}}">{{\mb_substr($transporteur->prenom(), 0, 1)}}</div>
                            @endif
                        </div>
                        {{-- <!--end::Avatar--> --}}
                        {{-- <!--begin::Title--> --}}
                        <div class="ms-5">
                            <span id="postulant_title_{{ $postulant->id }}"
                                class="postulant_title text-gray-800 text-hover-primary fs-5 fw-bold cursor-pointer" data-method="GET"
                                data-route="{{ route('postulant.details', $postulant->id) }}">{{ $transporteur->fullName() }}</span>
                        </div>
                        {{-- <!--end::Title--> --}}
                    </div>
                </td>
                {{-- <!--end::Transporteur--> --}}
                {{-- <!--begin::destination--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{$postulant->expedition->depart->adresseComplet() .' - ' .$postulant->expedition->arrivee->adresseComplet()}}</span>
                </td>
                {{-- <!--end::destination--> --}}
                {{-- <!--begin::Montant--> --}}
                <td class="text-truncate">
                    <span class="fw-bold">{{number_format($postulant->montant_propose, 0, ',', ' ')}}</span>
                </td>
                {{-- <!--end::Montant--> --}}
                {{-- <!--begin::Actions--> --}}
                <td class="text-truncate text-center">
                    @if(!$postulant->is_choosen)
                    <button type="button" id="btn_select_postulant_{{$postulant->id}}"
                        class="btn btn-sm btn-light-primary btn_select_postulant"
                        data-postulant-id="{{ $postulant->id }}">Choisir</button>
                    @else
                        <a class="btn btn-light-info btn-sm" href="{{ route('expedition.infos', $postulant->expedition_id) }}">Détails</a>
                    @endif
                </td>
                {{-- <!--end::Actions--> --}}
            </tr>
            {{-- <!--end::Table row--> --}}
            @endforeach
            @else
            <div class="d-flex flex-column">
                <p class="h4 text-center"><span class="p-5">Merci de patienter, votre demande est en cours de traitement.</span>
                    <img class="" src="{{ asset('assets/images/accueil2.png') }}" alt="" height="175" width="275">
                </p>
            </div>
            @endif
        </tbody>
        {{-- <!--end::Table body--> --}}
    </table>
    {{-- <!--end::Table--> --}}
    {{-- <!--begin::Form--> --}}
    <form id="form_select_postulant" method="POST" action="{{route('choixPostulant')}}" style="display: none !important;">
        @csrf
        <input type="hidden" name="postulant_id">
    </form>
    {{-- <!--end::Form--> --}}
</div>
{{-- <!--end::List postulant--> --}}
