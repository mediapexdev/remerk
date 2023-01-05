{{-- <!--begin::Timeline--> --}}
<div class="timeline ms-n1">
    {{-- <!--begin::Timeline item--> --}}
    <div class="timeline-item align-items-center mb-4">
        {{-- <!--begin::Timeline line--> --}}
        <div class="timeline-line w-20px mt-9 mb-n14"></div>
        {{-- <!--end::Timeline line--> --}}
        {{-- <!--begin::Timeline icon--> --}}
        <div class="timeline-icon pt-1" style="margin-left: 0.7px">
            {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen015.svg--> --}}
            <span class="svg-icon svg-icon-2 svg-icon-info">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10ZM6.39999 9.89999C6.99999 8.19999 8.40001 6.9 10.1 6.4C10.6 6.2 10.9 5.7 10.7 5.1C10.5 4.6 9.99999 4.3 9.39999 4.5C7.09999 5.3 5.29999 7 4.39999 9.2C4.19999 9.7 4.5 10.3 5 10.5C5.1 10.5 5.19999 10.6 5.39999 10.6C5.89999 10.5 6.19999 10.2 6.39999 9.89999ZM14.8 19.5C17 18.7 18.8 16.9 19.6 14.7C19.8 14.2 19.5 13.6 19 13.4C18.5 13.2 17.9 13.5 17.7 14C17.1 15.7 15.8 17 14.1 17.6C13.6 17.8 13.3 18.4 13.5 18.9C13.6 19.3 14 19.6 14.4 19.6C14.5 19.6 14.6 19.6 14.8 19.5Z" fill="currentColor" />
                    <path d="M16 12C16 14.2 14.2 16 12 16C9.8 16 8 14.2 8 12C8 9.8 9.8 8 12 8C14.2 8 16 9.8 16 12ZM12 10C10.9 10 10 10.9 10 12C10 13.1 10.9 14 12 14C13.1 14 14 13.1 14 12C14 10.9 13.1 10 12 10Z" fill="currentColor" />
                </svg>
            </span>
            {{-- <!--end::Svg Icon--> --}}
        </div>
        {{-- <!--end::Timeline icon--> --}}
        {{-- <!--begin::Timeline content--> --}}
        <div class="timeline-content m-0">
            {{-- <!--begin::Label--> --}}
            <span class="fs-8 fw-bolder text-info text-uppercase">Départ</span>
            {{-- <!--begin::Label--> --}}
            {{-- <!--begin::Title--> --}}
            <span class="full-address fs-6 text-gray-600 text-gray-700-on-dark fw-semibold d-block">{{ $expedition->adresseDepartComplet() }}</span>
            {{-- <!--end::Title--> --}}
            {{-- <!--begin::Sub Title--> --}}
            <span class="short-address fs-6 fw-bold text-gray-800 text-gray-900-on-dark">{{ $expedition->depart->commune->nom }}</span>
            {{-- <!--end::Sub Title--> --}}
        </div>
        {{-- <!--end::Timeline content--> --}}
    </div>
    {{-- <!--end::Timeline item--> --}}
    {{-- <!--begin::Timeline item--> --}}
    <div class="timeline-item align-items-center">
        {{-- <!--begin::Timeline line--> --}}
        <div class="timeline-line w-20px"></div>
        {{-- <!--end::Timeline line--> --}}
        {{-- <!--begin::Timeline icon--> --}}
        <div class="timeline-icon pt-1" style="margin-left: 0.7px">
            {{-- <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg--> --}}
            <span class="svg-icon svg-icon-2 svg-icon-success">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.3" d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z" fill="currentColor" />
                    <path d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z" fill="currentColor" />
                </svg>
            </span>
            {{-- <!--end::Svg Icon--> --}}
        </div>
        {{-- <!--end::Timeline icon--> --}}
        {{-- <!--begin::Timeline content--> --}}
        <div class="timeline-content m-0">
            {{-- <!--begin::Label--> --}}
            <span class="fs-8 fw-bolder text-success text-uppercase">Arrivée</span>
            {{-- <!--begin::Label--> --}}
            {{-- <!--begin::Title--> --}}
            <span class="full-address fs-6 text-gray-600 text-gray-700-on-dark fw-semibold d-block">{{ $expedition->adresseArriveeComplet() }}</span>
            {{-- <!--end::Title--> --}}
            {{-- <!--begin::Sub Title--> --}}
            <span class="short-address fs-6 fw-bold text-gray-800 text-gray-900-on-dark">{{ $expedition->arrivee->commune->nom }}</span>
            {{-- <!--end::Sub Title--> --}}
        </div>
        {{-- <!--end::Timeline content--> --}}
    </div>
    {{-- <!--end::Timeline item--> --}}
</div>
