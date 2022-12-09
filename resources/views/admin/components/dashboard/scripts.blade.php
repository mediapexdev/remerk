<script>
    function blockAccess(event){
        if(event.keyCode == 123 || (event.ctrlKey && event.shiftKey && event.keyCode == 73)){
            event.preventDefault();
        }
    }

    // document.addEventListener('keydown', blockAccess);
    // document.addEventListener('contextmenu', event=>event.preventDefault());
</script>

<!--begin::Vendors Javascript(used by this page)-->
<script src={{URL::asset("assets/plugins/custom/fullcalendar/fullcalendar.bundle.js")}}></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
<script src={{URL::asset("assets/plugins/custom/datatables/datatables.bundle.js")}}></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used by this page)-->
@yield('custom-js')
<script src={{URL::asset("assets/js/widgets.bundle.js")}}></script>
<script src={{URL::asset("assets/js/custom/widgets.js")}}></script>
<script src={{URL::asset("assets/js/custom/apps/chat/chat.js")}}></script>
<script src={{URL::asset("assets/js/custom/utilities/modals/upgrade-plan.js")}}></script>
<script src={{URL::asset("assets/js/custom/utilities/modals/create-app.js")}}></script>
<script src={{URL::asset("assets/js/custom/utilities/modals/new-target.js")}}></script>
<script src={{URL::asset("assets/js/custom/utilities/modals/users-search.js")}}></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->
