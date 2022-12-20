<div class="card card-flush py-4 flex-row-fluid h-100">
    {{--
    <!--begin::Card header--> --}}
    <div class="card-header">
        {{--
        <!--begin::Card Title--> --}}
        <div class="card-title">
            <h3>Détails du produit/matériel</h3>
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
                    <!--begin::Material Type--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted">
                            <div class="d-flex align-items-center">
                                {{--
                                <!--begin::Svg Icon | Bootstrap Icon: Box fill (<i class="bi bi-box-fill"></i>)--> --}}
                                <span class="svg-icon svg-icon-2 me-2 pt-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-box-fill" viewBox="0 0 19 19">
                                        <path fill-rule="evenodd"
                                            d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001 6.971 2.789Zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z" />
                                    </svg>
                                </span>
                                {{--
                                <!--end::Svg Icon--> --}}
                                <span>Type de produit</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->matiereType() }}</span>
                        </td>
                    </tr>
                    {{--
                    <!--end::Material Type--> --}}
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
                    <!--begin::Material Weight--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted">
                            <div class="d-flex align-items-center">
                                {{--
                                <!--begin::Svg Icon | Font Awesome Icon: weight (<i class="fa-solid fa-weight-scale"></i>)-->
                                --}}
                                <span class="svg-icon svg-icon-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 640 640"
                                        fill="currentColor">
                                        <path
                                            d="M384 176c0 70.7-57.3 128-128 128s-128-57.3-128-128s57.3-128 128-128s128 57.3 128 128zm7.8-112C359.5 24.9 310.7 0 256 0S152.5 24.9 120.2 64H64C28.7 64 0 92.7 0 128V448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V128c0-35.3-28.7-64-64-64H391.8zM296 224c0-10.6-4.1-20.2-10.9-27.4l33.6-78.3c3.5-8.1-.3-17.5-8.4-21s-17.5 .3-21 8.4L255.7 184c-22 .1-39.7 18-39.7 40c0 22.1 17.9 40 40 40s40-17.9 40-40z" />
                                    </svg>
                                </span>
                                {{--
                                <!--end::Svg Icon--> --}}
                                <span>Poids</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->matiereWeight() }}</span>
                        </td>
                    </tr>
                    {{--
                    <!--end::Material Weight--> --}}
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
                    <!--begin::Vehicle Type--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted">
                            <div class="d-flex align-items-center">
                                {{--
                                <!--begin::Svg Icon | Font Awesome Icon: truck (<i class="fa-solid fa-truck"></i>)-->
                                --}}
                                <span class="svg-icon svg-icon-2 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 640 512"
                                        fill="currentColor">
                                        <path
                                            d="M48 0C21.5 0 0 21.5 0 48V368c0 26.5 21.5 48 48 48H64c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H48zM416 160h50.7L544 237.3V256H416V160zM208 416c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zm272 48c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z" />
                                    </svg>
                                </span>
                                {{--
                                <!--end::Svg Icon--> --}}
                                <span>Type de camion</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->typeVehiculeName() }}</span>
                        </td>
                    </tr>
                    {{--
                    <!--end::Vehicle Type--> --}}
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
                    <!--begin::Vehicles Number--> --}}
                    <tr>
                        <td class="text-gray-700 text-muted">
                            <div class="d-flex align-items-center">
                                {{--
                                <!--begin::Svg Icon | Bootstrap Icon: number (<i class="bi bi-123"></i>)--> --}}
                                <span class="svg-icon svg-icon-2 me-2 text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-123" viewBox="0 0 16 16">
                                        <path
                                            d="M2.873 11.297V4.142H1.699L0 5.379v1.137l1.64-1.18h.06v5.961h1.174Zm3.213-5.09v-.063c0-.618.44-1.169 1.196-1.169.676 0 1.174.44 1.174 1.106 0 .624-.42 1.101-.807 1.526L4.99 10.553v.744h4.78v-.99H6.643v-.069L8.41 8.252c.65-.724 1.237-1.332 1.237-2.27C9.646 4.849 8.723 4 7.308 4c-1.573 0-2.36 1.064-2.36 2.15v.057h1.138Zm6.559 1.883h.786c.823 0 1.374.481 1.379 1.179.01.707-.55 1.216-1.421 1.21-.77-.005-1.326-.419-1.379-.953h-1.095c.042 1.053.938 1.918 2.464 1.918 1.478 0 2.642-.839 2.62-2.144-.02-1.143-.922-1.651-1.551-1.714v-.063c.535-.09 1.347-.66 1.326-1.678-.026-1.053-.933-1.855-2.359-1.845-1.5.005-2.317.88-2.348 1.898h1.116c.032-.498.498-.944 1.206-.944.703 0 1.206.435 1.206 1.07.005.64-.504 1.106-1.2 1.106h-.75v.96Z" />
                                    </svg>
                                </span>
                                {{--
                                <!--end::Svg Icon--> --}}
                                <span>Nombre de camions</span>
                            </div>
                        </td>
                        <td class="fw-bold text-end">
                            <span>{{ $expedition->numberOfVehicles() }}</span>
                        </td>
                    </tr>
                    {{--
                    <!--end::Vehicles Number--> --}}
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