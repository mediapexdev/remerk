@php
    
    use App\Models\SuiviExpedition;
    use App\Models\EtatExpedition;
    $suivi_charge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::CHARGE]])->first();
    $suivi_transit = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::EN_TRANSIT]])->first();
    $suivi_decharge = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::DECHARGE]])->first();
    $suivi_termine = SuiviExpedition::where([['expedition_id', $expedition->id], ['etat_expedition_id', EtatExpedition::TERMINEE]])->first();
    
    $body_classes = 'app-default';
@endphp

@extends('transporteur.layout')

@section('title')
    <title>Remerk - Expéditions</title>
@endsection

@section('component-body-content')
    {{-- <!--begin::Row--> --}}
    <div class="d-block">
        {{-- <!--begin::Toolbar--> --}}
        @include('transporteur.components.expeditions.tracking.toolbar')
        {{-- <!--end::Toolbar--> --}}
        {{-- <!--begin::Content--> --}}
        <div class="d-flex flex-column gap-7 gap-lg-10">
            {{-- <!--begin::Tab content--> --}}
            <div class="tab-content">
                {{-- <!--begin::Tab pane--> --}}
                <div id="kt_expedition_tracking" class="tab-pane fade show active" role="tab-panel">
                    {{-- <!--begin::Wrapper--> --}}
                    <div class="d-flex flex-column gap-7 gap-lg-10">
                        {{-- <!--begin::Expedition Tracking--> --}}
                        {{-- @include('transporteur.components.expeditions.infos.tracking') --}}
                        <div class="card card-flush py-4 flex-row-fluid">
                            {{-- <!--begin::Card header--> --}}
                            <div class="card-header">
                                {{-- <!--begin::Card Title--> --}}
                                <div class="card-title">
                                    <h2>Suivi Expédition</h2>
                                </div>
                                {{-- <!--end::Card Title--> --}}
                            </div>
                            {{-- <!--end::Card header--> --}}
                            {{-- <!--begin::Card body--> --}}
                            <div class="card-body pt-0">
                                @include('transporteur.components.expeditionDetail.suivi')
                            </div>
                            {{-- <!--end::Card body--> --}}
                        </div>
                        {{-- <!--end::Expedition Tracking--> --}}
                    </div>
                    {{-- <!--end::Wrapper--> --}}
                </div>
                {{-- <!--end::Tab pane--> --}}
                {{-- <!--begin::Tab pane--> --}}
                <div id="kt_expedition_summary" class="tab-pane fade" role="tab-panel">
                    {{-- <!--begin::Expedition Summary--> --}}
                    @include('transporteur.components.expeditions.infos.details.index')
                    {{-- <!--end::Expedition Summary--> --}}
                </div>
                {{-- <!--end::Tab pane--> --}}
            </div>
            {{-- <!--end::Tab content--> --}}
        </div>
        {{-- <!--end::Content--> --}}
    </div>
    {{-- <!--end::Row--> --}}
@endsection

@section('component-modals')
    {{-- @include('transporteur.components.expeditionDetail.modal-suivi') --}}
    {{-- @include('transporteur.components.modals.postulat') --}}
    {{-- @include('transporteur.components.modal-voir-postulat') --}}
    @include('transporteur.components.expeditionDetail.modal-suivi')
@endsection

{{-- @section('custom-js')
<script src={{URL::asset("assets/js/custom/apps/expeditions/postulat.js")}}></script>
<script src={{URL::asset("assets/js/custom/apps/expeditions/listing/made.js")}}></script>
<script src={{URL::asset("assets/js/custom/apps/expeditions/listing/available.js")}}></script>
<script src={{URL::asset("assets/js/custom/apps/expeditions/listing/in-progress.js")}}></script>
@endsection --}}



@section('custom-js')
    <script>
        // function Update() {
        //     var $request = $.get('/refresh-suivi/' + {{ $expedition->id }}, {
        //         value: "optional_variable"
        //     }, function(result) {
        //         //callback function once server has complete request
        //         $('#card-container').html(result.html);
        //     });
        // }
        // $('document').ready(function(){
        // setInterval('Update();',3000);
        // });
        // Stepper lement
        var element = document.querySelector("#kt_stepper_example_clickable");
        current_step = {{ $expedition->etat_expedition_id - 2 }};
        // Initialize Stepper
        var stepper = new KTStepper(element);
        stepper.goTo(current_step);
        // Handle navigation click
        stepper.on("kt.stepper.click", function(stepper) {
            stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
        });

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            stepper.goNext(); // go next step
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });

        function show_modal_suivi() {
            $('#kt_modal_suivi').modal('show');

        }

        function finaliser_suivi(id_expedition, button) {
            $('#kt_modal_suivi').modal('hide');
            code = document.querySelector('#id_code_suivi').value;
            axios.post('/finaliser-suivi', {
                    id_expedition,
                    code
                })
                .then(function(response) {
                    console.log(response);
                    //Update();
                    //console.log(response.data.result.html);
                    if (response.data.success === "true") {
                        icon = "success"
                        confirmButton = "btn btn-success"
                        $('#card-container').html(response.data.result.html)
                        stepper.goNext();
                    } else {
                        icon = "warning"
                        confirmButton = "btn btn-warning"
                    }
                    Swal.fire({
                        text: response.data.message,
                        icon: icon,
                        buttonsStyling: false,
                        confirmButtonText: "Ok, compris!",
                        customClass: {
                            confirmButton: confirmButton
                        }
                    });
                })
                .catch(function(error) {
                    console.log(error);
                });
        }

        function update_suivi(id_expedition, etape, button) {
            // button = document.querySelector('bouton_modifier_etat');
            axios.post('/update-suivi', {
                    id_expedition,
                    etape
                })
                .then(function(response) {
                    console.log(response);
                    console.log(response.data.result.html);
                    $('#card-container').html(response.data.result.html)
                    stepper.goNext();
                    Swal.fire({
                        text: response.data.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-success"
                        }
                    });
                    //Update();
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    </script>
@endsection
