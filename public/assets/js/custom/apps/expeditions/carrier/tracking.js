"use strict";

/**
 * On document ready
 */
KTUtil.onDOMContentLoaded(function () {
    // Stepper element
    /*const stepper_element = document.querySelector("#kt_stepper_expedition_tracking");
    // current_step = {{ $expedition->etat_expedition_id - 2 }};
    // alert(current_step)
    // Initialize Stepper
    const stepper_object = new KTStepper(stepper_element);
    // stepper_object.goTo(current_step);

    // Handle navigation click
    stepper_object.on("kt.stepper.click", function(stepper) {
        stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
    });

    // Handle next step
    stepper_object.on("kt.stepper.next", function(stepper) {
        stepper.goNext(); // go next step
    });

    // Handle previous step
    stepper_object.on("kt.stepper.previous", function(stepper) {
        stepper.goPrevious(); // go previous step
    });*/
    document.addEventListener('click', function(e){
        const element = e.target;

        if("btn_action_tracking" === element.id) {
            const expedition_id = element.getAttribute('data-expedition-id');
            const etat_expedition_id = element.getAttribute('data-expedition-etat-id');

            if(8 === parseInt(etat_expedition_id)) {
                $('#kt_modal_confirmation_delivery').modal('show');
            }
            else {
                const expedition_etat_text = element.getAttribute('data-expedition-etat-text');
                // Show dialog
                Swal.fire({
                    html: ('<div class="fw-semibold text-dark fs-6 ms-5">Voulez-vous vraiment confirmer <span class="fw-bold">' + expedition_etat_text + '</span> ?</div>'),
                    icon: "warning",
                    buttonsStyling: false,
                    showCancelButton: true,
                    confirmButtonText: "Oui",
                    cancelButtonText: 'Non',
                    customClass: {
                        confirmButton: "btn btn-warning",
                        cancelButton: 'btn btn-secondary'
                    }
                }).then(function (action) {
                    if(action.isConfirmed){
                        // Show block ui loading indication
                        const ui_blocker = new KTBlockUI(document.querySelector('body'), {
                            message: '<div class="blockui-message"><span class="spinner-border spinner-border-sm align-middle ms-2 text-primary"></span>Loading...</div>'
                        });
                        ui_blocker.block();
                        // Send request
                        axios.post('/mettre-a-jour-suivi', {
                            expedition_id,
                            etat_expedition_id
                        }).then(function(response) {
                            // Update tracking view
                            $('#tracking_steps_wrapper').html(response.data.result.html);
                            // Hide block ui loading indication
                            ui_blocker.release();
                            ui_blocker.destroy();
                            // Show dialog
                            Swal.fire({
                                text: response.data.message,
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok !",
                                customClass: {
                                    confirmButton: "btn btn-success"
                                }
                            });
                        }).catch(function(error) {
                            console.log(error);
                        });
                    }
                });
            }
        }
        else if("btn_confirm_delivery" === element.id) {
            $('#kt_modal_confirmation_delivery').modal('hide');

            const expedition_id = element.getAttribute('data-expedition-id');
            const code_confirmation = document.querySelector('[name="code_expedition"]').value;
            // Show block ui loading indication
            const ui_blocker = new KTBlockUI(document.querySelector('body'), {
                message: '<div class="blockui-message"><span class="spinner-border spinner-border-sm align-middle ms-2 text-primary"></span>Loading...</div>'
            });
            ui_blocker.block();
            // Send request
            axios.post('/finaliser-suivi', {
                expedition_id,
                code_confirmation
            }).then(function(response) {
                let icon, confirmButton;

                if("true" === response.data.success) {
                    icon = "success"
                    confirmButton = "btn btn-success"
                    // Update tracking view
                    $('#tracking_steps_wrapper').html(response.data.result.html)
                }
                else {
                    icon = "warning"
                    confirmButton = "btn btn-warning"
                }
                // Hide block ui loading indication
                ui_blocker.release();
                ui_blocker.destroy();
                // Show dialog
                Swal.fire({
                    text: response.data.message,
                    icon: icon,
                    buttonsStyling: false,
                    confirmButtonText: "Ok, compris!",
                    customClass: {
                        confirmButton: confirmButton
                    }
                });
            }).catch(function(error) {
                console.log(error);
            });
        }
    });
    $('#kt_modal_confirmation_delivery').on('shown.bs.modal', function () {
        $(this).find('#code_expedition').focus();
    });
});
