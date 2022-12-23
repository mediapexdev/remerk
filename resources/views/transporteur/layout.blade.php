@php
$body_classes = "app-default";
@endphp

@extends('layouts.app')

@section('component-head')
@include('transporteur.components.globals.styles')
@endsection

@section('component-header')
{{--
<!--begin::Header--> --}}
@include('transporteur.components.globals.header')
@include('transporteur.components.globals.mobileMenu')
{{--
<!--end::Header--> --}}
@endsection

@section('component-body')
<noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=notFound">
</noscript>
{{-- begin::Component Body Content --}}
@yield('component-body-content')
{{-- end::Component Body Content --}}
@endsection

@section('component-footer')
{{-- begin::Mobile Menu--}}
{{-- end::Mobile Menu--}}
{{-- begin::Component Footer Content --}}
@yield('component-footer-content')
{{-- end::Component Footer Content --}}
{{--<!--begin::Components--> --}}
@include('transporteur.components.globals.components')
{{--<!--end::Components--> --}}
@endsection