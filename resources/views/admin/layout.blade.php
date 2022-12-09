@extends('layouts.admin')

@section('component-head')
{{-- begin::Page Custom Styles(used by this page) --}}
@yield('styles')
{{-- end::Page Custom Styles --}}
@endsection

@section('component-body')
{{-- begin::Component Body Content --}}

<noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=notFound">
</noscript>

@yield('component-body-content')

{{-- end::Component Body Content --}}
@endsection

@section('component-footer')
    {{-- <!--begin::Components--> --}}
    {{-- @include('transporteur.components.globals.components') --}}
    {{-- @include('admin.components.globals.footer') --}}
    {{-- <!--end::Components--> --}}
@endsection
