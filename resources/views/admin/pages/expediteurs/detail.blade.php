@php  
    use App\Core\Util;

    $t_colors_classes = ['danger', 'info', 'primary', 'success', 'warning'];
    $has_avatar = $expediteur->hasAvatar();
    $avatar = $has_avatar ? $expediteur->avatar() : Util::getDefaultUserAvatar();
@endphp
@extends('admin.layout')

@section('title')
    <title>Expéditeurs - Remërk</title>
@endsection

@section('component-body-content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            @include('admin.components.detailExpediteur.toolbar')
            @include('admin.components.detailExpediteur.content_view')
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
@endsection

@section('scripts')
    <!--begin::Custom Javascript(used by this page)-->
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/liste-expeditions.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/add-auth-app.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/add-address.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/add-one-time-password.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/update-password.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/update-phone.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/update-address.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/expediteurs/details/update-profile.js') }}></script>
    <script src={{ URL::asset('assets/js/widgets.bundle.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/widgets.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/apps/chat/chat.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/upgrade-plan.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/create-app.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/new-card.js') }}></script>
    <script src={{ URL::asset('assets/js/custom/utilities/modals/users-search.js') }}></script>
    <!--end::Custom Javascript-->
@endsection
