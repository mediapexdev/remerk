<!--begin:::Tab pane-->
<div class="tab-pane fade" id="kt_ecommerce_customer_general" role="tabpanel">
    <!--begin::Card-->
    <div class="card pt-4 mb-6 mb-xl-9">
        <!--begin::Card header-->
        <div class="card-header border-0">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Profile</h2>
            </div>
            <!--end::Card title-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0 pb-5">
            <!--begin::Form-->
            <form class="form" action="{{ route('user.updateProfileDetails') }}" enctype="multipart/form-data"
                id="admin_expediteur_profile" method="POST">
                @csrf
                <input type="hidden" name="phone" value="{{ $expediteur->phoneNumber() }}">
                <!--begin::Input group-->
                <div class="mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold mb-2">
                        <span>Update Avatar</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Allowed file types: png, jpg, jpeg."></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Image input wrapper-->
                    <div class="mt-1">
                        <!--begin::Image input placeholder-->
                        <style>
                            .image-input-placeholder {
                                background-image: url({{ URL::asset('assets/media/svg/avatars/blank.svg') }});
                            }

                            [data-theme="dark"] .image-input-placeholder {
                                background-image: url({{ URL::asset('assets/media/svg/avatars/blank.svg') }});
                            }
                        </style>
                        <!--end::Image input placeholder-->
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline image-input-placeholder" data-kt-image-input="true">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url('{{ $avatar }}'); ">
                            </div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Edit-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Changer d'avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg"
                                    value="{{ $has_avatar ? $avatar : old('avatar') }}" />
                                <input type="hidden" name="avatar_remove" id="remove_avatar" />
                                <input type="hidden" name="avatar_input_action" id="avatar_input_action" value="none"
                                    required>
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Annuler avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-dismiss="click" data-bs-toggle="tooltip"
                                title="Supprimer l'avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                    </div>
                    <!--end::Image input wrapper-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row row-cols-1 row-cols-md-2 mb-7">
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-2 required">Prénom</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="votre prénom"
                            name="prenom" id="prenom" value="{{ $expediteur->user->prenom }}" />
                        <!--end::Input-->
                    </div>
                    <div class="col">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-2 required">Nom</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="nom"
                            id="nom" value="{{ $expediteur->user->nom }}" />
                        <!--end::Input-->
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Row-->
                <div class="row row-cols-1 row-cols-md-2">
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">
                                <span class="required">Site web
                                </span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title="Email address must be active"></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="siteweb"
                                id="siteweb" value="{{ $expediteur->siteweb }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col">
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="fs-6 fw-semibold mb-2">
                                <span>Email professionnel</span>
                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                    title=""></i>
                            </label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="email" class="form-control form-control-solid" placeholder="" name="email"
                                id="email" value="{{ $expediteur->user->email }}" />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-2">
                            <span>Entreprise</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title=""></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="entreprise"
                            id="entreprise" value="{{ $expediteur->entreprise }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-7">
                        <!--begin::Label-->
                        <label class="fs-6 fw-semibold mb-2">
                            <span>Adresse</span>
                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                title=""></i>
                        </label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-solid" placeholder="" name="adresse"
                            id="adresse" value="{{ $expediteur->adresse }}" />
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Row-->
                <div class="d-flex justify-content-end">
                    <!--begin::Button-->
                    <button type="submit" id="admin_expediteur_profile_submit" class="btn btn-light-primary">
                        <span class="indicator-label">Save</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </form>
            <!--end::Form-->
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
                <h2>Address Book</h2>
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-flex btn-light-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add_address">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20"
                                rx="5" fill="currentColor" />
                            <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                            <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Add new address
                </a>
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div id="kt_ecommerce_customer_addresses" class="card-body pt-0 pb-5">
            <!--begin::Addresses-->
            <!--begin::Address-->
            <div class="py-0">
                <!--begin::Header-->
                <div class="py-3 d-flex flex-stack flex-wrap">
                    <!--begin::Toggle-->
                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse"
                        href="#kt_ecommerce_customer_addresses_1" role="button" aria-expanded="false"
                        aria-controls="kt_customer_view_payment_method_1">
                        <!--begin::Arrow-->
                        <div class="me-3 rotate-90">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Arrow-->
                        <!--begin::Summary-->
                        <div class="me-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">Home</div>
                                <div class="badge badge-light-primary ms-5">
                                    Default Address
                                </div>
                            </div>
                            <div class="text-muted">
                                101 Collin Street
                            </div>
                        </div>
                        <!--end::Summary-->
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Toolbar-->
                    <div class="d-flex my-3 ms-9">
                        <!--begin::Edit-->
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_update_address">
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                            data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                            data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3"
                                    data-kt-payment-mehtod-action="set_as_default">Set
                                    as default address</a>
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
                <div id="kt_ecommerce_customer_addresses_1" class="collapse fs-6 ps-9"
                    data-bs-parent="#kt_ecommerce_customer_addresses">
                    <!--begin::Details-->
                    <div class="d-flex flex-column pb-5">
                        <div class="fw-bold text-gray-600">
                            Max Smith
                        </div>
                        <div class="text-muted">
                            101 Collin Street, <br />Melbourne, VIC
                            3000, <br />Australia
                        </div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Address-->
            <!--begin::Address-->
            <div class="py-0">
                <!--begin::Header-->
                <div class="py-3 d-flex flex-stack flex-wrap">
                    <!--begin::Toggle-->
                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse"
                        href="#kt_ecommerce_customer_addresses_2" role="button" aria-expanded="false"
                        aria-controls="kt_customer_view_payment_method_2">
                        <!--begin::Arrow-->
                        <div class="me-3 rotate-90">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Arrow-->
                        <!--begin::Summary-->
                        <div class="me-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">Work</div>
                            </div>
                            <div class="text-muted">
                                54 Spring Street
                            </div>
                        </div>
                        <!--end::Summary-->
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Toolbar-->
                    <div class="d-flex my-3 ms-9">
                        <!--begin::Edit-->
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_update_address">
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                            data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                            data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3"
                                    data-kt-payment-mehtod-action="set_as_default">Set
                                    as default address</a>
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
                <div id="kt_ecommerce_customer_addresses_2" class="collapse fs-6 ps-9"
                    data-bs-parent="#kt_ecommerce_customer_addresses">
                    <!--begin::Details-->
                    <div class="d-flex flex-column pb-5">
                        <div class="fw-bold text-gray-600">
                            Max Smith
                        </div>
                        <div class="text-muted">
                            54 Spring Street, <br />Melbourne, VIC
                            3000, <br />Australia
                        </div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Address-->
            <!--begin::Address-->
            <div class="py-0">
                <!--begin::Header-->
                <div class="py-3 d-flex flex-stack flex-wrap">
                    <!--begin::Toggle-->
                    <div class="d-flex align-items-center collapsible collapsed rotate" data-bs-toggle="collapse"
                        href="#kt_ecommerce_customer_addresses_3" role="button" aria-expanded="false"
                        aria-controls="kt_customer_view_payment_method_3">
                        <!--begin::Arrow-->
                        <div class="me-3 rotate-90">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr071.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.6343 12.5657L8.45001 16.75C8.0358 17.1642 8.0358 17.8358 8.45001 18.25C8.86423 18.6642 9.5358 18.6642 9.95001 18.25L15.4929 12.7071C15.8834 12.3166 15.8834 11.6834 15.4929 11.2929L9.95001 5.75C9.5358 5.33579 8.86423 5.33579 8.45001 5.75C8.0358 6.16421 8.0358 6.83579 8.45001 7.25L12.6343 11.4343C12.9467 11.7467 12.9467 12.2533 12.6343 12.5657Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Arrow-->
                        <!--begin::Summary-->
                        <div class="me-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-4 fw-bold">Family</div>
                            </div>
                            <div class="text-muted">
                                1521 Broadway
                            </div>
                        </div>
                        <!--end::Summary-->
                    </div>
                    <!--end::Toggle-->
                    <!--begin::Toolbar-->
                    <div class="d-flex my-3 ms-9">
                        <!--begin::Edit-->
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                            data-bs-toggle="modal" data-bs-target="#kt_modal_update_address">
                            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit">
                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                            data-bs-toggle="tooltip" title="Delete" data-kt-customer-payment-method="delete">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <a href="#" class="btn btn-icon btn-active-light-primary w-30px h-30px"
                            data-bs-toggle="tooltip" title="More Options" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                            <span class="svg-icon svg-icon-3">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
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
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold w-200px py-3"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3"
                                    data-kt-payment-mehtod-action="set_as_default">Set
                                    as default address</a>
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
                <div id="kt_ecommerce_customer_addresses_3" class="collapse fs-6 ps-9"
                    data-bs-parent="#kt_ecommerce_customer_addresses">
                    <!--begin::Details-->
                    <div class="d-flex flex-column pb-5">
                        <div class="fw-bold text-gray-600">
                            Francis Mitcham
                        </div>
                        <div class="text-muted">
                            1521 Broadway, <br />New York,
                            <br />Melbourne, NY 10036, <br />United
                            States
                        </div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Address-->
            <!--end::Addresses-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end:::Tab pane-->
