@section('styles')
    {{-- <!--begin::Vendors Css(used by this page)--> --}}
    @include('components.styles')
    <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/account.css')}}">
    {{-- <!--end::Vendors Css--> --}}
    {{-- <!--begin::Custom Css(used by this page)--> --}}
    @yield('custom-css')
    {{-- <!--end::Custom Css--> --}}
@endsection
