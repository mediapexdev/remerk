<div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10 ms-0 me-0">
    {{-- <!--begin::Menu--> --}}
    <ul id="expeditions_nav" class="nav nav-stretch nav-line-tabs nav-line-tabs-2x rk-nav-tabs border-transparent fs-5 fw-semibold mb-4 mb-xl-10 me-auto m-0 min-w-100px">
        {{-- <!--begin::Item--> --}}
        <li class="nav-item rk-nav-item mt-2">
            {{-- <!--begin::Link--> --}}
            <a class="nav-link rk-nav-link text-gray-700 text-active-primary ms-0 me-10 py-5 active" href="#kt_tab_pending_expeditions" data-bs-toggle="tab">
                {{-- <!--begin::Subtitle--> --}}
                <span class="tab-title rk-nav-text position-relative pt-2 pe-1 text-nowrap">En attente
                    @if(0 !== $pending_expeditions->count())
                    <span class="position-absolute top-0 start-100 translate-middle badge badge-sm badge-circle badge-light-info">{{$pending_expeditions->count()}}</span>
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
                <span class="tab-title rk-nav-text position-relative pt-2 pe-1 text-nowrap">En cours
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
                <span class="tab-title rk-nav-text position-relative pt-2 pe-1 text-nowrap">Effectuées
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
    {{-- <!--end::Menu--> --}}
    {{-- <!--begin::Button Wrapper--> --}}
    <div class="">
        {{-- <!--begin::Button--> --}}
        <a href="/expeditions/postulants" class="btn btn-primary btn-sm mb-2 mb-xl-7">Postulants</a>
        {{-- <!--end::Button--> --}}
    </div>
    {{-- <!--end::Button Wrapper--> --}}
</div>
