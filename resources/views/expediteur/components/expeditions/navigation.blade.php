<div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10 ms-0 me-0">
    {{-- <!--begin::Menu--> --}}
        <ul id="expeditions_nav" class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-0 fs-5 fw-semibold mb-4 mb-xl-10 me-auto m-0 min-w-100px">
            {{-- <!--begin::Item--> --}}
            <li class="col-5 nav-item mt-2 mx-0">
                {{-- <!--begin::Link--> --}}
                <a class="nav-link ms-0 me-2 py-5 active" href="#kt_tab_pending_expeditions" data-bs-toggle="tab">En attente
                    @if(0 !== $pending_expeditions->count())
                    <span class="m-4">
                        <span class="text-white position-absolute translate-middle badge rounded-pill bg-primary">
                            {{$pending_expeditions->count()}}
                        </span>
                    </span>
                    @endif
                </a>
                {{-- <!--end::Link--> --}}
            </li>
            {{-- <!--end::Item--> --}}
            {{-- <!--begin::Item--> --}}
            <li class="col-5 nav-item mt-2 m-0 ms-0">
                {{-- <!--begin::Link--> --}}
                <a class="nav-link ms-0 me-2 py-5" href="#kt_tab_expeditions_in_progress" data-bs-toggle="tab">En cours
                    @if(0 !== $current_expeditions->count())
                    <span class="m-4">
                        <span class="text-white position-absolute translate-middle badge rounded-pill bg-primary">
                            {{$current_expeditions->count()}}
                        </span>
                    </span>
                    @endif
                </a>
                {{-- <!--end::Link--> --}}
            </li>
            {{-- <!--end::Item--> --}}
            {{-- <!--begin::Item--> --}}
            <li class="col-2 nav-item mt-2 mx-0">
                {{-- <!--begin::Link--> --}}
                <a class="nav-link ms-0 me-2 py-5" href="#kt_tab_expeditions_made" data-bs-toggle="tab">Effectuées
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
