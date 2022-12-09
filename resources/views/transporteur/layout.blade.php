@php
    $body_classes = "app-default";
@endphp

@extends('layouts.app')

@section('component-head')
    @section('styles')
    @include('components.styles')
    <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/account.css')}}">
    @endsection
@endsection

@section('component-header')
    {{-- <!--begin::Header--> --}}
    @include('transporteur.components.globals.header')
    {{-- <!--end::Header--> --}}
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
    {{-- <!--begin::Components--> --}}
    @include('transporteur.components.globals.components')
    {{-- <!--end::Components--> --}}
    {{-- begin::Component Footer Content --}}
    @yield('component-footer-content')
    {{-- end::Component Footer Content --}}
@endsection
