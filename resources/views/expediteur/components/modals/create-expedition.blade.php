<div id="kt_modal_create_expedition" class="modal fade"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    {{-- <!--begin::Modal dialog--> --}}
    <div class="modal-dialog modal-fullscreen" role="document">
        {{-- <!--begin::Modal content--> --}}
        <div id="kt_modal_create_expedition_content" class="modal-content">
            {{-- <!--begin::Modal header--> --}}
            <div class="modal-header">
                {{-- <!--begin::Modal title--> --}}
                <h2>Expédition | {{date('d-m-Y')}}</h2>
                {{-- <!--end::Modal title--> --}}
                {{-- <!--begin::Close--> --}}
                <div id="btn_close_modal_create_expedition"
                    class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg--> --}}
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    {{-- <!--end::Svg Icon--> --}}
                </div>
                {{-- <!--end::Close--> --}}
            </div>
            {{-- <!--end::Modal header--> --}}
            {{-- <!--begin::Modal body--> --}}
            <div class="modal-body py-lg-10 px-lg-10">
                {{-- <!--begin::Stepper--> --}}
                <div id="kt_modal_create_expedition_stepper"
                    class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid">
                    {{-- <!--begin::Aside--> --}}
                    <div class="d-flex justify-content-xl-start flex-row-auto w-100 w-xl-350px">
                        {{-- <!--begin::Nav Wrapper--> --}}
                        <div class="d-flex flex-row-fluid justify-content-center p-10">
                            {{-- <!--begin::Nav--> --}}
                            @include('expediteur.components.expeditions.creation.navigation')
                            {{-- <!--end::Nav--> --}}
                        </div>
                        {{-- <!--end::Nav Wrapper--> --}}
                    </div>
                    {{-- <!--end::Aside--> --}}
                    {{-- <!--begin::Content--> --}}
                    <div class="flex-row-fluid">
                        {{-- <!--begin::Wrapper--> --}}
                        <div class="w-lg-650px w-xl-700px py-10 mx-auto">
                            {{-- <!--begin::Form--> --}}
                            @include('expediteur.components.expeditions.creation.form')
                            {{-- <!--end::Form--> --}}
                        </div>
                        {{-- <!--end::Wrapper--> --}}
                    </div>
                    {{-- <!--end::Content--> --}}
                </div>
                {{-- <!--end::Stepper--> --}}
            </div>
            {{-- <!--end::Modal body--> --}}
        </div>
        {{-- <!--end::Modal content--> --}}
    </div>
    {{-- <!--end::Modal dialog--> --}}
</div>
