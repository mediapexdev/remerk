<!--begin::Toolbar container-->
<div class="d-flex flex-stack">
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
        <!--begin::Title-->
        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
            Expedition : {{ $expedition->string_id }}
        </h1>
        <!--end::Title-->
        <!--begin::Breadcrumb-->
        <div class="d-flex flex-wrap flex-stack gap-5 gap-lg-10">
            {{--
            <!--begin:::Tabs--> --}}
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-semibold">
                {{--
                <!--begin:::Tab item--> --}}
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" data-bs-toggle="tab"
                        href="#kt_expedition_summary">Récapitulatif</a>
                </li>
                {{--
                <!--end:::Tab item--> --}}
                {{--
                <!--begin:::Tab item--> --}}
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab"
                        href="#kt_expedition_history">Historique</a>
                </li>
                {{--
                <!--end:::Tab item--> --}}
                @if ($expedition->transporteur!==NULL)
                {{--
                <!--begin:::Tab item--> --}}
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5" data-bs-toggle="tab"
                        href="#kt_expedition_postulants">Postulants</a>
                </li>
                {{--
                <!--end:::Tab item--> --}}
                @endif
            </ul>
            {{--
            <!--end:::Tabs--> --}}
        </div>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title-->
    <!--begin::Actions-->
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <!--begin::Secondary button-->
        <a href={{ route('expeditions') }} class="btn btn-sm btn-primary">
            {{--
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr074.svg--> --}}
                <span class="svg-icon svg-icon-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.2657 11.4343L15.45 7.25C15.8642 6.83579 15.8642 6.16421 15.45 5.75C15.0358 5.33579 14.3642 5.33579 13.95 5.75L8.40712 11.2929C8.01659 11.6834 8.01659 12.3166 8.40712 12.7071L13.95 18.25C14.3642 18.6642 15.0358 18.6642 15.45 18.25C15.8642 17.8358 15.8642 17.1642 15.45 16.75L11.2657 12.5657C10.9533 12.2533 10.9533 11.7467 11.2657 11.4343Z"
                            fill="currentColor" />
                    </svg>
                </span>
                {{--
                <!--end::Svg Icon--> --}}
            Retour</a>
        <!--end::Secondary button-->
    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar container-->