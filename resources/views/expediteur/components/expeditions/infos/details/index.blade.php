<div class="gap-7 gap-lg-10 mb-2 mb-xl-5">
    <div class="row">
        <div class="col mb-3">
            {{--
            <!--begin::Expedition details--> --}}
            @include('expediteur.components.expeditions.infos.details.details')
            {{--
            <!--end::Expedition details--> --}}
        </div>
        <div class="col mb-3">
            {{--
            <!--begin::Material details--> --}}
            @include('expediteur.components.expeditions.infos.details.matiere')
            {{--
            <!--end::Material details--> --}}
        </div>
    </div>
</div>
{{--
<!--begin::Expedition Conatcts--> --}}
<div class="gap-7 gap-lg-10">
    <div class="row">
        <div class="col mb-3">
            {{--
            <!--begin::Departure Contact--> --}}
            @include('expediteur.components.expeditions.infos.details.departure-contact')
            {{--
            <!--end::Departure Contact--> --}}
        </div>
        <div class="col">
            {{--
            <!--begin::Arrival Contact--> --}}
            @include('expediteur.components.expeditions.infos.details.arrival-contact')
            {{--
            <!--end::Arrival Contact--> --}}
        </div>
    </div>
</div>
{{--
<!--end::Expedition Contacts--> --}}