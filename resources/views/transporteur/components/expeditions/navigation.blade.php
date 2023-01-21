<ul id="expeditions_nav" class="nav nav-stretch nav-line-tabs nav-line-tabs-2x rk-nav-tabs border-transparent fs-5 fw-semibold mb-8 mb-xl-10">
    {{-- <!--begin::Item--> --}}
    <li class="nav-item rk-nav-item mt-2">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link rk-nav-link text-gray-700 text-active-primary ms-0 me-10 py-5 active" href="#kt_tab_available_expeditions" data-bs-toggle="tab">
            {{-- <!--begin::Subtitle--> --}}
            <span class="tab-title rk-nav-text position-relative pt-2 pe-1">
                <span class="text-nowrap">Disponibles</span>
                @if(0 !== $available_expeditions->count())
                <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$available_expeditions->count()}}</span>
                @endif
            </span>
            {{-- <!--end::Subtitle--> --}}
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Item--> --}}
    <li class="nav-item rk-nav-item mt-2">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link rk-nav-link text-gray-700 text-active-primary ms-0 me-10 py-5" href="#kt_tab_expeditions_in_progress" data-bs-toggle="tab">
            {{-- <!--begin::Subtitle--> --}}
            <span class="tab-title rk-nav-text position-relative pt-2 pe-1">
                <span class="text-nowrap">En cours</span>
                @if(0 !== $current_expeditions->count())
                <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$current_expeditions->count()}}</span>
                @endif
            </span>
            {{-- <!--end::Subtitle--> --}}
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Item--> --}}
    <li class="nav-item rk-nav-item mt-2">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link rk-nav-link text-gray-700 text-active-primary ms-0 me-10 py-5" href="#kt_tab_expeditions_made" data-bs-toggle="tab">
            {{-- <!--begin::Subtitle--> --}}
            <span class="tab-title rk-nav-text position-relative pt-2 pe-1">
                <span class="text-nowrap">Effectuées</span>
                @if(0 !== $completed_expeditions->count())
                <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$completed_expeditions->count()}}</span>
                @endif
            </span>
            {{-- <!--end::Subtitle--> --}}
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
</ul>
