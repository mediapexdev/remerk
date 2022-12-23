@php
    use App\Models\EtatExpedition;

    $aria_valuenow = 0;
    $status_class = null;

    switch($expedition->etat_expedition_id) {
        case EtatExpedition::EN_ATTENTE_DE_CHARGEMENT:
            $aria_valuenow = 50;
            $status_class = 'current';
            break;
        case EtatExpedition::CHARGE:
        case EtatExpedition::EN_TRANSIT:
        case EtatExpedition::EN_ATTENTE_DE_DECHARGEMENT:
        case EtatExpedition::DECHARGE:
        case EtatExpedition::TERMINEE:
            $aria_valuenow = 100;
            $status_class = 'completed';
            break;
        default:
        break;
    }
@endphp
<!--begin::Stepper-->
<div class="stepper-item mx-8 my-4 {{$status_class}}" data-kt-stepper-element="nav">
    <!--begin::Wrapper-->
    <div class="stepper-wrapper d-flex flex-column align-items-center">
        <!--begin::Icon-->
        <div class="stepper-icon w-40px h-40px mx-auto">
            <i class="stepper-check fas fa-check fs-2"></i>
            <span class="icon-wrapper">
                <i class="icon fa-solid fa-people-carry-box fs-2x"></i>
            </span>
        </div>
        <!--end::Icon-->
        <!--begin::Label-->
        <div class="stepper-label align-items-center py-4">
            <h6 class="stepper-title fs-5">Chargement</h6>
            <div class="stepper-desc">{{ (!isset($expedition_tracking) || !isset($expedition_tracking->date_chargement)) ? '----------' : \date('d-m-Y', \strtotime($expedition_tracking->date_chargement)) }}</div>
        </div>
        <!--end::Label-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Stepper-->
<!--begin::Line-->
{{-- <div class="progress-wrapper d-flex align-items-center justify-content-center mb-4">
    <div class="progress {{$status_class}} h-2px w-100px bg-secondary">
        <div class="progress-bar {{$status_class}} rounded h-100" role="progressbar" aria-valuenow="{{$aria_valuenow}}" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div> --}}
{{-- <hr class="line {{$status_class}} w-lg-125px w-100"> --}}
<hr class="line {{$status_class}} w-lg-100px w-sm-50px">
<!--end::Line-->
