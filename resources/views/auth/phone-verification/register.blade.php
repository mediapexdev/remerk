@php
    $route = route('register');
@endphp
@extends('auth.phone-verification.layout')

@section('hidden-inputs')
<input type="hidden" name="token" value="{{ $token }}" />
@endsection

