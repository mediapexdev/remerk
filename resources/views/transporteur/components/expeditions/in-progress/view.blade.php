<div class="d-block">
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-flex flex-column justify-content-center py-5">
        {{-- <!--begin::Wrapper--> --}}
        <div class="align-items-center d-flex flex-wrap flex-stack gap-2 gap-lg-3">
            {{-- <!--begin::Toolbar--> --}}
            @include('transporteur.components.expeditions.in-progress.toolbar')
            {{-- <!--end::Toolbar--> --}}
        </div>
        {{-- <!--end::Wrapper--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-lock">
        {{-- <!--begin::Table--> --}}
        @include('transporteur.components.expeditions.in-progress.table')
        {{-- <!--end::Table--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
    {{-- <!--begin::Notice--> --}}
    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6 mt-5 mt-xl-10">
        {{-- <!--begin::Icon--> --}}
        {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg--> --}}
        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
            </svg>
        </span>
        {{-- <!--end::Svg Icon--> --}}
        {{-- <!--end::Icon--> --}}
        {{-- <!--begin::Wrapper--> --}}
        <div class="d-flex flex-stack flex-grow-1">
            {{-- <!--begin::Content--> --}}
            <div class="fw-semibold">
                <h4 class="text-gray-900 fw-bold">Nous avons besoin de votre attention !</h4>
                <div class="fs-6 text-gray-700">
                    <span>À ce niveau pour annuler une expédition, veuillez</span>
                    <a class="fw-bold">nous contacter</a>.
                </div>
            </div>
            {{-- <!--end::Content--> --}}
        </div>
        {{-- <!--end::Wrapper--> --}}
    </div>
    {{-- <!--end::Notice--> --}}
</div>
