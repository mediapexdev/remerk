{{-- @props(['chat-box']) --}}

<div id="kt_drawer_chat" class="bg-body" data-kt-drawer="true" data-kt-drawer-name="chat" data-kt-drawer-activate="true"
    data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}" data-kt-drawer-direction="end"
    data-kt-drawer-toggle="#kt_drawer_chat_toggle" data-kt-drawer-close="#kt_drawer_chat_close">
    <!--begin::Messenger-->
    <div class="card w-100 rounded-0 border-0" id="kt_drawer_chat_messenger">
        <!--begin::Card header-->
        <div class="card-header pe-5" id="kt_drawer_chat_messenger_header">
            <!--begin::Title-->
            <div class="card-title">
                <!--begin::User-->
                <div class="d-flex justify-content-center flex-column me-3">
                    <a href="#" class="fs-4 fw-bold text-gray-900 text-hover-primary me-1 mb-2 lh-1"
                        style="text-transform: uppercase">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</a>
                    <!--begin::Info-->
                    <div class="mb-0 lh-1">
                        <span class="badge badge-success badge-circle w-10px h-10px me-1"></span>
                        <span class="fs-7 fw-semibold text-muted">Active</span>
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
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                transform="rotate(45 7.41422 6)" fill="currentColor" />
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
            <div id="kt_drawer_chat_messenger_body_layout" class="scroll-y me-n5 pe-5" data-kt-element="messages"
                data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_drawer_chat_messenger_header, #kt_drawer_chat_messenger_footer"
                data-kt-scroll-wrappers="#kt_drawer_chat_messenger_body" data-kt-scroll-offset="0px">
                <!--begin::Message(in)-->
                @php
                    use App\Models\Reponse;
                    $messages = Reponse::all();
                @endphp
                @foreach ($messages as $mes)
                    @if ($mes->type == 1)
                        @if ($mes->user_id == Auth::user()->id)
                            <div class="d-flex justify-content-start mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-start">
                                    <!--begin::Text-->
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-35px symbol-circle">
                                            @if (empty($user->avatar))
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="absent"
                                                        src="{{ URL::asset('assets/images/images.png') }}" />
                                                </div>
                                            @else
                                                <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="absent" src="{{ $user->avatar }}" />
                                                </div>
                                            @endif
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Details-->
                                        <div class="ms-3">
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary me-1">You</a>
                                            <span
                                                class="text-muted fs-7 mb-1">{{ $mes->created_at->format('d-m-y | h:i:s') }}</span>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::User-->
                                    <div class="p-5 rounded bg-light-info text-dark fw-semibold mw-lg-400px text-start">
                                        {{ $mes->reponse }}
                                    </div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                        @endif
                    @else
                        @if ($mes->user_id == Auth::user()->id)
                            <div class="d-flex justify-content-end mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-column align-items-end">
                                    <!--begin::User-->
                                    <div class="d-flex align-items-center mb-2">
                                        <!--begin::Details-->
                                        <div class="me-3">
                                            <span
                                                class="text-muted fs-7 mb-1">{{ $mes->created_at->format('d-m-y | h:i:s') }}</span>
                                            <a href="#"
                                                class="fs-5 fw-bold text-gray-900 text-hover-primary ms-1">You</a>
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Avatar-->
                                        @if (empty($user->avatar))
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="absent"
                                                    src="{{ URL::asset('assets/images/Logo-Officiel-Normal.png') }}" />
                                            </div>
                                        @else
                                            <div class="symbol symbol-35px symbol-circle">
                                                <img alt="absent" src="{{ $user->avatar }}" />
                                            </div>
                                        @endif
                                        <!--end::Avatar-->
                                    </div>
                                    <!--end::User-->
                                    <!--begin::Text-->
                                    <div class="p-5 rounded bg-light-primary text-dark fw-semibold mw-lg-400px text-end"
                                        data-kt-element="message-text">{{ $mes->reponse }}</div>
                                    <!--end::Text-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                        @endif
                    @endif
                @endforeach
                <!--end::Message(in)-->
            </div>
            <!--end::Messages-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer pt-4" id="kt_drawer_chat_messenger_footer">
            <!--begin::Form-->
            <form id="form_chat" action="{{ route('reponses.store') }}" method="post">
                @csrf

                <input type="text" name="user_id" value="{{ Auth::id() }}" style="display:none">
                <input type="text" name="type" value="1" style="display: none">
                <!--begin::Input-->
                <textarea class="form-control form-control-flush mb-3" rows="1" name="reponse" data-kt-element="input"
                    placeholder="Entrer votre message"></textarea>
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
                    <button id="btn_send_form" class="btn btn-primary" type="submit">Envoyer</button>
                    <!--end::Send-->

                </div>
                <!--end::Toolbar-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Messenger-->

    <!--begin::script-->

    <!-- begin::Inclusion of Jquery and its plugins -->

    {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script> --}}

    <!-- end::Inclusion of Jquery and its plugins -->

    {{-- <script>
        $(document).ready(function() {

            $("#btn_send_form").on('click', function() {
                sendMessage();
            });
        });
        function sendMessage() {

            let route = $('#form_chat').attr('action');
            let ipt_message = $('#form_chat').find('textarea[name=message]');

            $.post(route,
                {
                    message: ipt_message.val()
                },
                function(data) {

                    ipt_message.val("");
                    let real_layout = $(document).find('#kt_drawer_chat_messenger_body_layout');
                    let captured_layout = $(data).find('#kt_drawer_chat_messenger_body_layout');

                    real_layout.html(captured_layout.contents())
                        .animate({ scrollTop: real_layout[0].scrollHeight - real_layout.height() }, 'fast', 'easeOutQuint');
                }
            );
        }
    </script> --}}
    <!--end::script-->
</div>
