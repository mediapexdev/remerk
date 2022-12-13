@php
use App\Core\Util;

$expediteur = $expedition->expediteur;
$avatar = (($expediteur->hasAvatar()) ? $expediteur->avatar() : Util::getDefaultUserAvatar());
@endphp
<div class="card card-flush py-4 flex-row-fluid">
    {{--
    <!--begin::Card header--> --}}
    <div class="card-header">
        {{--
        <!--begin::Card Title--> --}}
        <div class="card-title">
            <h3>Contact à l'arrivée</h3>
        </div>
        {{--
        <!--end::Card Title--> --}}
    </div>
    {{--
    <!--end::Card header--> --}}
    {{--
    <!--begin::Card body--> --}}
    <div class="card-body pt-0">
        {{--
        <!--begin::Table Wrapper--> --}}
        <div class="table-responsive">
            {{--
            <!--begin::Table--> --}}
            <table class="table align-middle fs-6 gy-5 mb-0 min-w-300px">
                {{--
                <!--begin::Table body--> --}}
                <tbody class="fw-semibold text-gray-700">
                    {{--
                    <!--begin::Arrival Contact Info--> --}}
                    @if (!$expedition->arrivee->hasContact())
                    <tr>
                        <td class="fw-bold text-center" scope="row" colspan="2">
                            <span>Aucun</span>
                        </td>
                    </tr>
                    @else
                    {{--
                    <!--begin::Contact Full Name--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted" scope="row">
                            <span>Prénom et Nom</span>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->arrivee->nom_contact_sur_place }}</span>
                        </td>
                    </tr>
                    {{--
                    <!--end::Contact Full Name--> --}}
                    {{--
                    <!--begin::Separator--> --}}
                    <tr>
                        <td class="text-gray-700 py-0" scope="row" colspan="2">
                            <div class="separator mt-0 mb-0"></div>
                        </td>
                    </tr>
                    {{--
                    <!--end::Separator--> --}}
                    {{--
                    <!--begin::Contact Phone Number--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted" scope="row">
                            <span>Numéro de téléphone</span>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ Util::formatPhoneNumber($expedition->arrivee->phone_contact_sur_place) }}</span>
                        </td>
                    </tr>
                    {{--
                    <!--end::Contact Phone Number--> --}}
                    @endif
                    {{--
                    <!--end::Arrival Contact Info--> --}}
                </tbody>
                {{--
                <!--end::Table body--> --}}
            </table>
            {{--
            <!--end::Table--> --}}
        </div>
        {{--
        <!--end::Table Wrapper--> --}}
    </div>
    {{--
    <!--end::Card body--> --}}
</div>