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
            <h3>Détails de l'expédition</h3>
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
                <tbody class="fw-semibold text-gray-700">
                    {{-- <!--begin::Expediteur Info--> --}}
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
                                <span>Expéditeur</span>
                            </div>
                        </td>
                        <td class="text-gray-700 fw-bold text-end">
                            <div class="d-flex align-items-center justify-content-end">
                                {{-- <!--begin:: Avatar --> --}}
                                <div class="symbol symbol-circle symbol-25px overflow-hidden me-3">
                                    <div class="symbol-label">
                                        <img class="w-100" src="{{ $avatar }}" alt="{{ $expediteur->fullName() }}">
                                    </div>
                                </div>
                                {{-- <!--end::Avatar--> --}}
                                {{-- <!--begin::Full Name--> --}}
                                <span class="text-gray-700">{{ $expediteur->fullName() }}</span>
                                {{-- <!--end::Full Name--> --}}
                            </div>
                        </td>
                    </tr>
                    {{-- <!--end::Expediteur Info--> --}}
                    {{-- <!--begin::Separator--> --}}
                    <tr>
                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                            <div class="separator mt-0 mb-0"></div>
                        </td>
                    </tr>
                    {{-- <!--end::Separator--> --}}
                    {{-- <!--begin::Departure Date--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted" scope="row">
                            <div class="d-flex align-items-center">
                                {{-- <!--begin::Svg Icon | Font Awesome Icon: calendar-days (<i class="fa-solid fa-calendar-days"></i>)--> --}}
                                <span class="svg-icon svg-icon-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 576" fill="currentColor">
                                        <path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/>
                                    </svg>
                                </span>
                                {{-- <!--end::Svg Icon--> --}}
                                <span>Date prévue</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ (new \DateTime($expedition->scheduledDate(), new \DateTimeZone('UTC')))->format('d-m-Y') }}</span>
                        </td>
                    </tr>
                    {{-- <!--begin::Separator--> --}}
                    <tr>
                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                            <div class="separator mt-0 mb-0"></div>
                        </td>
                    </tr>
                    {{-- <!--end::Separator--> --}}
                    {{-- <!--end::Departure Date--> --}}
                    {{-- <!--begin::Departure Address--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted">
                            <div class="d-flex align-items-center">
                                {{-- <!--begin::Svg Icon | Font Awesome Icon: map-location-dot (<i class="fa-solid fa-map-location-dot"></i>)--> --}}
                                <span class="svg-icon svg-icon-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 576 512" fill="currentColor">
                                        <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40z"/>
                                    </svg>
                                </span>
                                {{-- <!--end::Svg Icon--> --}}
                                <span>Adresse de départ</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->adresseDepartComplet() }}</span>
                        </td>
                    </tr>
                    {{-- <!--end::Departure Address--> --}}
                    {{-- <!--begin::Separator--> --}}
                    <tr>
                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                            <div class="separator mt-0 mb-0"></div>
                        </td>
                    </tr>
                    {{-- <!--end::Separator--> --}}
                    {{-- <!--begin::Arrival Address--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted" scope="row">
                            <div class="d-flex align-items-center">
                                {{-- <!--begin::Svg Icon | Font Awesome Icon: map-location-dot (<i class="fa-solid fa-map-location-dot"></i>)--> --}}
                                <span class="svg-icon svg-icon-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 576 512" fill="currentColor">
                                        <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152V422.8c0 9.8-6 18.6-15.1 22.3L416 503V200.4zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6V451.8L32.9 502.7C17.1 509 0 497.4 0 480.4V209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77V504.3L192 449.4V255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152c22.1 0 40-17.9 40-40s-17.9-40-40-40s-40 17.9-40 40s17.9 40 40 40z"/>
                                    </svg>
                                </span>
                                {{-- <!--end::Svg Icon--> --}}
                                <span>Adresse d'arrivée</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->adresseArriveeComplet() }}</span>
                        </td>
                    </tr>
                    {{-- <!--end::Arrival Address--> --}}
                </tbody>
                {{-- <!--end::Table body--> --}}
            </table>
            {{-- <!--end::Table--> --}}
        </div>
        {{-- <!--end::Table Wrapper--> --}}
    </div>
    {{-- <!--end::Card body--> --}}
</div>
