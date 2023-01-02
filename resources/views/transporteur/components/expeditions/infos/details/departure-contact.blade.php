@php
    use App\Core\Util;

    $expediteur = $expedition->expediteur;
    $avatar = (($expediteur->hasAvatar()) ? $expediteur->avatar() : Util::getDefaultUserAvatar());
@endphp
<div class="card card-flush py-4 flex-row-fluid">
    {{-- <!--begin::Card header--> --}}
    <div class="card-header">
        {{-- <!--begin::Card Title--> --}}
        <div class="card-title">
            <h3>Contact au départ</h3>
        </div>
        {{-- <!--end::Card Title--> --}}
    </div>
    {{-- <!--end::Card header--> --}}
    {{-- <!--begin::Card body--> --}}
    <div class="card-body pt-0">
        {{-- <!--begin::Table Wrapper--> --}}
        <div class="table-responsive">
            {{-- <!--begin::Table--> --}}
            <table class="table align-middle fs-6 gy-5 mb-0 min-w-300px">
                {{-- <!--begin::Table body--> --}}
                <tbody class="fw-semibold text-gray-700 text-gray-800-in-dark">
                    {{-- <!--begin::Departure Contact Info--> --}}
                    @if (!$expedition->depart->hasContact())
                    <tr>
                        <td class="fw-bold text-center" scope="row" colspan="2">
                            <span>Aucun</span>
                        </td>
                    </tr>
                    @else
                    {{-- <!--begin::Departure Full Name--> --}}
                    <tr>
                        <td scope="row">
                            <div class="d-flex align-items-center">
                                {{-- <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg--> --}}
                                <span class="svg-icon svg-icon-2 me-2 text-gray-600-in-dark">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3" d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z" fill="currentColor" />
                                        <path d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z" fill="currentColor" />
                                        <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
                                    </svg>
                                </span>
                                {{-- <!--end::Svg Icon--> --}}
                                <span>Prénom et Nom</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->depart->nom_contact_sur_place }}</span>
                        </td>
                    </tr>
                    {{-- <!--end::Departure Full Name--> --}}
                    {{-- <!--begin::Separator--> --}}
                    <tr>
                        <td class="py-0" scope="row" colspan="2">
                            <div class="separator my-0"></div>
                        </td>
                    </tr>
                    {{-- <!--end::Separator--> --}}
                    {{-- <!--begin::Departure Phone Number--> --}}
                    <tr>
                        <td scope="row">
                            <div class="d-flex align-items-center">
                                {{-- <!--begin::Svg Icon | path: icons/duotune/electronics/elc002.svg--> --}}
                                <span class="svg-icon svg-icon-2 me-2 text-gray-600-in-dark">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6 21C6 21.6 6.4 22 7 22H17C17.6 22 18 21.6 18 21V20H6V21Z" fill="currentColor"/>
                                        <path opacity="0.3" d="M17 2H7C6.4 2 6 2.4 6 3V20H18V3C18 2.4 17.6 2 17 2Z" fill="currentColor"/>
                                        <path d="M12 4C11.4 4 11 3.6 11 3V2H13V3C13 3.6 12.6 4 12 4Z" fill="currentColor"/>
                                    </svg>
                                </span>
                                {{-- <!--end::Svg Icon--> --}}
                                <span>Numéro de téléphone</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ Util::formatPhoneNumber($expedition->depart->phone_contact_sur_place) }}</span>
                        </td>
                    </tr>
                    {{-- <!--end::Departure Phone Number--> --}}
                    @endif
                    {{-- <!--end::Departure Contact Info--> --}}
                </tbody>
                {{-- <!--end::Table body--> --}}
            </table>
            {{-- <!--end::Table--> --}}
        </div>
        {{-- <!--end::Table Wrapper--> --}}
    </div>
    {{-- <!--end::Card body--> --}}
</div>
