@php
    use App\Models\Postulants;

    $expeditions = $expeditions->take(5);
    $postulants = null;

    foreach ($expeditions as $expedition) {
        $postulants = ((null == $postulants) ?
        Postulants::where('expedition_id', $expedition->id)->orderByDesc('created_at')->get() :
        $postulants->concat(Postulants::where('expedition_id', $expedition->id)->orderByDesc('created_at')->get()));
    }
@endphp
{{-- <!--begin::Card--> --}}
<div class="card card-flush h-xl-100">
    {{-- <!--begin::Card Header--> --}}
    <div class="card-header pt-7">
        {{-- <!--begin::Card Title--> --}}
        <div class="card-title">
            <h3 class="title fw-bold fw-medium-on-dark text-gray-800 text-white-dim-on-dark">Postulants</h3>
        </div>
        {{-- <!--end::Card Title--> --}}
        {{-- <!--begin::Card Toolbar--> --}}
        <div class="card-toolbar">
            <a href="/expeditions/postulants" class="btn btn-sm btn-light btn-active-light-primary btn-see-all clear-on-dark">Voir tout</a>
        </div>
        {{-- <!--end::Card Toolbar--> --}}
    </div>
    {{-- <!--end::Card Header--> --}}
    {{-- <!--begin::Card Body--> --}}
    <div class="card-body">
        {{-- <!--begin::List --> --}}
        @include('expediteur.components.expeditions.postulants.list')
        {{-- <!--end::List--> --}}
    </div>
    {{-- <!--end::Card body--> --}}
</div>
{{-- <!--end::Card--> --}}
