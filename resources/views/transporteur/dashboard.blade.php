@php
$body_classes = 'app-default';

use App\Models\Transporteur;
use App\Models\Expedition;
use App\Models\Facture;

$transporteur = Transporteur::where('user_id', Auth::user()->id)->first();
$expeditions = Expedition::where('transporteur_id', $transporteur->id)->get();

@endphp

@extends('transporteur.layout')

@section('title')
<title>Dashboard | Remërk</title>
@endsection

@section('custom-css')
<link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/custom/expeditions/overview.css')}}">
@endsection

@section('component-body-content')
<div class="h-100">
    {{--
    <!--begin::Row--> --}}
    <div class="row mb-10 mb-xxl-0 mb-xl-0 mb-lg-0">
        {{--
        <!--begin::Left Col--> --}}
        <div class="col-xl-4 gx-5 mb-5">
            <div class="col mb-5">
                @include('transporteur.components.expeditions.overview.index')
            </div>
            <div class="col">
                @include('transporteur.components.vehicules.overview.index')
            </div>
        </div>
        {{--
        <!--begin::Left Col--> --}}
        {{--
        <!--begin::Right Col--> --}}
        <div class="col-xl-8">
            <div class="col mb-5">
                @include('transporteur.components.widgets.map')
            </div>
            <div class="col">
                @include('transporteur.components.widgets.overview')
            </div>
        </div>
        {{--
        <!--begin::Right Col--> --}}
        {{--
        <!--end::Row--> --}}
    </div>
</div>
@endsection

@section('component-modals')
@include('transporteur.components.modals.postulat')
@include('transporteur.components.modals.create-camion')
@include('transporteur.components.modals.voir-postulat')
@endsection

@section('custom-js')
<script type="text/javascript" src="{{URL::asset('assets/js/custom/dashboard/expeditions-overview.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/expeditions/carrier/postulat.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/utilities/modals/create-camion.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/performance_transporteur.js')}}"></script>
{{-- <script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chart/map.js')}}"></script> --}}

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/senegalHigh.js"></script>
<script>
    // Create root element
  // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root   = am5.Root.new("chartdiv");
    var colors = am5.ColorSet.new(root, {});
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
        am5themes_Animated.new(root)
    ]);
    
    
    // Create the map chart
    // https://www.amcharts.com/docs/v5/charts/map-chart/
    var chart = root.container.children.push(am5map.MapChart.new(root, {
        panX: "rotateX",
        projection: am5map.geoMercator()
    }));
    
    var mode = KTThemeMode.getMode();
    var color     = ('dark' === mode) ? '#f9b233' : '#068c94';

  // Create polygon series for the world map
  // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
    var senegalMap = chart.series.push(am5map.MapPolygonSeries.new(root, {
        geoJSON: am5geodata_senegalHigh,
    }));
    senegalMap.mapPolygons.template.setAll({
        tooltipText: "{name}"+({{$expeditions->count()}}),
        toggleKey: "active",
        interactive: true,
        fill: am5.color(0xaaaaaa),
        templateField: "polygonSettings"
    });
    
    senegalMap.mapPolygons.template.states.create("hover", {
        fill: color,
        toggleKey: "default",
        });

    //console.log(senegalMap.mapPolygons.template.events);
    senegalMap.mapPolygons.template.events.on("click", (ev) =>
    {
        colorIndex = parseInt(Math.random()*30)+1;
        senegalMap.mapPolygons.template.states.create("active", {
        fill: colors.getIndex(colorIndex)
        });

        var dataItem = ev.target.dataItem;
        var data = dataItem.dataContext;
        console.log(data);
        
        var zoomAnimation = senegalMap.zoomToDataItem(dataItem);
        
        Promise.all([
        zoomAnimation.waitForStop(),
        am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/senegalDepartmentsHigh.json", chart)
        ]).then((results) =>
        {
            var geodata = am5.JSONParser.parse(results[1].response);
            countrySeries.setAll({
                geoJSON: geodata,
                fill: data.polygonSettings.fill,
                //toggleKey: "active",
            });
        });
    });

  // Create polygon series for the country map
  // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
    var countrySeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
        visible: false
    }));
    
    countrySeries.mapPolygons.template.setAll({
        tooltipText: "{name}",
        interactive: true,
        toggleKey: "active",
        fill: am5.color(0xaaaaaa)
    });
    
    // countrySeries.mapPolygons.template.states.create("hover", {
    //     fill: colors.getIndex(9)
    // });

  // Set up data for countries
//   var data = [];
//   for(var id in am5geodata_data_countries2) {
//     if (am5geodata_data_countries2.hasOwnProperty(id)) {
//       var country = am5geodata_data_countries2[id];
//       if (country.maps.length) {
//         data.push({
//           id: id,
//           map: country.maps[0],
//           polygonSettings: {
//             fill: colors.getIndex(continents[country.continent_code]),
//           }
//         });
//       }
//     }
//   }
//   senegalMap.data.setAll(data);

chart.set("zoomControl", am5map.ZoomControl.new(root, {}));

</script>

@endsection