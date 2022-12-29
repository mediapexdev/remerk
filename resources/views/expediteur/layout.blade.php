@php
    $body_classes = "app-default";
@endphp

@extends('layouts.app')

@section('component-head')
    @include('expediteur.components.globals.styles')
@endsection

@section('component-header')
    {{-- <!--begin::Header--> --}}
    @include('expediteur.components.globals.header')
    {{-- <!--end::Header--> --}}
    {{-- begin::Mobile Menu--}}
    @include('expediteur.components.globals.mobileMenu')
    {{-- end::Mobile Menu--}}
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
    {{-- <!--begin::Footer--> --}}
    @include('expediteur.components.globals.footer')
    {{-- <!--end::Footer--> --}}
    {{-- begin::Component Footer Content --}}
    @yield('component-footer-content')
    {{-- end::Component Footer Content --}}
    {{-- <!--begin::Components--> --}}
    @include('expediteur.components.globals.components')
    {{-- <!--end::Components--> --}}
@endsection
