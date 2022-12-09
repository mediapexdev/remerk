<div class="">
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-flex flex-column justify-content-center py-5">
        {{-- <!--begin::Wrapper--> --}}
        <div class="align-items-center d-flex flex-wrap flex-stack gap-2 gap-lg-3">
            {{-- <!--begin::Toolbar--> --}}
            @include('admin.components.expediteurs.toolbar')
            {{-- <!--end::Toolbar--> --}}
        </div>
        {{-- <!--end::Wrapper--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
    {{-- <!--begin::Wrapper--> --}}
    <div class="">
        {{-- <!--begin::Table--> --}}
        @include('admin.components.expediteurs.table')
        {{-- <!--end::Table--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
</div>
