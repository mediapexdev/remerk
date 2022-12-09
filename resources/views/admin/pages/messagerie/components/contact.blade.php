@extends('admin.layout')

@php
use App\Models\User;
use App\Models\Transporteur;
use App\Models\Expediteur;
use App\Models\Reponse;
$users = User::all();
$transporteurs = Transporteur::all();
$expediteurs = Expediteur::all();
$messages = Reponse::orderBy('created_at', 'ASC')->get();
@endphp


@section('styles')
<style>
    .card{{Auth::user()->id}}

        {
        display: none !important;
    }
</style>
@endsection

@section('title')
    <title>Messagerie - Remërk</title>
@endsection

@section('component-body-content')

<!--begin::Contacts-->
<div class="row g-6 g-xl-9">
    <!--begin::search-->
    <div>
        <input class="form-control mr-sm-2" id="myInput" type="search" placeholder="Search" aria-label="Search"
    autocomplete="off">
    </div>
    <!--end::search-->
    @foreach ($users as $user)
    <!--begin::Col-->
    <div class="col-md-4 col-xxl-4 card{{ $user->id }}">
        <!--begin::Card-->
        <div class="card">
            <!--begin::Card body-->
            <div class="card-body d-flex flex-center flex-column p-9">
                <!--begin::Wrapper-->
                <div class="mb-5">
                    @if (empty($user->avatar))
                    <div class="symbol symbol-75px symbol-circle">
                        <img alt="absent" src="{{ URL::asset('assets/images/images.png') }}" />
                    </div>
                    @else
                    <div class="symbol symbol-75px symbol-circle">
                        <img alt="absent" src="{{ $user->avatar }}" />
                    </div>
                    @endif
                    <!--begin::Avatar-->

                    <!--end::Avatar-->
                </div>
                <!--end::Wrapper-->
                <!--begin::Name-->
                <a href="#" class="fs-4 text-gray-800 text-hover-primary fw-bold mb-0">{{
                    $user->prenom }}
                    {{ $user->nom }}</a>
                <!--end::Name-->
                <!--begin::Position-->
                <div class="fw-semibold text-gray-400 mb-0">
                    {{ $user->role()->first()->role }}
                </div>
                <div class="fw-semibold text-gray-400 mb-6">
                    @if ($user->last_login_at == 0)
                    pas encore connecté
                    @else
                    était en ligne
                    {{
                    Carbon\Carbon::parse($user->last_login_at)->diffForHumans()
                    }}
                    @endif
                </div>
                <!--end::Position-->
                <!--begin::Info-->
                <div class="d-flex flex-center flex-wrap mb-5">
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mx-3 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">$14,560
                        </div>
                        <div class="fw-semibold text-gray-400">Avg. Earnings
                        </div>
                    </div>
                    <!--end::Stats-->
                    <!--begin::Stats-->
                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 mx-3 px-4 mb-3">
                        <div class="fs-6 fw-bold text-gray-700">$236,400
                        </div>
                        <div class="fw-semibold text-gray-400">Total Sales
                        </div>
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
                <!--begin::Link-->
                <div>
                    <button class="btn btn-sm btn-light-primary fw-bold m-1" data-kt-drawer-show="true"
                        data-kt-drawer-target="#kt_drawer_chat{{ $user->id }}"><i
                            class="bi bi-chat-right-dots-fill fs-2 p-0">

                            {{-- @if(Carbon\Carbon::parse($user->last_login_at >
                            Carbon\Carbon::parse(Auth::user()->last_login_at)))
                            @foreach ($messages as $message)

                            @if ($message->user_id == $user->id)
                            <span>{{$message->count()}}</span>

                            @else
                            <span>0</span>
                            @endif
                            @endforeach
                            @endif --}}

                        </i>


                        <span class="sr-only">unread messages</span>
                        <a href="https://wa.me/{{ $user->phone }}" target="blank"> <button
                                class="btn btn-sm btn-light-success fw-bold m-1">
                                <i class="bi bi-whatsapp fs-2 p-0"></i>
                        </a>

                        {{-- <a href="tel:{{ $user->phone }}"> <button class="btn btn-sm btn-light-warning fw-bold m-1">
                                <i class="bi bi-headset fs-2 p-0"></i>
                        </a> --}}
                </div>

            </div>
            <!--begin::Card body-->
        </div>
        <!--begin::Card-->
    </div>
    <!--end::Col-->
    <!--begin::Chat drawer-->
    <div id="kt_drawer_chat{{ $user->id }}" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat"
        data-kt-drawer-activate="true" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
        data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
        <!--begin::Messenger-->

        <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
            <!--begin::Card header-->
            <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
                <!--begin::Title-->
                <div class="card-title">
                    <!--begin::User-->
                    <div class="d-flex justify-content-center flex-column me-3">
                        <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{
                            $user->prenom }}
                            {{ $user->nom }}</a>
                        <!--begin::Info-->
                        <div class="mb-0 lh-1">
                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                            <span class="fs-7 fw-semibold text-muted">{{
                                $user->role()->first()->role }}</span>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_chat_close">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body" id="kt_drawer_chat_messenger_body">
                <!--begin::Messages-->
                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                    data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                    <!--begin::Message(in)-->
                    @foreach ($messages as $message)
                    @if ($message->type == 1)
                    @if ($message->user_id == $user->id)
                    <div class="d-flex justify-content-start mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-start">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Avatar-->
                                @if (empty($user->avatar))
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="absent" src="{{ URL::asset('assets/images/images.png') }}" />
                                </div>
                                @else
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="absent" src="{{ $user->avatar }}" />
                                </div>
                                @endif

                                <!--end::Avatar-->
                                <!--begin::Details-->
                                <div class="ms-3">
                                    <span class="text-muted fs-7 mb-1">{{
                                        $message->created_at->diffForHumans()
                                        }}</span>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                data-kt-element="message-text">
                                {{ $message->reponse }}</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    @endif
                    @else
                    @if ($user->id == $message->user_id)
                    <div class="d-flex justify-content-end mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column align-items-end">
                            <!--begin::User-->
                            <div class="d-flex align-items-center mb-2">
                                <!--begin::Details-->
                                <div class="me-3">
                                    <span class="text-muted fs-7 mb-1">{{
                                        $message->created_at->diffForHumans()
                                        }}</span>
                                    {{-- <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                    --}}
                                </div>
                                <!--end::Details-->
                                <!--begin::Avatar-->
                                <div class="symbol symbol-35px symbol-circle">
                                    <img alt="Pic" src="{{ URL::asset('assets/images/Logo-Officiel-Normal.png') }}" />
                                </div>
                                <!--end::Avatar-->
                            </div>
                            <!--end::User-->
                            <!--begin::Text-->
                            <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                data-kt-element="message-text">
                                {{ $message->reponse }}</div>
                            <!--end::Text-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    @endif
                    @endif
                    @endforeach

                </div>
                <!--end::Messages-->
            </div>

            <!--end::Card body-->
            <!--begin::Card footer-->

            <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
                <form id="form_chat" action="{{ route('reponses.store') }}" method="post">
                    @csrf

                    <input name="user_id" value="{{ $user->id }}" style="display: none" />
                    <input name="type" value="2" style="display: none" />
                    <!--begin::Input-->
                    <textarea class="form-control form-control-flush mb-3" rows="1" data-kt-element="input"
                        placeholder="Type a message" name="reponse"></textarea>
                    <!--end::Input-->
                    <!--begin:Toolbar-->
                    <div class="d-flex flex-stack">
                        <!--begin::Actions-->
                        <div class="d-flex align-items-center me-2">
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                data-bs-toggle="tooltip" title="Coming soon">
                                <i class="bi bi-paperclip fs-3"></i>
                            </button>
                            <button class="btn btn-sm btn-icon btn-active-light-primary me-1" type="button"
                                data-bs-toggle="tooltip" title="Coming soon">
                                <i class="bi bi-upload fs-3"></i>
                            </button>
                        </div>
                        <!--end::Actions-->
                        <!--begin::Send-->
                        <button id="" class="btn btn-primary" type="submit">Envoyer</button>
                        <!--end::Send-->
                    </div>
                    <!--end::Toolbar-->
                </form>
            </div>

            <!--end::Card footer-->
        </div>
        <!--end::Messenger-->
    </div>
    <!--end::Chat drawer-->
    @endforeach

</div>
<!--end::Contacts-->
@endsection

@section('scripts')

@endsection