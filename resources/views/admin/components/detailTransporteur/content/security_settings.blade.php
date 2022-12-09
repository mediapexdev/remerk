<!--begin:::Tab pane-->
<div class="tab-pane fade" id="kt_ecommerce_customer_advanced"
role="tabpanel">
<!--begin::Card-->
<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2>Security Details</h2>
        </div>
        <!--end::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0 pb-5">
        <!--begin::Table wrapper-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed gy-5"
                id="kt_table_users_login_session">
                <!--begin::Table body-->
                <tbody class="fs-6 fw-semibold text-gray-600">
                    <tr>
                        <td>Téléphone</td>
                        <td>{{$transporteur->phoneNumber()}}</td>
                        <td class="text-end">
                            <button type="button"
                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#kt_modal_update_phone">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                            fill="currentColor" />
                                        <path
                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>**********</td>
                        <td class="text-end">
                            <button type="button"
                                class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#kt_modal_update_password">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                            fill="currentColor" />
                                        <path
                                            d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                        </td>
                    </tr>
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table wrapper-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
<!--begin::Card-->
<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title flex-column">
            <h2 class="mb-1">Two Step Authentication</h2>
            <div class="fs-6 fw-semibold text-muted">
                Keep your account extra secure with a second
                authentication step.
            </div>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Add-->
            <button type="button"
                class="btn btn-light-primary btn-sm"
                data-kt-menu-trigger="click"
                data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/technology/teh004.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24"
                        viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M21 10.7192H3C2.4 10.7192 2 11.1192 2 11.7192C2 12.3192 2.4 12.7192 3 12.7192H6V14.7192C6 18.0192 8.7 20.7192 12 20.7192C15.3 20.7192 18 18.0192 18 14.7192V12.7192H21C21.6 12.7192 22 12.3192 22 11.7192C22 11.1192 21.6 10.7192 21 10.7192Z"
                            fill="currentColor" />
                        <path
                            d="M11.6 21.9192C11.4 21.9192 11.2 21.8192 11 21.7192C10.6 21.4192 10.5 20.7191 10.8 20.3191C11.7 19.1191 12.3 17.8191 12.7 16.3191C12.8 15.8191 13.4 15.4192 13.9 15.6192C14.4 15.7192 14.8 16.3191 14.6 16.8191C14.2 18.5191 13.4 20.1192 12.4 21.5192C12.2 21.7192 11.9 21.9192 11.6 21.9192ZM8.7 19.7192C10.2 18.1192 11 15.9192 11 13.7192V8.71917C11 8.11917 11.4 7.71917 12 7.71917C12.6 7.71917 13 8.11917 13 8.71917V13.0192C13 13.6192 13.4 14.0192 14 14.0192C14.6 14.0192 15 13.6192 15 13.0192V8.71917C15 7.01917 13.7 5.71917 12 5.71917C10.3 5.71917 9 7.01917 9 8.71917V13.7192C9 15.4192 8.4 17.1191 7.2 18.3191C6.8 18.7191 6.9 19.3192 7.3 19.7192C7.5 19.9192 7.7 20.0192 8 20.0192C8.3 20.0192 8.5 19.9192 8.7 19.7192ZM6 16.7192C6.5 16.7192 7 16.2192 7 15.7192V8.71917C7 8.11917 7.1 7.51918 7.3 6.91918C7.5 6.41918 7.2 5.8192 6.7 5.6192C6.2 5.4192 5.59999 5.71917 5.39999 6.21917C5.09999 7.01917 5 7.81917 5 8.71917V15.7192V15.8191C5 16.3191 5.5 16.7192 6 16.7192ZM9 4.71917C9.5 4.31917 10.1 4.11918 10.7 3.91918C11.2 3.81918 11.5 3.21917 11.4 2.71917C11.3 2.21917 10.7 1.91916 10.2 2.01916C9.4 2.21916 8.59999 2.6192 7.89999 3.1192C7.49999 3.4192 7.4 4.11916 7.7 4.51916C7.9 4.81916 8.2 4.91918 8.5 4.91918C8.6 4.91918 8.8 4.81917 9 4.71917ZM18.2 18.9192C18.7 17.2192 19 15.5192 19 13.7192V8.71917C19 5.71917 17.1 3.1192 14.3 2.1192C13.8 1.9192 13.2 2.21917 13 2.71917C12.8 3.21917 13.1 3.81916 13.6 4.01916C15.6 4.71916 17 6.61917 17 8.71917V13.7192C17 15.3192 16.8 16.8191 16.3 18.3191C16.1 18.8191 16.4 19.4192 16.9 19.6192C17 19.6192 17.1 19.6192 17.2 19.6192C17.7 19.6192 18 19.3192 18.2 18.9192Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Add Authentication Step
            </button>
            <!--begin::Menu-->
            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-6 w-200px py-4"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_auth_app">Use
                        authenticator app</a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_one_time_password">Enable
                        one-time password</a>
                </div>
                <!--end::Menu item-->
            </div>
            <!--end::Menu-->
            <!--end::Add-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pb-5">
        <!--begin::Item-->
        <div class="d-flex flex-stack">
            <!--begin::Content-->
            <div class="d-flex flex-column">
                <span>SMS</span>
                <span class="text-muted fs-6">+6141 234 567</span>
            </div>
            <!--end::Content-->
            <!--begin::Action-->
            <div
                class="d-flex justify-content-end align-items-center">
                <!--begin::Button-->
                <button type="button"
                    class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto me-5"
                    data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add_one_time_password">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24"
                            viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                fill="currentColor" />
                            <path
                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="button"
                    class="btn btn-icon btn-active-light-primary w-30px h-30px ms-auto"
                    id="kt_users_delete_two_step">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24"
                            viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                fill="currentColor" />
                            <path opacity="0.5"
                                d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </button>
                <!--end::Button-->
            </div>
            <!--end::Action-->
        </div>
        <!--end::Item-->
        <!--begin:Separator-->
        <div class="separator separator-dashed my-5"></div>
        <!--end:Separator-->
        <!--begin::Disclaimer-->
        <div class="text-gray-600">
            If you lose your mobile device or security key,
            you can
            <a href="#" class="me-1">generate a backup
                code</a>to sign
            in to your account.
        </div>
        <!--end::Disclaimer-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
