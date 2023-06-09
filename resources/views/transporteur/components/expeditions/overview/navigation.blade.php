<ul id="expeditions_overview_nav" class="nav nav-pills nav-pills-custom rk-nav-pills item position-relative mx-9 mb-9">
    {{-- <!--begin::Item--> --}}
    <li class="nav-item rk-nav-item col-4 mx-0 p-0">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link rk-nav-link text-gray-700 text-active-primary active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_tab_expeditions_disponibles">
            {{-- <!--begin::Subtitle--> --}}
            <span class="tab-title rk-nav-text fw-bold fw-medium-on-dark fs-6 mb-3 position-relative pt-2 pe-1">
                <span class="text-nowrap">Disponibles</span>
                @if(0 !== $available_expeditions->count())
                <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$available_expeditions->count()}}</span>
                @endif
            </span>
            {{-- <!--end::Subtitle--> --}}
            {{-- <!--begin::Bullet--> --}}
            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
            {{-- <!--end::Bullet--> --}}
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Item--> --}}
    <li class="nav-item rk-nav-item col-4 mx-0 px-0">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link rk-nav-link text-gray-700 text-active-primary d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_tab_expeditions_en_cours">
            {{-- <!--begin::Subtitle--> --}}
            <span class="tab-title rk-nav-text fw-bold fw-medium-on-dark fs-6 mb-3 position-relative pt-2 pe-1">
                <span class="text-nowrap">En cours</span>
                @if(0 !== $current_expeditions->count())
                <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$current_expeditions->count()}}</span>
                @endif
            </span>
            {{-- <!--end::Subtitle--> --}}
            {{-- <!--begin::Bullet--> --}}
            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
            {{-- <!--end::Bullet--> --}}
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Item--> --}}
    <li class="nav-item rk-nav-item col-4 mx-0 px-0">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link rk-nav-link text-gray-700 text-active-primary d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill" href="#kt_tab_expeditions_achevees">
            {{-- <!--begin::Subtitle--> --}}
            <span class="tab-title rk-nav-text fw-bold fw-medium-on-dark fs-6 mb-3 position-relative pt-2 pe-1">
                <span class="text-nowrap">Achevées</span>
                @if(0 !== $completed_expeditions->count())
                <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$completed_expeditions->count()}}</span>
                @endif
            </span>
            {{-- <!--end::Subtitle--> --}}
            {{-- <!--begin::Bullet--> --}}
            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
            {{-- <!--end::Bullet--> --}}
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Bullet--> --}}
    <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
    {{-- <!--end::Bullet--> --}}
</ul>
