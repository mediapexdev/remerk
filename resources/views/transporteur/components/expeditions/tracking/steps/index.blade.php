@php
    use App\Models\EtatExpedition;

    $etat_expedition_text = null;
    $tracking_started = false;
    $expedition_completed = false;
    $etat_expedition_id = EtatExpedition::EN_ATTENTE_DE_CHARGEMENT;

    switch($expedition->etat_expedition_id) {
        case EtatExpedition::EN_ATTENTE_DE_CHARGEMENT:
            $tracking_started = true;
            $etat_expedition_text = 'le chargement';
            $etat_expedition_id = EtatExpedition::CHARGE;
            break;
        case EtatExpedition::CHARGE:
            $tracking_started = true;
            $etat_expedition_text = 'le départ';
            $etat_expedition_id = EtatExpedition::EN_TRANSIT;
            break;
        case EtatExpedition::EN_TRANSIT:
            $tracking_started = true;
            $etat_expedition_text = "l'arrivée";
            $etat_expedition_id = EtatExpedition::EN_ATTENTE_DE_DECHARGEMENT;
            break;
        case EtatExpedition::EN_ATTENTE_DE_DECHARGEMENT:
            $tracking_started = true;
            $etat_expedition_text = 'le déchargement';
            $etat_expedition_id = EtatExpedition::DECHARGE;
            break;
        case EtatExpedition::DECHARGE:
            $tracking_started = true;
            $etat_expedition_text = 'la livraison';
            $etat_expedition_id = EtatExpedition::TERMINEE;
            break;
        case EtatExpedition::TERMINEE:
            $tracking_started = true;
            $expedition_completed = true;
            $etat_expedition_id = null;
            break;
        default:
        break;
    }
@endphp
<div class="card card-flush py-4 flex-row-fluid">
    {{-- <!--begin::Card header--> --}}
    <div class="card-header">
        {{-- <!--begin::Card Title--> --}}
        <div class="card-title">
            <h3>Suivi de l'expédition</h3>
        </div>
        {{-- <!--end::Card Title--> --}}
    </div>
    {{-- <!--end::Card header--> --}}
    {{-- <!--begin::Card body--> --}}
    <div class="card-body pt-0">
        @if($tracking_started)
        <!--begin::Stepper-->
        <div id="kt_stepper_expedition_tracking" class="stepper stepper-pills">
            <!--begin::Nav-->
            <div class="stepper-nav flex-center flex-wrap mb-10">
                <!--begin::Step 1-->
                @include('transporteur.components.expeditions.tracking.steps.loading')
                <!--end::Step 1-->
                <!--begin::Step 2-->
                {{-- @include('transporteur.components.expeditions.tracking.steps.departure') --}}
                <!--end::Step 2-->
                <!--begin::Step 3-->
                @include('transporteur.components.expeditions.tracking.steps.transit')
                <!--end::Step 3-->
                <!--begin::Step 4-->
                {{-- @include('transporteur.components.expeditions.tracking.steps.arrival') --}}
                <!--end::Step 4-->        
                <!--begin::Step 5-->
                @include('transporteur.components.expeditions.tracking.steps.unloading')
                <!--end::Step 5-->
                <!--begin::Step 6-->
                @include('transporteur.components.expeditions.tracking.steps.finalization')
                <!--end::Step 6-->
            </div>
            <!--end::Nav-->
            <div class="d-flex flex-center">
                <div class="h-200px w-600px bg-light">
                    <img
                    src="{{URL::asset('assets/media/illustrations/other/4811-resized.jpg')}}"
                    {{-- src="{{URL::asset('assets/media/illustrations/other/4c75f379-dc5a-4d0a-9b21-7075d3e0130a.png')}}" --}}
                    {{-- src="{{URL::asset('assets/media/illustrations/other/4818.jpg')}}" --}}
                    {{-- src="{{URL::asset('assets/media/illustrations/other/fablab-mobile-resized.png')}}" --}}
                    {{-- data-src="assets/media/illustrations/other/4811.jpg" --}}
                    class="lozad rounded mw-100"
                    alt="illustration">
                </div>
            </div>
        </div>
        <!--end::Stepper-->
        @else
        {{-- <!--begin::Notice--> --}}
        <div class="notice d-flex bg-light-info rounded border-info border border-dashed p-6">
            {{-- <!--begin::Icon--> --}}
            {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg--> --}}
            <span class="svg-icon svg-icon-2tx svg-icon-info me-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                </svg>
            </span>
            {{-- <!--end::Svg Icon--> --}}
            {{-- <!--end::Icon--> --}}
            {{-- <!--begin::Wrapper--> --}}
            <div class="d-flex flex-stack flex-grow-1">
                {{-- <!--begin::Content--> --}}
                <div class="fs-4 fw-bold text-gray-800">L'expédition n'a pas encore débuté.</div>
                {{-- <!--end::Content--> --}}
            </div>
            {{-- <!--end::Wrapper--> --}}
        </div>
        {{-- <!--end::Notice--> --}}
        @endif
    </div>
    {{-- <!--end::Card body--> --}}
    @if(!$expedition_completed && $tracking_started)
    <!--begin::Card footer-->
    <div class="card-footer pt-0">
        <!--begin::Form-->
        <form id="kt_stepper_tracking_form" class="form mx-auto w-lg-250px" novalidate="novalidate">
            <!--begin::Wrapper-->
            <div class="d-flex">
                <!--begin::Actions-->
                <button type="button" id="btn_action_tracking" class="btn btn-success w-100"
                    data-expedition-id="{{$expedition->id}}" data-expedition-etat-id="{{$etat_expedition_id}}"
                    data-expedition-etat-text="{{$etat_expedition_text}}">Confirmer {{$etat_expedition_text}}</button>
                <!--end::Actions-->
            </div>
            <!--end::Wrapper-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card footer-->
    @endif
</div>
