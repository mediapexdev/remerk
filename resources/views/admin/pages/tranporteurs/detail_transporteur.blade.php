@php  
    use App\Core\Util;
    
    $has_avatar = $transporteur->hasAvatar();
    $avatar = $has_avatar ? $transporteur->avatar() : Util::getDefaultUserAvatar();
@endphp
@extends('admin.layout')

@section('title')
    <title>Transporteurs | Remërk</title>
@endsection

@section('component-body-content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            @include('admin.components.detailTransporteur.toolbar')
            @include('admin.components.detailTransporteur.content_view')
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection

@section('scripts')
    <!--begin::Custom Javascript(used by this page)-->
    <script src={{ URL::asset('assets/js/custom/apps/transporteurs/details/liste-expeditions.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/transporteurs/details/liste-vehicules.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/transporteurs/details/actions.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/add-auth-app.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/add-address.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/add-one-time-password.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/update-password.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/update-phone.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/update-address.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/ecommerce/customers/details/update-profile.js') }}></script>
    <script src={{ URL::asset('assets/js/widgets.bundle.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/widgets.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/chat/chat.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/create-app.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/new-card.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/users-search.js') }}></script>
    <!--end::Custom Javascript-->
@endsection
