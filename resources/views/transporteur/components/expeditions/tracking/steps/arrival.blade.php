@php
    use App\Models\EtatExpedition;

    $completed = (EtatExpedition::DECHARGE == $expedition_tracking->etat_expedition_id);
@endphp
<div class="stepper-item mx-8 my-4 {{($completed) ? 'completed' : ''}}" data-kt-stepper-element="nav" data-kt-stepper-action="step">
    <!--begin::Wrapper-->
    <div class="stepper-wrapper d-flex flex-column align-items-center">
        <!--begin::Icon-->
        <div class="stepper-icon w-40px h-40px mx-auto">
            <i class="stepper-check fas fa-check fs-2"></i>
            {{-- <span class="stepper-number">3</span> --}}
            <span class="icon-wrapper">
                <i class="fa-solid fa-truck fs-2x text-primary"></i>
            </span>
        </div>
        <!--end::Icon-->
        <!--begin::Label-->
        <div class="stepper-label align-items-center py-4">
            <!--begin::Line-->
            <div class="progress h-5px w-100px bg-light mb-2">
                <div class="progress-bar rounded h-5px" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!--end::Line-->
            <h6 class="stepper-title fs-5">Arrivée</h6>
            {{-- <div class="stepper-desc">{{ \date('d-m-Y', \strtotime($suivi_decharge->created_at)) }}</div> --}}
            <div class="stepper-desc">{{ (!isset($suivi_decharge)) ? '----------' : \date('d-m-Y', \strtotime($suivi_decharge->created_at)) }}</div>
            {{-- <div class="stepper-desc">3</div> --}}
        </div>
        <!--end::Label-->
    </div>
    <!--end::Wrapper-->
    <!--begin::Line-->
    <div class="stepper-line h-40px"></div>
    <!--end::Line-->
</div>
