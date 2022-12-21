<ul id="expeditions_overview_nav" class="nav nav-pills nav-pills-custom item position-relative mx-9 mb-9">
    {{--
    <!--begin::Item--> --}}
    <li class="nav-item col-4 mx-0 p-0">
        {{--
        <!--begin::Link--> --}}
        <a class="nav-link active d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill"
            href="#kt_tab_expeditions_en_attente">
            {{--
            <!--begin::Subtitle--> --}}
            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                En attente
                @if(0 !== $pending_expeditions->count())
                <span class="m-2">
                    <span class="position-absolute p-2 bg-primary border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </span>
                @endif
                {{--
                <!--end::Subtitle--> --}}
                {{--
                <!--begin::Bullet--> --}}
                <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
                {{--
                <!--end::Bullet--> --}}
        </a>
        {{--
        <!--end::Link--> --}}
    </li>
    {{--
    <!--end::Item--> --}}
    {{--
    <!--begin::Item--> --}}
    <li class="nav-item col-4 mx-0 px-0">
        {{--
        <!--begin::Link--> --}}
        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill"
            href="#kt_tab_expeditions_en_cours">
            {{--
            <!--begin::Subtitle--> --}}
            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">
                En cours 
                @if(0 !== $current_expeditions->count())
                <span class="m-2">
                    <span class="position-absolute p-2 bg-primary border border-light rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </span>
                @endif
            </span>
            {{--
            <!--end::Subtitle--> --}}
            {{--
            <!--begin::Bullet--> --}}
            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
            {{--
            <!--end::Bullet--> --}}
        </a>
        {{--
        <!--end::Link--> --}}
    </li>
    {{--
    <!--end::Item--> --}}
    {{--
    <!--begin::Item--> --}}
    <li class="nav-item col-4 mx-0 px-0">
        {{--
        <!--begin::Link--> --}}
        <a class="nav-link d-flex justify-content-center w-100 border-0 h-100" data-bs-toggle="pill"
            href="#kt_tab_expeditions_achevees">
            {{--
            <!--begin::Subtitle--> --}}
            <span class="nav-text text-gray-800 fw-bold fs-6 mb-3">Achevées</span>
            {{--
            <!--end::Subtitle--> --}}
            {{--
            <!--begin::Bullet--> --}}
            <span class="bullet-custom position-absolute z-index-2 bottom-0 w-100 h-4px bg-primary rounded"></span>
            {{--
            <!--end::Bullet--> --}}
        </a>
        {{--
        <!--end::Link--> --}}
    </li>
    {{--
    <!--end::Item--> --}}
    {{--
    <!--begin::Bullet--> --}}
    <span class="position-absolute z-index-1 bottom-0 w-100 h-4px bg-light rounded"></span>
    {{--
    <!--end::Bullet--> --}}
</ul>