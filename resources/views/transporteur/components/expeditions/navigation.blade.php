<ul id="expeditions_nav" class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-0 fs-5 fw-semibold mb-8 mb-xl-10">
    {{-- <!--begin::Item--> --}}
    <li class="nav-item mt-2">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link text-gray-700 text-gray-900-in-dark ms-0 me-10 py-5 active" href="#kt_tab_available_expeditions" data-bs-toggle="tab">Disponibles
            @if(0 !== $available_expeditions->count())
            <span class="badge badge-circle badge-light-info ms-1">{{$available_expeditions->count()}}</span>
            @endif
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Item--> --}}
    <li class="nav-item mt-2">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link text-gray-700 text-gray-900-in-dark ms-0 me-10 py-5" href="#kt_tab_expeditions_in_progress" data-bs-toggle="tab">En cours
            @if(0 !== $current_expeditions->count())
            <span class="badge badge-circle badge-light-info ms-1">{{$current_expeditions->count()}}</span>
            @endif
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
    {{-- <!--begin::Item--> --}}
    <li class="nav-item mt-2">
        {{-- <!--begin::Link--> --}}
        <a class="nav-link text-gray-700 text-gray-900-in-dark ms-0 me-10 py-5" href="#kt_tab_expeditions_made" data-bs-toggle="tab">Effectuées
            @if(0 !== $completed_expeditions->count())
            <span class="badge badge-circle badge-light-info ms-1">{{$completed_expeditions->count()}}</span>
            @endif
        </a>
        {{-- <!--end::Link--> --}}
    </li>
    {{-- <!--end::Item--> --}}
</ul>
