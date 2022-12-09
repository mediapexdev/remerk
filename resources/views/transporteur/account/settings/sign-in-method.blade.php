<div class="card mb-5 mb-xl-10">
    {{-- <!--begin::Card header--> --}}
    <div class="card-header border-0 cursor-pointer" role="button"
        data-bs-toggle="collapse" data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Méthode de connexion</h3>
        </div>
    </div>
    {{-- <!--end::Card header--> --}}
    {{-- <!--begin::Content--> --}}
    <div id="kt_account_settings_signin_method" class="collapse show">
        {{-- <!--begin::Card body--> --}}
        <div class="card-body border-top p-9">
            {{-- <!--begin::Password--> --}}
            <div class="d-flex flex-wrap align-items-center mb-10">
                {{-- <!--begin::Label--> --}}
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Mot de passe</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>
                {{-- <!--end::Label--> --}}
                {{-- <!--begin::Edit--> --}}
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    {{-- <!--begin::Form--> --}}
                    <form id="kt_signin_change_password" class="form" method="POST"
                        action="{{route('user.updatePassword')}}" novalidate="novalidate">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-3" data-kt-password-meter="true">
                                    <label for="current_password" class="form-label fs-6 fw-bold mb-3">Mot de passe actuel</label>
                                    {{-- <!--begin::Input wrapper--> --}}
                                    <div class="position-relative mb-3">
                                        <input type="password" name="current_password" id="current_password"
                                            class="form-control form-control-lg form-control-solid" required>
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    {{-- <!--end::Input wrapper--> --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-3" data-kt-password-meter="true">
                                    <label for="new_password" class="form-label fs-6 fw-bold mb-3">Nouveau mot de passe</label>
                                    {{-- <!--begin::Input wrapper--> --}}
                                    <div class="position-relative mb-3">
                                        <input type="password" name="new_password" id="new_password"
                                            class="form-control form-control-lg form-control-solid" required>
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    {{-- <!--end::Input wrapper--> --}}
                                    {{-- <!--begin::Meter--> --}}
                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                    </div>
                                    {{-- <!--end::Meter--> --}}
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-3" data-kt-password-meter="true">
                                    <label for="new_password_confirmation" class="form-label fs-6 fw-bold mb-3">Confirmer le nouveau mot de passe</label>
                                    {{-- <!--begin::Input wrapper--> --}}
                                    <div class="position-relative mb-3">
                                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" 
                                            class="form-control form-control-lg form-control-solid" required>
                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                            <i class="bi bi-eye-slash fs-2"></i>
                                            <i class="bi bi-eye fs-2 d-none"></i>
                                        </span>
                                    </div>
                                    {{-- <!--end::Input wrapper--> --}}
                                </div>
                            </div>
                        </div>
                        <div class="form-text mb-5">Le mot de passe doit comporter au moins 8 caractères et contenir des symboles.</div>
                        <div class="d-flex">
                            @csrf
                            <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                            <button type="submit" id="kt_password_submit" class="btn btn-primary me-2 px-6">
                                {{-- <!--begin::Indicator label--> --}}
                                <span class="indicator-label">Mettre à jour</span>
                                {{-- <!--end::Indicator label--> --}}
                                {{-- <!--begin::Indicator progress--> --}}
                                <span class="indicator-progress">
                                    <span>Patientez ...</span>
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                {{-- <!--end::Indicator progress--> --}}
                            </button>
                            <button type="reset" id="kt_password_cancel" class="btn btn-color-gray-400 btn-active-light-primary px-6">Annuler</button>
                        </div>
                    </form>
                    {{-- <!--end::Form--> --}}
                </div>
                {{-- <!--end::Edit--> --}}
                {{-- <!--begin::Action--> --}}
                <div id="kt_signin_password_button" class="ms-auto">
                    <button type="button" class="btn btn-light btn-active-light-primary">Réinitialiser le mot de passe</button>
                </div>
                {{-- <!--end::Action--> --}}
            </div>
            {{-- <!--end::Password--> --}}
            {{-- <!--begin::Notice--> --}}
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed p-6">
                {{-- <!--begin::Icon--> --}}
                {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen048.svg--> --}}
                <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" d="M20.5543 4.37824L12.1798 2.02473C12.0626 1.99176 11.9376 1.99176 11.8203 2.02473L3.44572 4.37824C3.18118 4.45258 3 4.6807 3 4.93945V13.569C3 14.6914 3.48509 15.8404 4.4417 16.984C5.17231 17.8575 6.18314 18.7345 7.446 19.5909C9.56752 21.0295 11.6566 21.912 11.7445 21.9488C11.8258 21.9829 11.9129 22 12.0001 22C12.0872 22 12.1744 21.983 12.2557 21.9488C12.3435 21.912 14.4326 21.0295 16.5541 19.5909C17.8169 18.7345 18.8277 17.8575 19.5584 16.984C20.515 15.8404 21 14.6914 21 13.569V4.93945C21 4.6807 20.8189 4.45258 20.5543 4.37824Z" fill="currentColor" />
                        <path d="M10.5606 11.3042L9.57283 10.3018C9.28174 10.0065 8.80522 10.0065 8.51412 10.3018C8.22897 10.5912 8.22897 11.0559 8.51412 11.3452L10.4182 13.2773C10.8099 13.6747 11.451 13.6747 11.8427 13.2773L15.4859 9.58051C15.771 9.29117 15.771 8.82648 15.4859 8.53714C15.1948 8.24176 14.7183 8.24176 14.4272 8.53714L11.7002 11.3042C11.3869 11.6221 10.874 11.6221 10.5606 11.3042Z" fill="currentColor" />
                    </svg>
                </span>
                {{-- <!--end::Svg Icon--> --}}
                {{-- <!--end::Icon--> --}}
                {{-- <!--begin::Wrapper--> --}}
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    {{-- <!--begin::Content--> --}}
                    <div class="mb-3 mb-md-0 fw-semibold">
                        <h4 class="text-gray-900 fw-bold">Sécurise votre compte</h4>
                        <div class="fs-6 text-gray-700 pe-7">L'authentification à deux facteurs ajoute une couche de sécurité supplémentaire à votre compte. Pour vous connecter, vous devrez en plus fournir un code à 6 chiffres.</div>
                    </div>
                    {{-- <!--end::Content--> --}}
                    {{-- <!--begin::Action--> --}}
                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">Activer</a>
                    {{-- <!--end::Action--> --}}
                </div>
                {{-- <!--end::Wrapper--> --}}
            </div>
            {{-- <!--end::Notice--> --}}
        </div>
        {{-- <!--end::Card body--> --}}
    </div>
    {{-- <!--end::Content--> --}}
</div>
