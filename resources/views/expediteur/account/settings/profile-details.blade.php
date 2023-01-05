<div class="card mb-5 mb-xl-10">
    {{-- <!--begin::Card header--> --}}
    <div class="card-header border-0 cursor-pointer" role="button"
        data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
        aria-expanded="true" aria-controls="kt_account_profile_details">
        {{-- <!--begin::Card title--> --}}
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Détails du profil</h3>
        </div>
        {{-- <!--end::Card title--> --}}
    </div>
    {{-- <!--begin::Card header--> --}}
    {{-- <!--begin::Content--> --}}
    <div id="kt_account_settings_profile_details" class="collapse show">
        {{-- <!--begin::Form--> --}}
        <form id="kt_account_profile_details_form" class="form" method="POST"
            action="{{route('user.updateProfileDetails')}}" enctype="multipart/form-data" novalidate="novalidate">
            {{-- <!--begin::Card body--> --}}
            <div class="card-body border-top p-9">
                {{-- <!--begin::Input group--> --}}
                <div class="row mb-6">
                    {{-- <!--begin::Label--> --}}
                    <label for="avatar" class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                    {{-- <!--end::Label--> --}}
                    {{-- <!--begin::Col--> --}}
                    <div class="col-lg-8 fv-row">
                        {{-- <!--begin::Image input--> --}}
                        <div id="kt_avatar_input" class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('assets/media/svg/avatars/blank.svg')">
                            {{-- <!--begin::Preview existing avatar--> --}}
                            <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{$avatar}}'); background-position: center center;"></div>
                            {{-- <!--end::Preview existing avatar--> --}}
                            {{-- <!--begin::Label--> --}}
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                data-bs-dismiss="click" title="Changer d'avatar">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                {{-- <!--begin::Inputs--> --}}
                                <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" value="{{ ($has_avatar) ? $avatar : old('avatar') }}">
                                <input type="hidden" name="avatar_remove" id="remove_avatar">
                                <input type="hidden" name="avatar_input_action" id="avatar_input_action" value="none" required>
                                {{-- <!--end::Inputs--> --}}
                            </label>
                            {{-- <!--end::Label--> --}}
                            {{-- <!--begin::Cancel--> --}}
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                data-bs-dismiss="click" title="Annuler l'avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            {{-- <!--end::Cancel--> --}}
                            {{-- <!--begin::Remove--> --}}
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                data-bs-dismiss="click" title="Supprimer l'avatar">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            {{-- <!--end::Remove--> --}}
                        </div>
                        {{-- <!--end::Image input--> --}}
                        {{-- <!--begin::Hint--> --}}
                        <div class="form-text text-gray-600 text-gray-700-on-dark">Types de fichiers autorisés: png, jpg, jpeg.</div>
                        {{-- <!--end::Hint--> --}}
                    </div>
                    {{-- <!--end::Col--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
                {{-- <!--begin::Input group--> --}}
                <div class="row mb-6">
                    {{-- <!--begin::Label--> --}}
                    <label for="prenom" class="col-lg-4 col-form-label fw-semibold fs-6 required">Prénom et nom</label>
                    {{-- <!--end::Label--> --}}
                    {{-- <!--begin::Col--> --}}
                    <div class="col-lg-8">
                        {{-- <!--begin::Row--> --}}
                        <div class="row">
                            {{-- <!--begin::Col--> --}}
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="prenom" id="prenom"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 text-gray-900-on-dark"
                                    placeholder="Prénom" value="{{Auth::user()->prenom}}" required>
                            </div>
                            {{-- <!--end::Col--> --}}
                            {{-- <!--begin::Col--> --}}
                            <div class="col-lg-6 fv-row">
                                <input type="text" name="nom" id="nom"
                                    class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                                    placeholder="Nom" value="{{Auth::user()->nom}}" required>
                            </div>
                            {{-- <!--end::Col--> --}}
                        </div>
                        {{-- <!--end::Row--> --}}
                    </div>
                    {{-- <!--end::Col--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
                {{-- <!--begin::Input group--> --}}
                <div class="row mb-6">
                    {{-- <!--begin::Label--> --}}
                    <label for="email" class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span>Adresse e-mail</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="L'adresse e-mail doit être active"></i>
                    </label>
                    {{-- <!--end::Label--> --}}
                    {{-- <!--begin::Col--> --}}
                    <div class="col-lg-8 fv-row">
                        <input type="email" name="email" id="email"
                            class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                            placeholder="Adresse e-mail" value="{{((Auth::user()->hasEmail()) ? Auth::user()->email : '')}}">
                    </div>
                    {{-- <!--end::Col--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
                {{-- <!--begin::Input group--> --}}
                <div class="row mb-6">
                    {{-- <!--begin::Label--> --}}
                    <label for="entreprise" class="col-lg-4 col-form-label fw-semibold fs-6">Entreprise</label>
                    {{-- <!--end::Label--> --}}
                    {{-- <!--begin::Col--> --}}
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="entreprise" id="entreprise"
                            class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                            placeholder="Nom de l'entreprise" value="{{(($__expediteur->hasCompany()) ? $__expediteur->entreprise : '')}}">
                    </div>
                    {{-- <!--end::Col--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
                {{-- <!--begin::Input group--> --}}
                <div class="row mb-6">
                    {{-- <!--begin::Label--> --}}
                    <label for="siteweb" class="col-lg-4 col-form-label fw-semibold fs-6">Site web</label>
                    {{-- <!--end::Label--> --}}
                    {{-- <!--begin::Col--> --}}
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="siteweb" id="siteweb"
                            class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                            placeholder="Site web" value="{{(($__expediteur->hasWebsite()) ? $__expediteur->siteweb : '')}}">
                    </div>
                    {{-- <!--end::Col--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
                {{-- <!--begin::Input group--> --}}
                <div class="row mb-6">
                    {{-- <!--begin::Label--> --}}
                    <label for="adresse" class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Adresse</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Adresse de résidence"></i>
                    </label>
                    {{-- <!--end::Label--> --}}
                    {{-- <!--begin::Col--> --}}
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="adresse" id="adresse"
                            class="form-control form-control-lg form-control-solid text-gray-900-on-dark"
                            placeholder="Adresse" value="{{$__expediteur->adresse}}" required>
                    </div>
                    {{-- <!--end::Col--> --}}
                </div>
                {{-- <!--end::Input group--> --}}
                {{-- <!--begin::Modal--> --}}
                @include('expediteur.account.settings.confirm-profile-details')
                {{-- <!--end::Modal--> --}}
            </div>
            {{-- <!--end::Card body--> --}}
            {{-- <!--begin::Actions--> --}}
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                @csrf
                <input type="hidden" name="phone" value="{{Auth::user()->phone}}">
                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Annuler</button>
                <button type="submit" id="kt_account_profile_details_submit" class="btn btn-primary">
                    {{-- <!--begin::Indicator label--> --}}
                    <span class="indicator-label">Sauvegarder</span>
                    {{-- <!--end::Indicator label--> --}}
                    {{-- <!--begin::Indicator progress--> --}}
                    <span class="indicator-progress">
                        <span>Patientez ...</span>
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    {{-- <!--end::Indicator progress--> --}}
                </button>
            </div>
            {{-- <!--end::Actions--> --}}
        </form>
        {{-- <!--end::Form--> --}}
    </div>
    {{-- <!--end::Content--> --}}
</div>
