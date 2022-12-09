@props(['message'])

@php
    $message = Session::get('message');
    $message_type = (Session::has('message_type')) ? Session::get('message_type') : 'info';
@endphp
@if ($message)
    <div {{ $attributes }}>
        <div class="alert alert-{{$message_type}} alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
