/**
 * 
 */
$(() => {
    /**
     *
    */
    document.addEventListener('click', function (e) {
        const element = e.target;

        if(element.classList.contains('btn_action_facture')) {
            const facture_id = element.getAttribute('data-facture-id');
            // Submit form
            const form = document.querySelector('#form_show_facture');
            form.querySelector('input[name="facture_id"]').value = facture_id;
            form.submit();
        }
    }, false);
});
