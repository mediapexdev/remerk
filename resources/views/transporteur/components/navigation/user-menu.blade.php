<div id="kt_header_user_menu_toggle" class="app-navbar-item ms-1 ms-lg-3">
    @php
        use App\Core\Util;

        $has_avatar = Auth::user()->hasAvatar();
        $avatar = (($has_avatar) ? Auth::user()->avatar : Util::getDefaultUserAvatar());
    @endphp
    {{-- <!--begin::Menu Toggle--> --}}
    <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <img src="{{$avatar}}" alt="Avatar" title="Avatar">
    </div>
    {{-- <!--end::Menu Toggle--> --}}
    {{-- <!--begin::User account menu--> --}}
    <div id="user_account_menu" class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold fs-6 w-275px"
        data-kt-menu="true">
        {{-- <!--begin::Menu item--> --}}
        <div class="menu-item py-0">
            {{-- <!--begin::Menu link--> --}}
            <a class="menu-link px-5 py-3" href="/account">
                {{-- <!--begin::Menu Content--> --}}
                <div class="menu-content d-flex align-items-center justify-content-center px-3">
                    {{-- <!--begin::Avatar--> --}}
                    <div class="symbol symbol-50px me-5">
                        <img src="{{$avatar}}" alt="Avatar" title="Avatar">
                    </div>
                    {{-- <!--end::Avatar--> --}}
                    {{-- <!--begin::Username--> --}}
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">{{Auth::user()->fullName()}}</div>
                        <div class="fw-semibold text-muted fs-7">{{Auth::user()->formattedPhoneNumber()}}</div>
                    </div>
                    {{-- <!--end::Username--> --}}
                </div>
                {{-- <!--end::Menu Content--> --}}
            </a>
            {{-- <!--end::Menu link--> --}}
        </div>
        {{-- <!--end::Menu item--> --}}
        {{-- <!--begin::Menu separator--> --}}
        <div class="separator"></div>
        {{-- <!--end::Menu separator--> --}}
        {{-- <!--begin::Menu item--> --}}
        <div class="menu-item py-0" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start">
            <a href="#" class="menu-link px-5 py-3">
                <span class="menu-title position-relative">
                    <span>Langue</span>
                    <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">
                        <span>Français</span>
                        <img class="w-15px h-15px rounded-1 ms-2" src="{{URL::asset('assets/media/flags/france.svg')}}" alt="Français" title="Français">
                    </span>
                </span>
            </a>
            {{-- <!--begin::Menu sub--> --}}
            @include('components.menu-language')
            {{-- <!--end::Menu sub--> --}}
        </div>
        {{-- <!--end::Menu item--> --}}
        {{-- <!--begin::Menu separator--> --}}
        <div class="separator"></div>
        {{-- <!--end::Menu separator--> --}}
        {{-- <!--begin::Menu item--> --}}
        <div class="menu-item py-0">
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
                @csrf
            </form>
            <a class="menu-link px-5 py-3" onclick="document.querySelector('#logout-form').submit();">Se deconnecter</a>
        </div>
        {{-- <!--end::Menu item--> --}}
    </div>
    {{-- <!--end::User account menu--> --}}
    {{-- <!--end::Menu wrapper--> --}}
</div>
