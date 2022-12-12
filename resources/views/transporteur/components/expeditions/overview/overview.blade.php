@php
    use App\Models\Expedition;
    use App\Models\Expediteur;
    use App\Models\EtatExpedition;
    use Illuminate\Support\Collection;
    
    $transporteur = isset($transporteur) ? $transporteur :
        Transporteur::where('user_id', Auth::user()->id)->first();
    $vehicles = $transporteur->vehicules;

    $available_expeditions = Collection::make();
    $all_expeditions_available = Expedition::where('etat_expedition_id', EtatExpedition::EN_ATTENTE)->orderByDesc('created_at')->limit(5)->get();

    foreach ($all_expeditions_available as $expedition) {
        if($vehicles->contains(function ($vehicle) use($expedition) {
            return $expedition->expeditionMatiere->types_vehicule_id == $vehicle->id; })){
            $available_expeditions->push($expedition);
        }
    }
    $current_expeditions = Expedition::where('transporteur_id', $transporteur->id)->whereIn('etat_expedition_id', [
        EtatExpedition::EN_ATTENTE_DE_PAIEMENT,
        EtatExpedition::EN_ATTENTE_DE_CHARGEMENT,
        EtatExpedition::CHARGE,
        EtatExpedition::EN_TRANSIT,
        EtatExpedition::DECHARGE
    ])->orderByDesc('created_at')->limit(5)->get();

    $completed_expeditions = Expedition::where([
        'transporteur_id'       => $transporteur->id,
        'etat_expedition_id'    => EtatExpedition::TERMINEE,
    ])->orderByDesc('created_at')->limit(5)->get();
