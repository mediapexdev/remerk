@php
use App\Models\Expedition;
use App\Models\EtatExpedition;

$expeditions = Expedition::get();
$pending     = Expedition::whereIn('etat_expedition_id',
[
    EtatExpedition::EN_ATTENTE,
    EtatExpedition::EN_ATTENTE_DE_PAIEMENT
])->count();
$progress    = Expedition::whereIn('etat_expedition_id',
[
    EtatExpedition::EN_ATTENTE_DE_CHARGEMENT,
    EtatExpedition::CHARGE,
    EtatExpedition::EN_TRANSIT,
    EtatExpedition::DECHARGE
])->count(); 
$ended       = Expedition::where(['etat_expedition_id' => EtatExpedition::TERMINEE ])->count();

@endphp
<!--begin::Card widget 20-->
<a href={{ route('expeditions') }}>
<div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end h-md-50 mb-5 mb-xl-10 cursor-pointer"
    style="background-color: #F1416C;background-image:url('assets/media/patterns/vector-1.png')">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <div class="card-title d-flex flex-column">
            <!--begin::Amount-->
            <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2">00{{$expeditions->count()}}</span>
            <!--end::Amount-->
            <!--begin::Subtitle-->
            <span class="text-white opacity-75 pt-1 fw-semibold fs-6">ÉXPEDITIONS</span>
            <!--end::Subtitle-->
        </div>
        <!--end::Title-->
    </div>
    <!--end::Header-->
    <!--begin::Card body-->
    <div class="card-body d-flex align-items-end pt-0">
        <!--begin::Progress-->
        <div class="d-flex flex-column content-justify-center flex-row-fluid ps-20 pe-20">
            <!--begin::Label-->
            <div class="d-flex fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-15px h-3px rounded-2 bg-warning me-3"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="flex-grow-1 fs-3 text-white">En attentes</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-bolder fs-3 text-white">00{{$pending}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
            <!--begin::Label-->
            <div class="d-flex fw-semibold align-items-center my-3">
                <!--begin::Bullet-->
                <div class="bullet w-15px h-3px rounded-2 bg-success me-3"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="flex-grow-1 fs-3 text-white">En cours</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-bolder fs-3 text-white">00{{$progress}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
            <!--begin::Label-->
            <div class="d-flex fw-semibold align-items-center">
                <!--begin::Bullet-->
                <div class="bullet w-15px h-3px rounded-2 me-3 bg-white"></div>
                <!--end::Bullet-->
                <!--begin::Label-->
                <div class="flex-grow-1 fs-3 text-white">Terminées</div>
                <!--end::Label-->
                <!--begin::Stats-->
                <div class="fw-bolder fs-3 text-white">00{{$ended}}</div>
                <!--end::Stats-->
            </div>
            <!--end::Label-->
        </div>
        <!--end::Progress-->
    </div>
    <!--end::Card body-->
</div>
</a>
<!--end::Card widget 20-->