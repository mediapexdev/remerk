{{-- <!--begin::Chat drawer--> --}}
@include('components.chat-box')
{{-- <!--end::Chat drawer--> --}}

{{-- <!--begin::Scrolltop--> --}}
@include('components.navigation.top-scroller')
{{-- <!--end::Scrolltop--> --}}

<!--begin::Modals-->
@yield('component-modals')
<!--end::Modals-->

{{-- <!--begin::Scripts--> --}}
@include('transporteur.components.globals.scripts')
{{-- <!--end::Scripts--> --}}
