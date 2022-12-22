{{-- <!--begin::Vendors Javascript--> --}}

{{-- <!-- begin::Charts Scripts --> --}}
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/radar.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
<script type="text/javascript" src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
{{-- <!-- end::Charts Scripts --> --}}

{{-- <!-- begin::Firebase scripts --> --}}
<script type="text/javascript" src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/firebasejs/7.16.1/firebase-messaging.js"></script>
{{-- <!-- end::Firebase scripts --> --}}

{{-- <!-- begin::Axios script --> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>
{{-- <!-- end::Axios script --> --}}

{{-- <!-- begin::Jquery Easing --> --}}
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
{{-- <!-- end::Jquery Easing --> --}}

{{-- <!--end::Vendors Javascript--> --}}

{{-- <!--begin::Custom Javascript--> --}}
<script type="text/javascript" src="{{URL::asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/widgets.bundle.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/widgets.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/custom/apps/chat/chat.js')}}"></script>

<script>
    $(document).ready(function() {
        @if (Session::has('success'))
            toastr.options.timeOut = 7000;
            toastr.options.closeButton = true;
            toastr.options.progressBar = false;
            toastr.options.showMethod = "fadeIn";
            toastr.options.hideMethod = "fadeOut";
            toastr.options.positionClass = "toastr-top-right";
            toastr.options.preventDuplicates = false;
            toastr.success("{{ Session::get('success') }}");
        @endif
    });
</script>
{{-- <!--end::Custom Javascript--> --}}
