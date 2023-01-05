@extends('admin.layout')

@php
    use App\Models\User;
    use App\Models\Transporteur;
    use App\Models\Expediteur;
    use App\Models\Reponse;
    
    $users = User::orderBy('id', 'ASC')->get();
    $transporteurs = Transporteur::all();
    $expediteurs = Expediteur::all();
    $messages = Reponse::orderBy('created_at', 'ASC')->get();

@endphp

@section('styles')
    <style>
        .td{{Auth::user()->id }} {
            display: none !important;
        }
    </style>
@endsection

@section('title')
    <title>Messagerie | Remërk</title>
@endsection

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>

@section('component-body-content')
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-lg-300px w-xl-400px mb-10 mb-lg-0">
                    <!--begin::Contacts-->
                    <div class="card card-flush">

                        <!--begin::Card header-->
                        <div class="card-header pt-7" id="kt_chat_contacts_header">
                            <!--begin::Form-->
                            <form class="w-100 position-relative" autocomplete="off">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span
                                    class="svg-icon svg-icon-2 svg-icon-lg-1 svg-icon-gray-500 position-absolute top-50 ms-5 translate-middle-y">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                            rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path
                                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid px-15" id="myInput"
                                    placeholder="Rechercher par nom ou téléphone" />
                                <!--end::Input-->
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-5 tab" id="kt_chat_contacts_body">
                            <!--begin::List-->
                            <div class="scroll-y me-n5 pe-5 h-100px h-lg-auto" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_header, #kt_toolbar, #kt_footer, #kt_chat_contacts_header"
                                data-kt-scroll-wrappers="#kt_content, #kt_chat_contacts_body" data-kt-scroll-offset="5px">
                                <!--begin::User-->
                                <table class="table">
                                    <tbody id="myTable">
                                        @foreach ($users as $user)
                                            <tr>
                                                <td class="p-0 m-0 td{{$user->id}}" style="border:none">
                                                    <div class=" td d-flex flex-stack py-4 tablinks"
                                                        onclick="openCity(event, 'kt_chat_messenger{{ $user->id }}')"
                                                        id="defaultOpen{{ $user->id }}">
                                                        <!--begin::Details-->
                                                        <div class="d-flex align-items-center ">
                                                            <!--begin::Avatar-->
                                                            <div class="symbol symbol-45px symbol-circle">
                                                                @if (empty($user->avatar))
                                                                    <div class="symbol symbol-35px symbol-circle">
                                                                        <img alt="absent"
                                                                            src="{{ URL::asset('assets/images/images.png') }}" />
                                                                    </div>
                                                                @else
                                                                    <div class="symbol symbol-35px symbol-circle">
                                                                        <span
                                                                            class="symbol-label bg-light-danger text-danger fs-6 fw-bolder">{{ $user->avatar }}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <!--end::Avatar-->
                                                            <!--begin::Details-->
                                                            <div class="ms-5">
                                                                <a href="#"
                                                                    class="fs-7 fw-bold text-gray-700 text-hover-primary mb-2">{{ $user->prenom }}
                                                                    {{ $user->nom }}</a>
                                                                <div class="fs-9 fw-semibold text-muted">{{ $user->phone }}
                                                                </div>
                                                            </div>
                                                            <!--end::Details-->
                                                        </div>
                                                        <!--end::Details-->
                                                        <!--begin::Lat seen-->
                                                        <div class="d-flex flex-column align-items-end ms-2">
                                                            @if ($user->last_login_at == null)
                                                                <span class="text-muted fs-9 mb-1">.</span>
                                                            @else
                                                                <span class="text-muted fs-9 mb-1">en ligne</span>
                                                                <span
                                                                    class="text-muted fs-9 mb-1">
                                                                    {{ Carbon\Carbon::parse($user->last_login_at)->diffForHumans() }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <!--end::Lat seen-->
                                                    </div>
                                                </td>
                                            </tr>
                                            <!--end::User-->
                                            <!--begin::Separator-->
                                            <div class="separator separator-dashed d-none"></div>
                                            <!--end::Separator-->
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!--end::List-->
                        </div>
                        <!--end::Card body-->

                    </div>
                    <!--end::Contacts-->
                </div>
                <!--end::Sidebar-->
                <!--begin::Content-->
                <div class="flex-lg-row-fluid ms-lg-7 ms-xl-10">
                    <!--begin::Messenger-->
                    @foreach ($users as $user)
                        <div class="card tabcontent" id="kt_chat_messenger{{ $user->id }}">
                            <!--begin::Card header-->
                            <div class="card-header" id="kt_chat_messenger_header">
                                <!--begin::Title-->
                                <div class="card-title">
                                    <!--begin::User-->
                                    <div class="d-flex justify-content-center flex-column me-3">
                                        <a href="#"
                                            class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1">{{ $user->prenom }}
                                            {{ $user->nom }}</a>
                                        <!--begin::Info-->
                                        <div class="mb-0 lh-1">
                                            <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                                            <span
                                                class="fs-7 fw-semibold text-muted">{{ $user->role()->first()->role }}</span>
                                        </div>
                                        <!--end::Info-->
                                    </div>
                                    <!--end::User-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body" id="kt_drawer_chat_messenger_body">
                                <!--begin::Messages-->
                                <div class="scroll-y me-n5 pe-5" data-kt-element="messages" data-kt-scroll="true"
                                    data-kt-scroll-activate="true" data-kt-scroll-max-height="220px"
                                    data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                                    data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                                    <!--begin::Message(in)-->
                                    @foreach ($messages as $message)
                                        @if ($message->type == 1)
                                            @if ($message->user_id == $user->id)
                                                <div class="d-flex justify-content-start mb-2">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column align-items-start">
                                                        <!--begin::Text-->
                                                        <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start"
                                                            data-kt-element="message-text">
                                                            {{ $message->reponse }}
                                                        </div>
                                                        <span class="align-end text-muted fs-9 mb-1">Reçu -
                                                            {{ $message->created_at->diffForHumans() }}</span>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Wrapper-->
                                                </div>
                                            @endif
                                        @else
                                            @if ($user->id == $message->user_id)
                                                <div class="d-flex justify-content-end mb-2">
                                                    <!--begin::Wrapper-->
                                                    <div class="d-flex flex-column align-items-end">
                                                        <!--begin::Text-->
                                                        <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                                            data-kt-element="message-text">
                                                            {{ $message->reponse }}</div>
                                                        <span class="align-end text-muted fs-9 mb-1">Envoyé -
                                                            {{ $message->created_at->diffForHumans() }}</span>
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
                            <div class="card-footer pt-2" id="kt_drawer_chat_messenger_footer">
                                <!--begin::Form-->
                                <form id="form_chat" action="{{ route('reponses.store') }}" method="post">
                                    @csrf

                                    <input type="text" name="user_id" value="{{ $user->id }}"
                                        style="display:none">
                                    <input type="text" name="type" value="2" style="display: none">
                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-flush mb-4" rows="1" name="reponse" data-kt-element="input"
                                        placeholder="Entrer votre message"></textarea>
                                    <!--end::Input-->
                                    <!--begin:Toolbar-->
                                    <div class="d-flex flex-stack">
                                        <!--begin::Actions-->
                                        <div class="d-flex align-items-center me-4">
                                            {{-- <input class="form-control" type="file" name="fichier"
                                                accept="image/png, image/jpeg, .doc, .docx, .pdf"
                                                multiple> --}}
                                        </div>
                                        <!--end::Actions-->
                                        <!--begin::Send-->
                                        <button id="btn_send_form" class="btn btn-primary"
                                            type="submit">Envoyer</button>
                                        <!--end::Send-->

                                    </div>
                                    <!--end::Toolbar-->
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Card footer-->
                        </div>
                    @endforeach

                    <!--end::Messenger-->
                </div>
                <!--end::Content-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Content container-->
    </div>
    
@endsection

@section('scripts')

@section('custom-js')
    @include('admin.components.dashboard.scripts')
@endsection
<script>
    function openCity(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the link that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    } 
    document.getElementById("defaultOpen1").click();
</script>
@endsection
