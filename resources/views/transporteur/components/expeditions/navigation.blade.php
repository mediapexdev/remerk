<ul id="expeditions_nav"
    class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold mb-8 mb-xl-10">
    {{--
    <!--begin::Item--> --}}
    <li class="nav-item mt-2">
        {{--
        <!--begin::Link--> --}}
        <a class="nav-link ms-0 me-10 py-5 active" href="#kt_tab_available_expeditions" data-bs-toggle="tab">Disponibles
            @if(0 !== $available_expeditions->count())
            <span class="badge badge-circle badge-primary ms-2">{{$available_expeditions->count()}}</span>
            @endif
        </a>
        {{--
        <!--end::Link--> --}}
    </li>
    {{--
    <!--end::Item--> --}}
    {{--
    <!--begin::Item--> --}}
    <li class="nav-item mt-2">
        {{--
        <!--begin::Link--> --}}
        <a class="nav-link ms-0 me-10 py-5" href="#kt_tab_expeditions_in_progress" data-bs-toggle="tab">En cours
            @if(0 !== $current_expeditions->count())
            <span class="badge badge-circle badge-light-primary ms-2">{{$current_expeditions->count()}}</span>
            @endif
        </a>
        {{--
        <!--end::Link--> --}}
    </li>
    {{--
    <!--end::Item--> --}}
    {{--
    <!--begin::Item--> --}}
    <li class="nav-item mt-2">
        {{--
        <!--begin::Link--> --}}
        <a class="nav-link ms-0 me-10 py-5" href="#kt_tab_expeditions_made" data-bs-toggle="tab">Effectuées
            @if(0 !== $completed_expeditions->count())
            <span class="m-3">
                <span
                    class="position-absolute translate-middle p-2 bg-light-primary border border-light rounded-circle d-inline">
                </span>
            </span>
            @endif
        </a>
        {{--
        <!--end::Link--> --}}
    </li>
    {{--
    <!--end::Item--> --}}
</ul>