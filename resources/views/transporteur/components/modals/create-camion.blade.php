<div id="kt_modal_create_camion" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    {{-- <!--begin::Modal dialog--> --}}
    <div class="modal-dialog modal-dialog-centered mw-900px">
        {{-- <!--begin::Modal content--> --}}
        <div class="modal-content">
            {{-- <!--begin::Modal header--> --}}
            <div class="modal-header">
                {{-- <!--begin::Modal title--> --}}
                <h2>Ajout véhicule</h2>
                {{-- <!--end::Modal title--> --}}
                {{-- <!--begin::Close--> --}}
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
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
                <div id="kt_modal_create_expedition_stepper" class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid">
                    {{-- <!--begin::Content--> --}}
                    <div class="flex-row-fluid py-lg-5 px-lg-15">
                        @php
                            use App\Models\MarqueCamion;
                            use App\Models\TypesVehicule;

                            $types = TypesVehicule::all();
                            $marques = MarqueCamion::all();
                        @endphp
                        {{-- <!--begin::Form--> --}}
                        @include('transporteur.components.vehicules.creation.form')
                        {{-- <!--end::Form--> --}}
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