@endphp
{{-- <!--begin::List widget--> --}}
<div id="expeditions_overview_widget" class="card card-flush h-xl-100">
    {{-- <!--begin::Header--> --}}
    <div class="card-header pt-7">
        @php
            $expeditions_count = $available_expeditions->count();
            $data_text = ((1 >= $expeditions_count) ? 'expédition disponible' : 'expéditions disponibles');
        @endphp
        {{-- <!--begin::Title--> --}}
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-800">Aperçu des expéditions</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ (!$expeditions_count ? 'Aucune' : $expeditions_count) . ' ' . $data_text }}</span>
        </h3>
        {{-- <!--end::Title--> --}}
        {{-- <!--begin::Toolbar--> --}}
        <div class="card-toolbar">
            <a href="/expeditions" class="btn btn-sm btn-light">Voir tout</a>
        </div>
        {{-- <!--end::Toolbar--> --}}
    </div>
    {{-- <!--end::Header--> --}}
    {{-- <!--begin::Body--> --}}
    <div class="card-body pt-4 px-0">
        {{-- <!--begin::Nav--> --}}
        @include('transporteur.components.expeditions.overview.navigation')
        {{-- <!--end::Nav--> --}}
        {{-- <!--begin::Tab Content--> --}}
        <div class="tab-content px-9 hover-scroll-overlay-y pe-7 me-3 mb-2" style="max-height: 400px;">
            {{-- <!--begin::Tap pane--> --}}
            <div id="kt_tab_expeditions_disponibles" class="tab-pane fade show active" data-text="{{ $data_text }}" data-number="{{ $expeditions_count }}">
                {{-- <!--begin::Item--> --}}
                <div class="m-0">
                    {{-- <!--begin::Contenu--> --}}
                    @if ($expeditions_count)
                        @foreach ($available_expeditions as $expedition)
                            {{-- <!--begin::Wrapper--> --}}
                            <div class="d-flex align-items-sm-center mb-1">
                                {{-- <!--begin::Section--> --}}
                                <div class="d-flex align-items-center justify-content-center flex-row-fluid flex-wrap">
                                    <div class="flex-grow-1">
                                        <div class="row align-items-center">
                                            <div class="d-flex col-8">
                                                <div class="d-block fs-6">
                                                    <div class="fw-semibold">{{ $expedition->matiereType() }}</div>
                                                    <div class="text-gray-700 fw-bold">[{{ $expedition->matiereWeight() }}]</div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                @if ($postulant = $expedition->getPostulant($transporteur->id))
                                                    <button type="button"
                                                        class="btn btn-light-warning btn-sm btn_submit_form_cancel_postulat"
                                                        data-postulant-id="{{ $postulant->id }}">Annuler</button>
                                                @else
                                                    <button type="button"
                                                        id="btn_submit_form_postulat_{{ $loop->index + 1 }}"
                                                        class="btn btn-light-primary btn-sm btn_submit_form_postulat"
                                                        data-expedition-id="{{ $expedition->id }}"
                                                        data-transporteur-id="{{ $transporteur->id }}">Postuler</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <!--end::Section--> --}}
                            </div>
                            {{-- <!--end::Wrapper--> --}}
                            {{-- <!--begin::Timeline--> --}}
                            @include('transporteur.components.expeditions.overview.content')
                            {{-- <!--end::Timeline--> --}}
                            @if (!$loop->last)
                                {{-- <!--begin::Separator--> --}}
                                <div class="separator separator-dashed mt-4 mb-4"></div>
                                {{-- <!--end::Separator--> --}}
                            @endif
                        @endforeach
                        {{-- <!--begin::Form Postulat--> --}}
                        <form id="form_postulat" method="POST" action="{{ route('postulant.store') }}"
                            style="display: none !important;">
                            @csrf
                            <input type="hidden" name="transporteur_id" id="transporteur_id">
                            <input type="hidden" name="expedition_id" id="expedition_id">
                            <input type="hidden" name="montant_propose" id="montant_propose">
                        </form>
                        {{-- <!--end::Form Postulat--> --}}
                        {{-- <!--begin::Form Cancel Postulat--> --}}
                        <form id="form_cancel_postulat" method="POST" action="{{ route('postulant.delete') }}">
                            @csrf
                            <input type="hidden" name="postulant_id" id="postulant_id">
                        </form>
                        {{-- <!--end::Form Cancel Postulat--> --}}
                    @else
                        <p class="h5 text-center">Aucune expédition disponible</p>
                        @include('transporteur.components.expeditions.overview.default')
                    @endif
                    {{-- <!--begin::Contenu--> --}}
                </div>
                {{-- <!--end::Item--> --}}
            </div>
            {{-- <!--end::Tap pane--> --}}
            @php
                $expeditions_count = $current_expeditions->count();
                $data_text = (1 >= $expeditions_count) ? 'expédition ' : 'expéditions ';
                $data_text .= 'en cours';
            @endphp
            {{-- <!--begin::Tap pane--> --}}
            <div id="kt_tab_expeditions_en_cours" class="tab-pane fade show"
                data-text="{{ $data_text }}" data-number="{{ $expeditions_count }}">
                {{-- <!--begin::Item--> --}}
                <div class="m-0">
                    {{-- <!--begin::Contenu--> --}}
                    @if ($expeditions_count)
                        @foreach ($current_expeditions as $expedition)
                            {{-- <!--begin::Wrapper--> --}}
                            <div class="d-flex align-items-sm-center mb-1">
                                {{-- <!--begin::Section--> --}}
                                <div class="d-flex align-items-center justify-content-center flex-row-fluid flex-wrap">
                                    {{-- <div class="d-flex align-items-center flex-row-fluid flex-wrap"> --}}
                                    <div class="flex-grow-1">
                                        <div class="row align-items-center">
                                            <div class="d-flex col-8">
                                                <div class="d-block fs-6">
                                                    <div class="fw-semibold">{{ $expedition->matiereType() }}</div>
                                                    <div class="text-gray-700 fw-bold">[{{ $expedition->matiereWeight() }}]</div>
                                                </div>
                                            </div>
                                            <div class="d-flex col-4">
                                                <div class="d-block">
                                                    {{-- <span class="badge badge-lg badge-light-primary fw-bold my-2">{{ $expedition->etat->nom }}</span> --}}
                                                    {{-- <span class="pe-6">
                                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="{{ $expedition->etat->nom }}"></i>
                                                    </span> --}}
                                                    <a class="btn btn-light-primary btn-sm" href="{{ route('expedition.suivi', $expedition->id) }}">Suivi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <!--end::Section--> --}}
                            </div>
                            {{-- <!--end::Wrapper--> --}}
                            {{-- <!--begin::Timeline--> --}}
                            @include('transporteur.components.expeditions.overview.content')
                            {{-- <!--end::Timeline--> --}}
                            @if (!$loop->last)
                                {{-- <!--begin::Separator--> --}}
                                <div class="separator separator-dashed mt-4 mb-4"></div>
                                {{-- <!--end::Separator--> --}}
                            @endif
                        @endforeach
                    @else
                        <p class="h5 text-center">Aucune expédition en cours</p>
                        @include('transporteur.components.expeditions.overview.default')
                    @endif
                    {{-- <!--end::Contenu--> --}}
                </div>
                {{-- <!--end::Item--> --}}
            </div>
            {{-- <!--end::Tap pane--> --}}
            @php
                $expeditions_count = $completed_expeditions->count();
                $data_text = (1 >= $expeditions_count) ? 'expédition achevée' : 'expéditions achevées';
            @endphp
            {{-- <!--begin::Tap pane--> --}}
            <div id="kt_tab_expeditions_achevees" class="tab-pane fade show" data-text="{{ $data_text }}"
                data-number="{{ $expeditions_count }}">
                {{-- <!--begin::Item--> --}}
                <div class="m-0">
                    {{-- <!--begin::Contenu--> --}}
                    @if ($expeditions_count)
                        @foreach ($completed_expeditions as $expedition)
                            {{-- <!--begin::Wrapper--> --}}
                            <div class="d-flex align-items-sm-center mb-1">
                                {{-- <!--begin::Section--> --}}
                                <div class="d-flex align-items-center justify-content-center flex-row-fluid flex-wrap">
                                    <div class="flex-grow-1">
                                        <div class="row align-items-center">
                                            <div class="d-flex col-8">
                                                <div class="d-block fs-6">
                                                    <div class="fw-semibold">{{ $expedition->matiereType() }}</div>
                                                    <div class="text-gray-700 fw-bold">[{{ $expedition->matiereWeight() }}]</div>
                                                </div>
                                            </div>
                                            <div class="d-flex col-4">
                                                <div class="d-block">
                                                    <a class="btn btn-light-primary btn-sm" href="{{ route('expedition.infos', $expedition->id) }}">Détails</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <!--end::Section--> --}}
                            </div>
                            {{-- <!--end::Wrapper--> --}}
                            {{-- <!--begin::Timeline--> --}}
                            @include('transporteur.components.expeditions.overview.content')
                            {{-- <!--end::Timeline--> --}}
                            @if (!$loop->last)
                                {{-- <!--begin::Separator--> --}}
                                <div class="separator separator-dashed mt-4 mb-4"></div>
                                {{-- <!--end::Separator--> --}}
                            @endif
                        @endforeach
                    @else
                        <p class="h5 text-center">Aucune expédition achevée</p>
                        @include('transporteur.components.expeditions.overview.default')
                    @endif
                    {{-- <!--end::Contenu--> --}}
                </div>
                {{-- <!--end::Item--> --}}
            </div>
            {{-- <!--end::Tap pane--> --}}
        </div>
        {{-- <!--end::Tab Content--> --}}
        @php
            unset($data_text, $expeditions_count);
        @endphp
    </div>
    {{-- <!--end: Card Body--> --}}
</div>
{{-- <!--end::List widget--> --}}
