@php
use App\Core\Util;

$transporteur = $postulant->transporteur;
$avatar = (($transporteur->hasAvatar()) ? $transporteur->avatar() : Util::getDefaultUserAvatar());
@endphp

{{-- <!--begin::Modal--> --}}
<div id="modal_details_postulant" class="modal fade" tabindex="-1" role="dialog">
    {{-- <!--begin::Modal dialog--> --}}
    <div class="modal-dialog modal-dialog-centered" role="document">
        {{-- <!--begin::Modal content--> --}}
        <div class="modal-content">
            {{-- <!--begin::Modal header--> --}}
            <div class="modal-header">
                {{-- <!--begin::Modal Title--> --}}
                <h5 class="modal-title h3">Détails postulant</h5>
                {{-- <!--end::Modal Title--> --}}
                {{-- <!--begin::Button close--> --}}
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                {{-- <!--begin::Close--> --}}
                <button type="button" class="btn btn-sm btn-icon btn-active-color-primary ms-2" data-bs-dismiss="modal">
                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg--> --}}
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    {{-- <!--end::Svg Icon--> --}}
                </button>
                {{-- <!--end::Close--> --}}
                {{-- <!--end::Button close--> --}}
            </div>
            {{-- <!--end::Modal header--> --}}
            {{-- <!--begin::Modal body--> --}}
            <div class="modal-body" id="detail_postulant">
                {{-- <!--begin::Card--> --}}
                <div class="card card-flush flex-row-fluid">
                    {{-- <!--begin::Card body--> --}}
                    <div class="card-body p-0">
                        {{-- <!--begin::Table Wrapper--> --}}
                        <div class="table-responsive">
                            {{-- <!--begin::Table--> --}}
                            <table class="table table-sm align-middle fs-6 gy-5 mb-0 min-w-300px">
                                {{-- <!--begin::Table body--> --}}
                                <tbody class="fw-semibold text-gray-700">
                                    {{-- <!--begin::transporteur Info--> --}}
                                    <tr>
                                        <td class="text-gray-700 text-muted">
                                            <div class="d-flex align-items-center">
                                                {{-- <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg--> --}}
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
                                                        <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
                                                        <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                {{-- <!--end::Svg Icon--> --}}
                                                <span>Transporteur</span>
                                            </div>
                                        </td>
                                        <td class="text-gray-700 fw-bold text-end">
                                            <div class="d-flex align-items-center justify-content-end">
                                                {{-- <!--begin::Full Name--> --}}
                                                <span class="text-gray-700">{{ $transporteur->fullName() }}</span>
                                                {{-- <!--end::Full Name--> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <!--end::transporteur Info--> --}}
                                    {{-- <!--begin::Separator--> --}}
                                    <tr>
                                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                                            <div class="separator my-0"></div>
                                        </td>
                                    </tr>
                                    {{-- <!--end::Separator--> --}}
                                    {{-- <!--begin::vehicle number --> --}}
                                    <tr>
                                        <td class="text-gray-700 text-muted">
                                            <div class="d-flex align-items-center">
                                                {{-- <!--begin::Svg Icon | Font Awesome Icon: truck (<i class="fa-solid fa-truck"></i>)--> --}}
                                                <span class="svg-icon svg-icon-2 me-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 640 512" fill="currentColor">
                                                        <path d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM208 416c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zm272 48c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z" />
                                                    </svg>
                                                </span>
                                                {{-- <!--end::Svg Icon--> --}}
                                                <span>Nombre de véhicules</span>
                                            </div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            <span>{{ $transporteur->vehicules()->count() }}</span>
                                        </td>
                                    </tr>
                                    {{-- <!--end::vehicle number--> --}}
                                    {{-- <!--begin::Separator--> --}}
                                    <tr>
                                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                                            <div class="separator my-0"></div>
                                        </td>
                                    </tr>
                                    {{-- <!--end::Separator--> --}}
                                    {{-- <!--begin::Vehicle Type--> --}}
                                    <tr>
                                        <td class="text-gray-700 text-muted">
                                            <div class="d-flex align-items-center">
                                                {{-- <!--begin::Svg Icon | Bootstrap Icon: number (<i class="bi bi-123"></i>)--> --}}
                                                <span class="svg-icon svg-icon-2 me-2 text-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-123" viewBox="0 0 16 16">
                                                        <path d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                                                    </svg>
                                                </span>
                                                {{-- <!--end::Svg Icon--> --}}
                                                <span>Nombre d'expédition</span>
                                            </div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            <span>{{ $transporteur->expeditionsEndedCount() }}</span>
                                        </td>
                                    </tr>
                                    {{-- <!--end::Vehicle Type--> --}}
                                    {{-- <!--begin::Separator--> --}}
                                    <tr>
                                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                                            <div class="separator my-0"></div>
                                        </td>
                                    </tr>
                                    {{-- <!--end::Separator--> --}}
                                    {{-- <!--begin::Vehicles Number--> --}}
                                    <tr>
                                        <td class="text-gray-700 text-muted">
                                            <div class="d-flex align-items-center">
                                                {{-- <!--begin::Svg Icon | Bootstrap Icon: Star (<i class="bi bi-star"></i>)--> --}}
                                                <span class="svg-icon svg-icon-2 me-2 text-gray-600">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                                                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" />
                                                    </svg>
                                                </span>
                                                {{--end::Svg Icon--}}
                                                <span>Notes</span>
                                            </div>
                                        </td>
                                        <td class="fw-bold text-end">
                                            <div class="d-flex justify-content-end">
                                                {{-- <!--begin::Note--> --}}
                                                <div class="rating">
                                                    <div class="rating-label checked">
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                    <div class="rating-label checked">
                                                        <i class="bi bi-star-fill"></i>
                                                    </div>
                                                </div>
                                                {{-- <!--end::Note--> --}}
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- <!--end::Vehicles Number--> --}}
                                </tbody>
                                {{-- <!--end::Table body--> --}}
                            </table>
                            {{-- <!--end::Table--> --}}
                        </div>
                        {{-- <!--end::Table Wrapper--> --}}
                    </div>
                    {{-- <!--end::Card body--> --}}
                </div>
                {{-- <!--end::Card--> --}}
            </div>
            {{-- <!--end::Modal body--> --}}
            {{-- <!--begin::Modal footer--> --}}
            <div class="modal-footer p-0">
                {{-- <!--begin::Button close--> --}}
                {{-- <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button> --}}
                <button type="button" class="btn btn-light btn-active-light-primary w-100 m-0" data-bs-dismiss="modal"
                    style="border-top-left-radius: 0!important; border-top-right-radius: 0 !important;">Fermer</button>
                {{-- <!--end::Button close--> --}}
            </div>
            {{-- <!--end::Modal footer--> --}}
        </div>
        {{-- <!--end::Modal content--> --}}
    </div>
    {{-- <!--end::Modal dialog--> --}}
</div>
{{-- <!--end::Modal--> --}}
