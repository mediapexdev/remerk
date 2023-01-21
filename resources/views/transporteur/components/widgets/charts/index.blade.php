<!--begin::Chart widget 8-->
<div class="card card-flush h-xl-100">
    <!--begin::Header-->
    <div class="card-header pt-5">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-dark">Performance</span>
            <span class="text-gray-400 mt-1 fw-semibold fs-6">Aperçue des performances</span>
        </h3>
        <!--end::Title-->
        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1 active"
                        data-bs-toggle="tab" href="#dailyChart_tab"><span id="current"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1"
                        data-bs-toggle="tab" href="#weeklyChart_tab">Cette semaine</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bold px-4 me-1"
                        data-bs-toggle="tab" href="#monthlyChart_tab">Ce mois</a>
                </li>
            </ul>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-6">
        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab Daily-->
            @include('transporteur.components.widgets.charts.daily')
            <!--end::Tab Daily-->
            <!--begin::Tab Weekly-->
            @include('transporteur.components.widgets.charts.weekly')
            <!--end::Tab Weekly-->
            <!--begin::Tab Monthly-->
            @include('transporteur.components.widgets.charts.monthly')
            <!--end::Tab Monthly-->
        </div>
        <!--end::Tab content-->
    </div>
    <!--end::Body-->
</div>
<!--end::Chart widget 8-->

<script type="module">
    moment.locale('fr'); 
    document.getElementById('current').innerHTML = moment().format('dddd Do'); 
</script>