@php
    use App\Models\EtatExpedition;
@endphp
<!--begin::Sidebar-->
<div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
    <!--begin::Card-->
    <div class="card mb-5 mb-xl-8">
        <!--begin::Card body-->
        <div class="card-body pt-15">
            <!--begin::Summary-->
            <div class="d-flex flex-center flex-column mb-5">
                <!--begin::Avatar-->
                <div class="symbol symbol-150px symbol-circle  mb-7">
                    @if ($transporteur->hasAvatar())
                        <div class="symbol-label">
                            <img class="w-125px h-125px" src="{{ $avatar }}" alt="{{ $transporteur->fullName() }}">
                        </div>
                    @else
                        <img src={{ URL::asset('assets/media/svg/avatars/blank.svg') }} alt="avatar" />
                    @endif
                </div>
                <!--end::Avatar-->
                <!--begin::Name-->
                <a href="#"
                    class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{ $transporteur->fullName() }}</a>
                <!--end::Name-->
                <!--begin::Email-->

                <a href="#"
                    class="fs-5 fw-semibold text-muted text-hover-primary mb-6">{{ $transporteur->user->formattedPhoneNumber() }}</a>
                <!--end::Email-->
            </div>
            <!--end::Summary-->
            <!--begin::Details toggle-->
            <div class="d-flex flex-stack fs-4 py-3">
                <div class="fw-bold">Details</div>
                <!--begin::Badge-->
                <div class="badge badge-light-info d-inline">
                    Premium user
                </div>
                <!--begin::Badge-->
            </div>
            <!--end::Details toggle-->
            <div class="separator separator-dashed my-3"></div>
            <!--begin::Details content-->
            <div class="pb-5 fs-6">
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Type de compte</div>
                @if ($transporteur->hasCompany())
                    Entreprise
                @else
                    Particulier
                @endif
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Email professionnel</div>
                <div class="text-gray-600">
                    @if ($transporteur->hasEmail())
                        <a href="#" class="text-gray-600 text-hover-primary">{{ $transporteur->user->email }}</a>
                    @else
                        Aucun
                    @endif

                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Addresse</div>
                <div class="text-gray-600">
                    {{ $transporteur->adresse }}
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Site web</div>
                @if ($transporteur->hasWebsite())
                    <div class="text-gray-600">{{ $transporteur->siteweb }}</div>
                @else
                    Auncun
                @endif
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Nombre d'Expeditions</div>
                <div class="text-gray-600">
                    <span
                        class="text-gray-600 text-hover-primary">{{ $transporteur->expeditions->where('etat_expedition_id', EtatExpedition::TERMINEE)->count() }}
                        terminées</span>
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Nombre de véhicules</div>
                <div class="text-gray-600">
                    <span class="text-gray-600 text-hover-primary">{{ $transporteur->vehicules->count() }}</span>
                </div>
                <!--begin::Details item-->
            </div>
            <!--end::Details content-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Sidebar-->
