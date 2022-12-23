@php
    use App\Models\EtatExpedition;

    $status_class = null;

    switch($expedition->etat_expedition_id) {
        case EtatExpedition::DECHARGE:
            $status_class = 'current';
            break;
        case EtatExpedition::TERMINEE:
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
            {{-- <span class="stepper-number">4</span> --}}
            <span class="icon-wrapper">
                <i class="icon fa-solid fa-clipboard-check fs-2x"></i>
            </span>
        </div>
        <!--end::Icon-->
        <!--begin::Label-->
        <div class="stepper-label align-items-center py-4">
            <h6 class="stepper-title fs-5">Livré</h6>
            <div class="stepper-desc">{{ (!isset($expedition_tracking) || !isset($expedition_tracking->date_livraison)) ? '----------' : \date('d-m-Y', \strtotime($expedition_tracking->date_livraison)) }}</div>
        </div>
        <!--end::Label-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::Stepper-->
