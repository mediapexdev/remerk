    {{-- <!--begin::Menu--> --}}
    <div class="menu menu-rounded h-40 menu-lg-row my-0 my-lg-0 align-items-stretch bg-light-success fixed-bottom fw-semibold px-2 px-lg-0 bottom-0 d-xxl-none border-start-3 border-end-3 rounded-3" data-kt-menu="true">
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-here-bg me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
            {{-- <!--begin:Menu link--> --}}
                <a href="/dashboard">
                    <span class="menu-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                        <span class="menu-title fs-8">Dashboard</span>
                    </span>
                </a>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-here-bg me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
            {{-- <!--begin:Menu link--> --}}
            <a href="/expeditions">
                <span class="menu-link {{ 'expeditions' == request()->path() ? 'active' : '' }}">
                    <span class="menu-title fs-8">Expéditions</span>
                </span>
            </a>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-here-bg me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
            {{-- <!--begin:Menu link--> --}}
            <a href="/vehicules">
                <span class="menu-link {{ 'vehicules' == request()->path() ? 'active' : '' }}">
                    <span class="menu-title fs-8">Véhicules</span>
                </span>
            </a>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-here-bg me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
            {{-- <!--begin:Menu link--> --}}
            <a href="{{route('facturation')}}" >
                <span class="menu-link {{ 'facturation' == request()->path() ? 'active' : '' }}">
                    <span class="menu-title fs-8">Facturation</span>
                </span>
            </a>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
            data-kt-menu-placement="bottom-start">
            {{-- <!--begin:Menu link--> --}}
            <span class="menu-link">
                <span class="menu-title fs-8">Aide</span>
            </span>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        {{-- <div class="menu-item">
            <!--begin:Menu link-->
            <a class="menu-link btn btn-sm btn-primary"
                data-bs-toggle="modal" data-bs-target="#kt_modal_create_announcement">
                <span class="menu-title text-white fs-8">Faire une annonce</span>
            </a>
            <!--end:Menu link-->
        </div> --}}
        {{-- <!--end:Menu item--> --}}
    </div>
    {{-- <!--end::Menu--> --}}
