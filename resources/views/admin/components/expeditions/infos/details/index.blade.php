<div class="gap-7 gap-lg-10 mb-2 mb-xl-5">
    <div class="row">
        <div class="col-6">
            {{--
            <!--begin::Expedition details--> --}}
            @include('admin.components.expeditions.infos.details.details')
            {{--
            <!--end::Expedition details--> --}}
        </div>
        <div class="col-6">
            {{--
            <!--begin::Material details--> --}}
            @include('admin.components.expeditions.infos.details.matiere')
            {{--
            <!--end::Material details--> --}}
        </div>
    </div>
</div>
{{--
<!--begin::Expedition Conatcts--> --}}
<div class="gap-7 gap-lg-10">
    <div class="row">
        <div class="col-6">
            {{--
            <!--begin::Departure Contact--> --}}
            @include('admin.components.expeditions.infos.details.departure-contact')
            {{--
            <!--end::Departure Contact--> --}}
        </div>
        <div class="col-6">
            {{--
            <!--begin::Arrival Contact--> --}}
            @include('admin.components.expeditions.infos.details.arrival-contact')
            {{--
            <!--end::Arrival Contact--> --}}
        </div>
    </div>
</div>
{{--
<!--end::Expedition Contacts--> --}}