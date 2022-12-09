<div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10 mb-5 mb-xl-10">
    {{-- <!--begin::Expedition details--> --}}
    @include('transporteur.components.expeditions.infos.details.details')
    {{-- <!--end::Expedition details--> --}}
    {{-- <!--begin::Material details--> --}}
    @include('transporteur.components.expeditions.infos.details.matiere')
    {{-- <!--end::Material details--> --}}
</div>
{{-- <!--begin::Expedition Conatcts--> --}}
<div class="d-flex flex-column gap-7 gap-lg-10">
    <div class="d-flex flex-column flex-xl-row gap-7 gap-lg-10">
        {{-- <!--begin::Departure Contact--> --}}
        @include('transporteur.components.expeditions.infos.details.departure-contact')
        {{-- <!--end::Departure Contact--> --}}
        {{-- <!--begin::Arrival Contact--> --}}
        @include('transporteur.components.expeditions.infos.details.arrival-contact')
        {{-- <!--end::Arrival Contact--> --}}
    </div>
</div>
{{-- <!--end::Expedition Contacts--> --}}
