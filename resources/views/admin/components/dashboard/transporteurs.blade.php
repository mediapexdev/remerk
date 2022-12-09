@php
    use App\Models\Transporteur;
    use App\Models\Expediteur;
    $transporteurs = Transporteur::get();
    $expediteurs   = Expediteur::get();
@endphp
<div class="">
    <div class="card card-flush mb-2 p-5">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column ms-10">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold me-2 lh-1 ls-n2">00{{$transporteurs->count()}}</span>
                <!--end::Amount-->
                <!--begin::Subtitle-->
                <span class="opacity-75 pt-1 fw-semibold fs-6">TRANSPORTEURS</span>
                <!--end::Subtitle-->
            </div>
            <div class="card-title d-flex flex-column me-10">
                @include('components.svg.transporteur')
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->
    </div>
    
    <div class="card card-flush mb-2 p-5">
        <!--begin::Header-->
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column ms-10">
                <!--begin::Amount-->
                <span class="fs-2hx fw-bold me-2 lh-1 ls-n2">00{{$expediteurs->count()}}</span>
                <!--end::Amount-->
                <!--begin::Subtitle-->
                <span class="opacity-75 pt-1 fw-semibold fs-6">EXPÉDITEUR</span>
                <!--end::Subtitle-->
            </div>
            <div class="card-title d-flex flex-column me-10">
                @include('components.svg.expediteur')
            </div>
            <!--end::Title-->
        </div>
        <!--end::Header-->
    </div>
</div>