/**
 * 
 */
$(() => {
    /**
     * 
     */
    $('.expediteur_title, .expediteur_avatar').click(e => {
        const ui_blocker = new KTBlockUI(document.querySelector('body'), {
            message: '<div class="blockui-message"><span class="spinner-border spinner-border-sm align-middle ms-2 text-primary"></span>Loading...</div>'
        });
        ui_blocker.block();
        const that = e.currentTarget;
        e.preventDefault();
        $.ajax({
            method: $(that).attr('data-method'),
            url: $(that).attr('data-route'),
            data: $(that).serialize()
        })
        .done((data) => {
            const modal_wrapper = $('#modal_details_expediteur_wrapper');
            modal_wrapper.html(data);
            ui_blocker.release();
            ui_blocker.destroy();
            modal_wrapper.find('#modal_details_expediteur').modal('show');
        })
        .fail((data) => {
            console.log(data);
        });
    });
});