<!--begin::Card-->
<div class="card pt-4 mb-6 mb-xl-9">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title">
            <h2 class="fw-bold mb-0">Payment Methods</h2>
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <a href="#"
                class="btn btn-sm btn-flex btn-light-primary"
                data-bs-toggle="modal"
                data-bs-target="#kt_modal_new_card">
                <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                <span class="svg-icon svg-icon-3">
                    <svg width="24" height="24"
                        viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2"
                            y="2" width="20"
                            height="20" rx="5"
                            fill="currentColor" />
                        <rect x="10.8891" y="17.8033"
                            width="12" height="2"
                            rx="1"
                            transform="rotate(-90 10.8891 17.8033)"
                            fill="currentColor" />
                        <rect x="6.01041" y="10.9247"
                            width="12" height="2"
                            rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->Add new method
            </a>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div id="kt_customer_view_payment_method"
        class="card-body pt-0">
        <!--begin::Option-->
        <div class="py-0" data-kt-customer-payment-method="row">
            <!--begin::Header-->
            <div class="py-3 d-flex flex-stack flex-wrap">
                <!--begin::Toggle-->
                <div class="d-flex align-items-center collapsible rotate"
                    data-bs-toggle="collapse"
                    href="#kt_customer_view_payment_method_1"
                    role="button" aria-expanded="false"
                    aria-controls="kt_customer_view_payment_method_1">
                    <!--begin::Arrow-->
                    <div class="me-3 rotate-90">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Arrow-->
                    <!--begin::Logo-->
                    <img src={{URL::asset("assets/media/svg/card-logos/mastercard.svg")}}
                        class="w-40px me-3" alt="" />
                    <!--end::Logo-->
                    <!--begin::Summary-->
                    <div class="me-3">
                        <div class="d-flex align-items-center">
                            <div class="text-gray-800 fw-bold">
                                Mastercard
                            </div>
                            <div
                                class="badge badge-light-primary ms-5">
                                Primary
                            </div>
                        </div>
                        <div class="text-muted">
                            Expires Dec 2024
                        </div>
                    </div>
                    <!--end::Summary-->
                </div>
                <!--end::Toggle-->
                <!--begin::Toolbar-->
                <div class="d-flex my-3 ms-9">
                    <!--begin::Edit-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_new_card">
                        <span data-bs-toggle="tooltip"
                            data-bs-trigger="hover" title="Edit">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                        fill="currentColor" />
                                    <path
                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                    <!--end::Edit-->
                    <!--begin::Delete-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="tooltip" title="Delete"
                        data-kt-customer-payment-method="delete">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Delete-->
                    <!--begin::More-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px"
                        data-bs-toggle="tooltip"
                        title="More Options"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"
                                data-kt-payment-mehtod-action="set_as_primary">Set
                                as Primary</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::More-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div id="kt_customer_view_payment_method_1"
                class="collapse show fs-6 ps-10"
                data-bs-parent="#kt_customer_view_payment_method">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Col-->
                    <div class="flex-equal me-5">
                        <table
                            class="table table-flush fw-semibold gy-1">
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Name
                                </td>
                                <td class="text-gray-800">
                                    Emma Smith
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Number
                                </td>
                                <td class="text-gray-800">
                                    **** 2572
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Expires
                                </td>
                                <td class="text-gray-800">12/2024</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Type
                                </td>
                                <td class="text-gray-800">
                                    Mastercard credit card
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Issuer
                                </td>
                                <td class="text-gray-800">VICBANK</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    ID
                                </td>
                                <td class="text-gray-800">
                                    id_4325df90sdf8
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="flex-equal">
                        <table
                            class="table table-flush fw-semibold gy-1">
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Billing address
                                </td>
                                <td class="text-gray-800">AU</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Phone
                                </td>
                                <td class="text-gray-800">
                                    No phone provided
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Email
                                </td>
                                <td class="text-gray-800">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary">smith@kpmg.com</a>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Origin
                                </td>
                                <td class="text-gray-800">
                                    Australia
                                    <div
                                        class="symbol symbol-20px symbol-circle ms-2">
                                        <img
                                            src={{URL::asset("assets/media/flags/australia.svg")}} />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    CVC check
                                </td>
                                <td class="text-gray-800">
                                    Passed
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen043.svg-->
                                    <span
                                        class="svg-icon svg-icon-2 svg-icon-success">
                                        <svg width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3"
                                                x="2"
                                                y="2"
                                                width="20"
                                                height="20"
                                                rx="10"
                                                fill="currentColor" />
                                            <path
                                                d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Details-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Option-->
        <div class="separator separator-dashed"></div>
        <!--begin::Option-->
        <div class="py-0" data-kt-customer-payment-method="row">
            <!--begin::Header-->
            <div class="py-3 d-flex flex-stack flex-wrap">
                <!--begin::Toggle-->
                <div class="d-flex align-items-center collapsible collapsed rotate"
                    data-bs-toggle="collapse"
                    href="#kt_customer_view_payment_method_2"
                    role="button" aria-expanded="false"
                    aria-controls="kt_customer_view_payment_method_2">
                    <!--begin::Arrow-->
                    <div class="me-3 rotate-90">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Arrow-->
                    <!--begin::Logo-->
                    <img src={{URL::asset("assets/media/svg/card-logos/visa.svg")}}
                        class="w-40px me-3" alt="" />
                    <!--end::Logo-->
                    <!--begin::Summary-->
                    <div class="me-3">
                        <div class="d-flex align-items-center">
                            <div class="text-gray-800 fw-bold">
                                Visa
                            </div>
                        </div>
                        <div class="text-muted">
                            Expires Feb 2022
                        </div>
                    </div>
                    <!--end::Summary-->
                </div>
                <!--end::Toggle-->
                <!--begin::Toolbar-->
                <div class="d-flex my-3 ms-9">
                    <!--begin::Edit-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_new_card">
                        <span data-bs-toggle="tooltip"
                            data-bs-trigger="hover" title="Edit">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                        fill="currentColor" />
                                    <path
                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                    <!--end::Edit-->
                    <!--begin::Delete-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="tooltip" title="Delete"
                        data-kt-customer-payment-method="delete">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Delete-->
                    <!--begin::More-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px"
                        data-bs-toggle="tooltip"
                        title="More Options"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"
                                data-kt-payment-mehtod-action="set_as_primary">Set
                                as Primary</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::More-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div id="kt_customer_view_payment_method_2"
                class="collapse fs-6 ps-10"
                data-bs-parent="#kt_customer_view_payment_method">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Col-->
                    <div class="flex-equal me-5">
                        <table
                            class="table table-flush fw-semibold gy-1">
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Name
                                </td>
                                <td class="text-gray-800">
                                    Melody Macy
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Number
                                </td>
                                <td class="text-gray-800">
                                    **** 1756
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Expires
                                </td>
                                <td class="text-gray-800">02/2022</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Type
                                </td>
                                <td class="text-gray-800">
                                    Visa credit card
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Issuer
                                </td>
                                <td class="text-gray-800">ENBANK</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    ID
                                </td>
                                <td class="text-gray-800">
                                    id_w2r84jdy723
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="flex-equal">
                        <table
                            class="table table-flush fw-semibold gy-1">
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Billing address
                                </td>
                                <td class="text-gray-800">UK</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Phone
                                </td>
                                <td class="text-gray-800">
                                    No phone provided
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Email
                                </td>
                                <td class="text-gray-800">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary">melody@altbox.com</a>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Origin
                                </td>
                                <td class="text-gray-800">
                                    United Kingdom
                                    <div
                                        class="symbol symbol-20px symbol-circle ms-2">
                                        <img
                                            src={{URL::asset("assets/media/flags/united-kingdom.svg")}} />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    CVC check
                                </td>
                                <td class="text-gray-800">
                                    Passed
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                                    <span
                                        class="svg-icon svg-icon-2 svg-icon-success">
                                        <svg width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                fill="currentColor" />
                                            <path
                                                d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Details-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Option-->
        <div class="separator separator-dashed"></div>
        <!--begin::Option-->
        <div class="py-0" data-kt-customer-payment-method="row">
            <!--begin::Header-->
            <div class="py-3 d-flex flex-stack flex-wrap">
                <!--begin::Toggle-->
                <div class="d-flex align-items-center collapsible collapsed rotate"
                    data-bs-toggle="collapse"
                    href="#kt_customer_view_payment_method_3"
                    role="button" aria-expanded="false"
                    aria-controls="kt_customer_view_payment_method_3">
                    <!--begin::Arrow-->
                    <div class="me-3 rotate-90">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Arrow-->
                    <!--begin::Logo-->
                    <img src={{URL::asset("assets/media/svg/card-logos/american-express.svg")}}
                        class="w-40px me-3" alt="" />
                    <!--end::Logo-->
                    <!--begin::Summary-->
                    <div class="me-3">
                        <div class="d-flex align-items-center">
                            <div class="text-gray-800 fw-bold">
                                American Express
                            </div>
                            <div
                                class="badge badge-light-danger ms-5">
                                Expired
                            </div>
                        </div>
                        <div class="text-muted">
                            Expires Aug 2021
                        </div>
                    </div>
                    <!--end::Summary-->
                </div>
                <!--end::Toggle-->
                <!--begin::Toolbar-->
                <div class="d-flex my-3 ms-9">
                    <!--begin::Edit-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="modal"
                        data-bs-target="#kt_modal_new_card">
                        <span data-bs-toggle="tooltip"
                            data-bs-trigger="hover" title="Edit">
                            <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.3"
                                        d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                        fill="currentColor" />
                                    <path
                                        d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                    <!--end::Edit-->
                    <!--begin::Delete-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                        data-bs-toggle="tooltip" title="Delete"
                        data-kt-customer-payment-method="delete">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z"
                                    fill="currentColor" />
                                <path opacity="0.5"
                                    d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--end::Delete-->
                    <!--begin::More-->
                    <a href="#"
                        class="btn btn-icon btn-active-light-primary w-30px h-30px"
                        data-bs-toggle="tooltip"
                        title="More Options"
                        data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                        <span class="svg-icon svg-icon-3">
                            <svg width="24" height="24"
                                viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                    fill="currentColor" />
                                <path opacity="0.3"
                                    d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-150px py-3"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <a href="#" class="menu-link px-3"
                                data-kt-payment-mehtod-action="set_as_primary">Set
                                as Primary</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                    <!--end::More-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div id="kt_customer_view_payment_method_3"
                class="collapse fs-6 ps-10"
                data-bs-parent="#kt_customer_view_payment_method">
                <!--begin::Details-->
                <div class="d-flex flex-wrap py-5">
                    <!--begin::Col-->
                    <div class="flex-equal me-5">
                        <table
                            class="table table-flush fw-semibold gy-1">
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Name
                                </td>
                                <td class="text-gray-800">
                                    Max Smith
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Number
                                </td>
                                <td class="text-gray-800">
                                    **** 9506
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Expires
                                </td>
                                <td class="text-gray-800">08/2021</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Type
                                </td>
                                <td class="text-gray-800">
                                    American express credit card
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Issuer
                                </td>
                                <td class="text-gray-800">USABANK</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    ID
                                </td>
                                <td class="text-gray-800">
                                    id_89457jcje63
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="flex-equal">
                        <table
                            class="table table-flush fw-semibold gy-1">
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Billing address
                                </td>
                                <td class="text-gray-800">US</td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Phone
                                </td>
                                <td class="text-gray-800">
                                    No phone provided
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Email
                                </td>
                                <td class="text-gray-800">
                                    <a href="#"
                                        class="text-gray-900 text-hover-primary">max@kt.com</a>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    Origin
                                </td>
                                <td class="text-gray-800">
                                    United States of America
                                    <div
                                        class="symbol symbol-20px symbol-circle ms-2">
                                        <img
                                            src={{URL::asset("assets/media/flags/united-states.svg")}} />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td
                                    class="text-muted min-w-125px w-125px">
                                    CVC check
                                </td>
                                <td class="text-gray-800">
                                    Failed
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                    <span
                                        class="svg-icon svg-icon-2 svg-icon-danger">
                                        <svg width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5"
                                                x="6"
                                                y="17.3137"
                                                width="16"
                                                height="2"
                                                rx="1"
                                                transform="rotate(-45 6 17.3137)"
                                                fill="currentColor" />
                                            <rect x="7.41422"
                                                y="6"
                                                width="16"
                                                height="2"
                                                rx="1"
                                                transform="rotate(45 7.41422 6)"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </td>
                            </tr>
                        </table>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Details-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Option-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
</div>
<!--end:::Tab pane-->