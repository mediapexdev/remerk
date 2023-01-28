@php
    use App\Models\Camion;

    $camions = Camion::where('transporteur_id', $transporteur->id)->orderByDesc('created_at')->get();
@endphp
{{-- <!--begin::Tables widget--> --}}
<div class="card card-flush h-xl-100">
    {{-- <!--begin::Card Header--> --}}
    <div class="card-header pt-7">
        {{-- <!--begin::Card Title--> --}}
        <h3 class="card-title align-items-start flex-column">
            <span class="title card-label fw-bold text-gray-800 text-white-dim-on-dark">
                @include('components.svg.vehicule0')
                Parc de véhicules</span>
            <span class="sub-title text-gray-600 text-gray-700-on-dark mt-1 fw-semibold fs-6">Total {{$camions->count()}} Véhicules</span>
        </h3>
        {{-- <!--end::Card Title--> --}}
        {{-- <!--begin::Card Toolbar--> --}}
        <div class="card-toolbar nav-item">
            <a href="{{route('vehicules')}}" class="btn btn-sm btn-light btn-active-light-primary btn-see-all clear-on-dark m-1">Voir tout</a>
            <button class="btn btn-sm btn-light-primary m-1" data-bs-toggle="modal" href="#kt_modal_create_camion">
                <i class="bi bi-plus-square-fill fs-6"></i>
                <span>Ajouter un véhicule</span>
            </button>
        </div>
        {{-- <!--end::Card Toolbar--> --}}
    </div>
    {{-- <!--end::Card Header--> --}}
    {{-- <!--begin::Card Body--> --}}
    <div class="card-body">
        {{-- <!--begin::Tab Content--> --}}
        <div class="tab-content">
            {{-- <!--begin::Tap pane--> --}}
            <div id="kt_stats_widget_6_tab_1" class="tab-pane fade active show">
                {{-- <!--begin::Table container--> --}}
                <div class="table-responsive">
                    {{-- <!--begin::Table--> --}}
                    <table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
                        {{-- <!--begin::Table head--> --}}
                        <thead>
                            <tr class="fs-5 fw-bold text-gray-600 text-gray-700-on-dark border-bottom-0">
                                <th class="min-w-150px">Marque</th>
                                <th class="min-w-150px">Type</th>
                                <th class="min-w-150px">Matricule</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        {{-- <!--end::Table head--> --}}
                        {{-- <!--begin::Table body--> --}}
                        @foreach ($camions as $camion)
                        <tbody>
                            <tr>
                                <td>
                                    <p class="text-gray-800 fw-bold d-block mb-1 fs-6">{{$camion->marque->nom}}</p>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-gray-800 text-white-dim-on-dark fw-bold mb-1 fs-6">{{$camion->type->nom}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex justify-content-start flex-column">
                                            <p class="text-gray-800 text-white-dim-on-dark fw-bold mb-1 fs-6">{{$camion->immatriculation}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if(!$camion->est_approuve)
                                    <span class="badge badge-pill badge-danger">Non approuvé</span>
                                    @else
                                    <span class="badge badge-pill badge-success">Approuvé</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- <!--end::Table body--> --}}
                    </table>
                </div>
                {{-- <!--end::Table--> --}}
            </div>
            {{-- <!--end::Tap pane--> --}}
        </div>
        {{-- <!--end::Tab Content--> --}}
    </div>
    {{-- <!--end: Card Body--> --}}
</div>
{{-- <!--end::Tables widget-> --}}
