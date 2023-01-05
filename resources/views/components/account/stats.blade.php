<div class="d-flex flex-wrap flex-stack">
    {{-- <!--begin::Wrapper--> --}}
    <div class="d-flex flex-column flex-grow-1 pe-8">
        {{-- <!--begin::Stats--> --}}
        <div class="d-flex flex-row">
            {{-- <!--begin::Stat--> --}}
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                {{-- <!--begin::Number--> --}}
                <div class="d-flex align-items-center">
                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg--> --}}
                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"  fill="currentColor" />
                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                        </svg>
                    </span>
                    {{-- <!--end::Svg Icon--> --}}
                    <div class="fs-2 fw-bold" data-kt-countup="true"
                        data-kt-countup-value="4500" data-kt-countup-prefix="$">0</div>
                </div>
                {{-- <!--end::Number--> --}}
                {{-- <!--begin::Label--> --}}
                <div class="fw-semibold fs-6 text-gray-700 text-gray-800-on-dark">Gains</div>
                {{-- <!--end::Label--> --}}
            </div>
            {{-- <!--end::Stat--> --}}
            {{-- <!--begin::Stat--> --}}
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                {{-- <!--begin::Number--> --}}
                <div class="d-flex align-items-center">
                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg--> --}}
                    <span class="svg-icon svg-icon-3 svg-icon-success me-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"  fill="currentColor" />
                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                        </svg>
                    </span>
                    {{-- <!--end::Svg Icon--> --}}
                    <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="{{$__expeditions_count}}">0</div>
                </div>
                {{-- <!--end::Number--> --}}
                {{-- <!--begin::Label--> --}}
                <div class="fw-semibold fs-6 text-gray-700 text-gray-800-on-dark">Expéditions</div>
                {{-- <!--end::Label--> --}}
            </div>
            {{-- <!--end::Stat--> --}}
        </div>
        {{-- <!--end::Stats--> --}}
    </div>
    {{-- <!--end::Wrapper--> --}}
    {{-- <!--begin::Progress--> --}}
    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
        @php
            $profileCompletion = Auth::user()->profileCompletion();
        @endphp
        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
            <span class="fw-semibold fs-6 text-gray-700 text-gray-800-on-dark">Achèvement du profil</span>
            <span class="fw-bold fs-6">{{$profileCompletion}}%</span>
        </div>
        <div class="progress h-5px mx-3 w-100 bg-light mb-3">
            <div class="progress-bar bg-success rounded h-5px"
                role="progressbar" style="width: {{$profileCompletion}}%;"
                aria-valuenow="{{$profileCompletion}}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    {{-- <!--end::Progress--> --}}
</div>
