<div class="d-block">
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-flex flex-column justify-content-center py-5">
        {{-- <!--begin::Wrapper--> --}}
        <div class="align-items-center d-flex flex-wrap flex-stack gap-2 gap-lg-3">
            {{-- <!--begin::Toolbar--> --}}
            @include('expediteur.components.expeditions.made.toolbar')
            {{-- <!--end::Toolbar--> --}}
        </div>
        {{-- <!--end::Wrapper--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-block">
        {{-- <!--begin::Table--> --}}
        @include('expediteur.components.expeditions.made.table')
        {{-- <!--end::Table--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
</div>
