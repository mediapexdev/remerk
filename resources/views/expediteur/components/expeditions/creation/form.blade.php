<form id="kt_modal_create_expedition_form" class="form" method="POST" action="{{route('expedition.store')}}"
    data-localites-communes-route="{{route('localites.getCommunes')}}" data-types_vehicule-route="{{route('matieres.getTypesCamion')}}" novalidate="novalidate">
    @php
        use App\Models\Region;

        $regions = Region::all();
    @endphp
    {{-- <!--begin::Steps--> --}}
    @include('expediteur.components.expeditions.creation.steps.steps')
    {{-- <!--end::Steps--> --}}
    {{-- <!--begin::Actions--> --}}
    <div class="d-flex flex-stack pt-10">
        {{-- <!--begin::Wrapper--> --}}
        <div class="me-2">
            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg--> --}}
                <span class="svg-icon svg-icon-3 me-1">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
                        <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="currentColor" />
                    </svg>
                </span>
                {{-- <!--end::Svg Icon--> --}}
                <span>Précédent</span>
            </button>
        </div>
        {{-- <!--end::Wrapper--> --}}
        {{-- <!--begin::Wrapper--> --}}
        <div>
            @php
                use App\Models\Expediteur;
                $exp_id = Expediteur::where('user_id', Auth::user()->id)->first()->id;
            @endphp
            @csrf
            <input type="hidden" name="expediteur_id" value="{{$exp_id}}">
            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="submit">
                <span class="indicator-label">
                    <span>Soumettre</span>
                    {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg--> --}}
                    <span class="svg-icon svg-icon-3 ms-2 me-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                            <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                        </svg>
                    </span>
                    {{-- <!--end::Svg Icon--> --}}
                </span>
                <span class="indicator-progress">
                    <span>Patientez ...</span>
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
            </button>
            <button type="button" class="btn btn-lg btn-primary"data-kt-stepper-action="next">
                <span>Continuer</span>
                {{-- <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg--> --}}
                <span class="svg-icon svg-icon-3 ms-1 me-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="currentColor" />
                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="currentColor" />
                    </svg>
                </span>
                {{-- <!--end::Svg Icon--> --}}
            </button>
        </div>
        {{-- <!--end::Wrapper--> --}}
    </div>
    {{-- <!--end::Actions--> --}}
</form>
