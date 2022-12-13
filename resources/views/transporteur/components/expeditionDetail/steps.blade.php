@php
use App\Models\EtatExpedition;
@endphp
<!--begin::Form-->
<form class="form w-lg-500px mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
    <!--begin::Group-->
    <div class="mb-5">
        <!--begin::Step 1-->
        <div class="flex-column current" data-kt-stepper-element="content">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">Etat</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    @if ($suivi_charge)
                    Chargé à: {{ $suivi_charge->created_at }}
                    @else
                    <button type="button" class="btn btn-success" id="bouton_modifier_etat_1"
                        onclick="update_suivi({{ $expedition->id }},{{ EtatExpedition::CHARGE }},this)"> Confirmer
                        Chargement </button>
                    @endif
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--begin::Step 1-->

        <!--begin::Step 1-->
        <div class="flex-column" data-kt-stepper-element="content">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">Etat</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    @if ($suivi_transit)
                    Arrivé le: {{$suivi_transit->created_at}}
                    @else
                    @if ($suivi_charge)
                    <button type="button" class="btn btn-success" id="bouton_modifier_etat_2"
                        onclick="update_suivi({{ $expedition->id }},{{ EtatExpedition::EN_TRANSIT }},this)">
                        Confirmer Arrivee </button>
                    @else
                    <span class="btn btn-danger">Pas chargé d'abord </span>
                    @endif
                    @endif
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--begin::Step 1-->

        <!--begin::Step 1-->
        <div class="flex-column" data-kt-stepper-element="content">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">Etat</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    @if ($suivi_decharge)
                    Déchargé le: {{ $suivi_decharge->created_at }}
                    @else
                    @if ($suivi_transit)
                    <button type="button" class="btn btn-success" id="bouton_modifier_etat_3"
                        onclick="update_suivi({{ $expedition->id }},{{ EtatExpedition::DECHARGE }},this)">
                        Confirmer
                        Déchargement </button>
                    @else
                    <span class="btn btn-danger">Pas encore arrivée </span>
                    @endif
                    @endif
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--begin::Step 1-->

        <!--begin::Step 1-->
        <div class="flex-column" data-kt-stepper-element="content">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title align-items-start flex-column">Etat</h3>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    @if ($suivi_termine)
                    Terminé le: {{ $suivi_termine->created_at }}
                    @else
                    @if ($suivi_decharge)
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="show_modal_suivi()">
                        Finaliser
                    </button>
                    @else
                    <span class="btn btn-danger">Pas encore déchargé </span>
                    @endif

                    @endif
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!--begin::Step 1-->
    </div>
    <!--end::Group-->

    <!--begin::Actions-->
    <div class="d-flex flex-stack">
        <!--begin::Wrapper-->
        <div class="me-2">
            <button type="button" class="btn btn-light btn-active-light-primary" data-kt-stepper-action="previous">
                Back
            </button>
        </div>
        <!--end::Wrapper-->

        <!--begin::Wrapper-->
        <div>
            <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                Continue
            </button>
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->