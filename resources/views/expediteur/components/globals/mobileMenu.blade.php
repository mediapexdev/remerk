<!-- Bottom Navbar -->
<nav class="app-footer navbar navbar-expand fixed-bottom d-lg-none d-xl-none d-xxl-none p-0 h-55px d-print-none">
    <ul class="navbar-nav nav-justified w-100">
        <li class="nav-item menu-here-bg">
            <a href="/"
                class="text nav-link text-center bg-active-light {{ '/' == request()->path() ? 'active' : '' }}">
                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-29-094551/core/html/src/media/icons/duotune/general/gen008.svg-->
                <span class="svg-icon  svg-icon-2x svg-icon-gray-800"><svg width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="theme-light-show small menu-title d-block mt-1">Dashboard</span>
                <span class="theme-dark-show small menu-title text-white d-block mt-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href={{ route('expeditions') }}
                class="nav-link text-center bg-active-light border-active {{ 'expeditions' == request()->path() ? 'active' : '' }}">
                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-29-094551/core/html/src/media/icons/duotune/maps/map003.svg-->
                <span class="svg-icon  svg-icon-2x svg-icon-gray-800"><svg width="16" height="16" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.39961 20.5073C7.29961 20.5073 6.39961 19.6073 6.39961 18.5073C6.39961 17.4073 7.29961 16.5073 8.39961 16.5073H9.89961C11.7996 16.5073 13.3996 14.9073 13.3996 13.0073C13.3996 11.1073 11.7996 9.50732 9.89961 9.50732H8.09961L6.59961 11.2073C6.49961 11.3073 6.29961 11.4073 6.09961 11.5073C6.19961 11.5073 6.19961 11.5073 6.29961 11.5073H9.79961C10.5996 11.5073 11.2996 12.2073 11.2996 13.0073C11.2996 13.8073 10.5996 14.5073 9.79961 14.5073H8.39961C6.19961 14.5073 4.39961 16.3073 4.39961 18.5073C4.39961 20.7073 6.19961 22.5073 8.39961 22.5073H15.3996V20.5073H8.39961Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M8.89961 8.7073L6.69961 11.2073C6.29961 11.6073 5.59961 11.6073 5.19961 11.2073L2.99961 8.7073C2.19961 7.8073 1.7996 6.50732 2.0996 5.10732C2.3996 3.60732 3.5996 2.40732 5.0996 2.10732C7.6996 1.50732 9.99961 3.50734 9.99961 6.00734C9.89961 7.00734 9.49961 8.0073 8.89961 8.7073Z"
                            fill="currentColor" />
                        <path
                            d="M5.89961 7.50732C6.72804 7.50732 7.39961 6.83575 7.39961 6.00732C7.39961 5.1789 6.72804 4.50732 5.89961 4.50732C5.07119 4.50732 4.39961 5.1789 4.39961 6.00732C4.39961 6.83575 5.07119 7.50732 5.89961 7.50732Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M17.3996 22.5073H15.3996V13.5073C15.3996 12.9073 15.7996 12.5073 16.3996 12.5073C16.9996 12.5073 17.3996 12.9073 17.3996 13.5073V22.5073Z"
                            fill="currentColor" />
                        <path
                            d="M21.3996 18.5073H15.3996V13.5073H21.3996C22.1996 13.5073 22.5996 14.4073 22.0996 15.0073L21.2996 16.0073L22.0996 17.0073C22.6996 17.6073 22.1996 18.5073 21.3996 18.5073Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="theme-light-show small menu-title d-block mt-1">Expéditions</span>
                <span class="theme-dark-show small menu-title text-white d-block mt-1">Expéditions</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-bs-toggle="modal" data-bs-target="#kt_modal_create_expedition"
                class="border-top nav-link text-center">

                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-29-094551/core/html/src/media/icons/duotune/general/gen035.svg-->
                <span class="svg-icon svg-icon-2x svg-icon-gray-800"><svg width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5" fill="currentColor" />
                        <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                            transform="rotate(-90 10.8891 17.8033)" fill="currentColor" />
                        <rect x="6.01041" y="10.9247" width="12" height="2" rx="1" fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="theme-light-show small menu-title d-block mt-1">Expédition</span>
                <span class="theme-dark-show small menu-title text-white d-block mt-1">Expédition</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link text-center bg-active-light {{ 'aide' == request()->path() ? 'active' : '' }}">
                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-29-094551/core/html/src/media/icons/duotune/general/gen046.svg-->
                <span class="svg-icon  svg-icon-2x svg-icon-gray-800"><svg width="16" height="16" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                        <path
                            d="M11.276 13.654C11.276 13.2713 11.3367 12.9447 11.458 12.674C11.5887 12.394 11.738 12.1653 11.906 11.988C12.0833 11.8107 12.3167 11.61 12.606 11.386C12.942 11.1247 13.1893 10.896 13.348 10.7C13.5067 10.4947 13.586 10.2427 13.586 9.944C13.586 9.636 13.4833 9.356 13.278 9.104C13.082 8.84267 12.69 8.712 12.102 8.712C11.486 8.712 11.066 8.866 10.842 9.174C10.6273 9.482 10.52 9.82267 10.52 10.196L10.534 10.574H8.826C8.78867 10.3967 8.77 10.2333 8.77 10.084C8.77 9.552 8.90067 9.07133 9.162 8.642C9.42333 8.20333 9.81067 7.858 10.324 7.606C10.8467 7.354 11.4813 7.228 12.228 7.228C13.1987 7.228 13.9687 7.44733 14.538 7.886C15.1073 8.31533 15.392 8.92667 15.392 9.72C15.392 10.168 15.322 10.5507 15.182 10.868C15.042 11.1853 14.874 11.442 14.678 11.638C14.482 11.834 14.2253 12.0533 13.908 12.296C13.544 12.576 13.2733 12.8233 13.096 13.038C12.928 13.2527 12.844 13.528 12.844 13.864V14.326H11.276V13.654ZM11.192 15.222H12.928V17H11.192V15.222Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="theme-light-show small menu-title d-block mt-1">Aide</span>
                <span class="theme-dark-show small menu-title text-white d-block mt-1">Aide</span>
            </a>
        </li>
        <li class="nav-item">
            <a href={{route('facturation')}}
                class="nav-link text-center bg-active-light {{ 'factures' == request()->path() ? 'active' : '' }}">
                <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-11-29-094551/core/html/src/media/icons/duotune/finance/fin008.svg-->
                <span class="svg-icon  svg-icon-2x svg-icon-gray-800"><svg width="16" height="16" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3"
                            d="M3.20001 5.91897L16.9 3.01895C17.4 2.91895 18 3.219 18.1 3.819L19.2 9.01895L3.20001 5.91897Z"
                            fill="currentColor" />
                        <path opacity="0.3"
                            d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21C21.6 10.9189 22 11.3189 22 11.9189V15.9189C22 16.5189 21.6 16.9189 21 16.9189H16C14.3 16.9189 13 15.6189 13 13.9189ZM16 12.4189C15.2 12.4189 14.5 13.1189 14.5 13.9189C14.5 14.7189 15.2 15.4189 16 15.4189C16.8 15.4189 17.5 14.7189 17.5 13.9189C17.5 13.1189 16.8 12.4189 16 12.4189Z"
                            fill="currentColor" />
                        <path
                            d="M13 13.9189C13 12.2189 14.3 10.9189 16 10.9189H21V7.91895C21 6.81895 20.1 5.91895 19 5.91895H3C2.4 5.91895 2 6.31895 2 6.91895V20.9189C2 21.5189 2.4 21.9189 3 21.9189H19C20.1 21.9189 21 21.0189 21 19.9189V16.9189H16C14.3 16.9189 13 15.6189 13 13.9189Z"
                            fill="currentColor" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <span class="theme-light-show small menu-title d-block mt-1">Factures</span>
                <span class="theme-dark-show small menu-title text-white d-block mt-1">Factures</span>
            </a>
        </li>
    </ul>
</nav>