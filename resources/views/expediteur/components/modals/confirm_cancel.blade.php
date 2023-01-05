<div class="modal fade" id="kt_modal_confirm_cancel" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-700px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header p-1 m-2 border-0 d-flex justify-content-end">
                <!--begin::Close-->
                <button class="btn px-4 py-2 btn-sm btn-facebook me-1" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg"></i>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-10 pt-0 pb-15">
                <!--begin::Users-->
                <div class="mh-475px scroll-y me-n7 pe-7">
                    <!--begin::User-->
                    <div class="border border-hover-danger p-5 rounded mb-5">
                        <!--begin::Wrapper-->
                        <div class="p-0">
                            <!--begin::Section-->
                            <div class="d-flex flex-column fs-6 text-center">
                                <!--begin::Text-->
                                <p class="h3 title fw-semibold mb-4">Cette expédition est en cours, <br> êtes-vous sûr de vouloir Annuler ?</p>
                                <div class="img">
                                    <img src="{{URL::asset('assets/media/illustrations/sigma-1/20-dark.png')}}" class="img-fluid h-175px" alt="Illustration">
                                </div>
                                <!--end::Text-->
                                <!--begin::Tag-->
                                <div class="d-flex text-gray-700 fw-semibold">
                                    <p class="d-inline border border-2 rounded me-3 p-1 px-2">
                                        <i class="bi bi-exclamation-triangle theme-dark-show fs-3"></i>
                                        <i class="bi bi-exclamation-triangle-fill theme-light-show fs-3"></i>
                                        En cliquand sur OUI vous serait rembourser avec -15 % de la transaction.</p>
                                </div>
                                <!--end::Tag-->
                                <div class="m-2">
                                    <button class="btn btn-sm btn-light-instagram border-active-dander">ANNULER L'EXPÉDITION</button>
                                </div>
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Users-->
            </div>
            <!--end::Modal Body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
