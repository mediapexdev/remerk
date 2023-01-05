<div id="kt_profile_details_view" class="card mb-5 mb-xl-10">
    {{-- <!--begin::Card header--> --}}
    <div class="card-header">
        {{-- <!--begin::Card title--> --}}
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Détails du profil</h3>
        </div>
        {{-- <!--end::Card title--> --}}
        {{-- <!--begin::Action--> --}}
        <button type="button" id="btn_edit_profile" class="btn btn-primary align-self-center">Editer le profil</button>
        {{-- <!--end::Action--> --}}
    </div>
    {{-- <!--begin::Card header--> --}}
    {{-- <!--begin::Card body--> --}}
    <div class="card-body p-9">
        {{-- <!--begin::Row--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">Prénom et nom</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800 text-gray-900-on-dark">{{Auth::user()->fullName()}}</span>
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        {{-- <!--end::Row--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">
                <span>Adresse e-mail</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="L'adresse e-mail doit être active"></i>
            </label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 text-gray-900-on-dark me-2">{{((Auth::user()->hasEmail()) ? Auth::user()->email : 'Aucune')}}</span>
                {{-- <span class="badge badge-success">Vérifié</span> --}}
            </div>
            <!--end::Col-->
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">
                <span>Numéro de téléphone</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Le numéro de téléphone doit être actif"></i>
            </label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8 d-flex align-items-center">
                <span class="fw-bold fs-6 text-gray-800 text-gray-900-on-dark me-2">{{Auth::user()->formattedPhoneNumber()}}</span>
                <span class="badge badge-success">Vérifié</span>
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">Enterprise</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8 fv-row">
                <span class="fw-semibold fs-6 text-gray-800 text-gray-900-on-dark">
                    {{(($__transporteur->hasCompany()) ? $__transporteur->entreprise : 'Aucune')}}
                </span>
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">Site web</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8">
                @php
                    $link_text = 'Aucun';
                    $link_href = $link_target = '';
                    $link_classes = 'fw-semibold fs-6 text-gray-800 text-gray-900-on-dark';

                    if($__transporteur->hasWebsite()){
                        $link_text = $__transporteur->siteweb;
                        $link_classes .= ' text-hover-primary';
                        $link_href = ('href=' . $__transporteur->siteweb);
                        $link_target = 'target=_blank';
                    }
                @endphp
                <a class="{{$link_classes}}" {{$link_href}} {{$link_target}}>{{$link_text}}</a>
                @php
                    unset($link_text, $link_href, $link_target, $link_classes);
                @endphp
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">
                <span>Adresse</span>
                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Adresse de résidence"></i>
            </label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800 text-gray-900-on-dark">{{$__transporteur->adresse}}</span>
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Input group--> --}}
        <div class="row mb-7">
            {{-- <!--begin::Label--> --}}
            <label class="col-lg-4 fw-semibold text-gray-700 text-gray-800-on-dark">Communication</label>
            {{-- <!--end::Label--> --}}
            {{-- <!--begin::Col--> --}}
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800 text-gray-900-on-dark">
                    {{(isset(Auth::user()->email) ? 'E-mail, ' : '')}}Téléphone
                </span>
            </div>
            {{-- <!--end::Col--> --}}
        </div>
        {{-- <!--end::Input group--> --}}
        {{-- <!--begin::Notice--> --}}
        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
            {{-- <!--begin::Icon--> --}}
            {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg--> --}}
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="currentColor" />
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="currentColor" />
                </svg>
            </span>
            {{-- <!--end::Svg Icon--> --}}
            {{-- <!--end::Icon--> --}}
            {{-- <!--begin::Wrapper--> --}}
            <div class="d-flex flex-stack flex-grow-1">
                {{-- <!--begin::Content--> --}}
                <div class="fw-semibold">
                    <h4 class="text-gray-900 fw-bold">Nous avons besoin de votre attention !</h4>
                    <div class="fs-6 text-gray-700 text-gray-800-on-dark">
                        <span>Pour changer votre numéro de téléphone, veuillez</span>
                        <a class="fw-bold">nous contacter</a>.
                    </div>
                </div>
                {{-- <!--end::Content--> --}}
            </div>
            {{-- <!--end::Wrapper--> --}}
        </div>
        {{-- <!--end::Notice--> --}}
    </div>
    {{-- <!--end::Card body--> --}}
</div>
