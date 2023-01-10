@php
$body_classes = 'app-default';

use App\Models\Camion;
use App\Models\Transporteur;

$transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
$camions = Camion::where('transporteur_id', $transporteur->id)->orderByDesc('created_at')->get();
@endphp

@extends('transporteur.layout')

@section('title')
<title>Mes véhicules | Remërk</title>
@endsection

@section('component-body-content')
{{--
<!--begin::Row--> --}}
<div class="card h-100">
    {{--
    <!--begin::Card Header--> --}}
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label text-white-dim-on-dark fw-bold fs-3 mb-1">Liste des véhicules</span>
            <span class="text-gray-600 text-gray-700-on-dark mt-1 fw-semibold fs-7">{{ $camions->count() }} véhicules enregistrés</span>
        </h3>
        <div class="card-toolbar">
            <div class="row text-end">
                <div class="col-sm-7">
                    <div class="input-group input-group-sm">
                        <span class="input-group-text" id="addon-wrapping">
                            {{--
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg--> --}}
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                    transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                <path
                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <input type="search" class="form-control" placeholder="Recherche" id="searchInput">
                    </div>
                </div>
                <div class="col-sm-5">
                    <button data-bs-toggle="modal" href="#kt_modal_create_camion"
                        class="me-0 btn btn-sm h-100 w-100 btn-light-primary">
                        <!--begin::Svg Icon | icon: <i class="bi bi-plus-square"></i>-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Ajouter véhicule
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{--
    <!--end::Card Header--> --}}
    {{--
    <!--begin::Card Body--> --}}
    <div class="card-body pt-3">
        {{--
        <!--begin::List Véhicules--> --}}
        @include('transporteur.components.vehicules.list')
        {{--
        <!--end::Liste Véhicules--> --}}
    </div>
    {{--
    <!--end::Card Body--> --}}
</div>
{{--
<!--end::Row--> --}}
@endsection

@section('component-modals')
{{-- @include('transporteur.components.modals.edit-camion') --}}
@include('transporteur.components.modals.create-camion')
@endsection

@section('custom-js')
    {{-- <script type="text/javascript" src="{{ URL::asset('assets/js/custom/utilities/modals/edit-camion.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/custom/utilities/modals/create-camion.js') }}"></script>

<script>
    function delete_camion(id_camion)
    {
        Swal.fire({
            html: `Êtes-vous sûr de vouloir supprimer ce véhicule ?`,
            icon: "warning",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Oui, supprimer!",
            cancelButtonText: 'Non, revenir en arrière',
            customClass: {
                confirmButton: "btn btn-light-danger",
                cancelButton: 'btn btn-primary'
            }
        }).then(function(e) {
            if (e.isConfirmed) {
                $('#form_delete_camion'+id_camion).submit();
                console.log('ok');
            }
        });
    }

    function modifier_modal_edit(camion)
    {
        document.querySelector('#ca#tableVehiculemion_id').value = camion.id;
    }
</script>

<script>
    var tableVehicule = $('#tableVehicule').DataTable(
        {
            responsive:{
                details:{
                    type: 'column'
                }
            },
            info: false,
            lengthMenu: [
            [10, 25, 50, -1],
            [5, 10, 25, 50, 'All'],
        ],
        });
    $('#searchInput').on( 'keyup', function ()
    {
        tableVehicule.search( this.value ).draw();
    } );
</script>

@endsection