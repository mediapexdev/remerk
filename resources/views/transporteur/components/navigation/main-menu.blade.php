{{-- <!--begin::Menu wrapper--> --}}
<div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
    data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
    data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
    data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
    {{-- <!--begin::Menu--> --}}
    <div id="kt_app_header_menu" class="menu menu-rounded menu-column menu-lg-row my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" data-kt-menu="true">
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-here-bg me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
            {{-- <!--begin:Menu link--> --}}
                <a href="/dashboard">
                    <span class="menu-link {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                        <span class="menu-title">Dashboard</span>
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
                    <span class="menu-title">Expéditions</span>
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
                    <span class="menu-title">Véhicules</span>
                </span>
            </a>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item menu-lg-down-accordion menu-here-bg me-0 me-lg-2"
            data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
            <!--begin:Menu link-->
            <a href="/factures" >
                <span class="menu-link {{ 'factures' == request()->path() ? 'active' : '' }}">
                    <span class="menu-title">Facturation</span>
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
                <span class="menu-title">Aide</span>
            </span>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
        {{-- <!--begin:Menu item--> --}}
        <div class="menu-item">
            {{-- <!--begin:Menu link--> --}}
            <a class="menu-link rk-special-menu-link btn btn-sm btn-light-primary btn-active-light-primary"
                data-bs-toggle="modal" data-bs-target="#kt_modal_create_announcement">
                <span class="menu-title">Faire une annonce</span>
            </a>
            {{-- <!--end:Menu link--> --}}
        </div>
        {{-- <!--end:Menu item--> --}}
    </div>
    {{-- <!--end::Menu--> --}}
</div>
{{-- <!--end::Menu wrapper--> --}}
