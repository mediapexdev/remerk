{{-- <!--begin::Chat drawer--> --}}
@include('components.chat-box')
{{-- <!--end::Chat drawer--> --}}

{{-- <!--begin::Scrolltop--> --}}
@include('components.navigation.top-scroller')
{{-- <!--end::Scrolltop--> --}}

{{-- <!--begin::Modals--> --}}
    {{-- <!--begin::Modal - Expedition--> --}}
    @include('expediteur.components.modals.create-expedition')
    {{-- <!--end::Modal - Expedition--> --}}
    @yield('component-modals')
{{-- <!--end::Modals--> --}}

{{-- <!--begin::Footer--> --}}
@include('expediteur.components.globals.footer')
<!--end::Footer-->

{{-- <!--begin::Scripts--> --}}
@include('expediteur.components.globals.scripts')
{{-- <!--end::Scripts--> --}}
