<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" id="html">
    {{-- begin::Head --}}
    <head>
        {{-- begin::Global Meta Data(used by all pages) --}}
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {{-- end::Global Meta Data --}}

        {{-- begin::Title --}}
        @yield('title')
        {{-- end::Tile --}}

        {{-- begin::Favicon --}}
        <link type="image/x-icon" rel="shortcut icon" href={{URL::asset("assets/media/logos/favicon.ico")}} />
        {{-- end::Favicon --}}

        {{-- begin::Fonts --}}
        <link rel="stylesheet" href={{URL::asset("https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700")}} />
        {{-- end::Fonts --}}

        {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
        <link type="text/css" rel="stylesheet" href={{URL::asset("assets/plugins/global/plugins.bundle.css")}} />
        
        <link type="text/css" rel="stylesheet" href={{URL::asset("assets/css/style.bundle.css")}} />
        {{-- end::Global Stylesheets Bundle --}}

        <link href={{URL::asset("assets/plugins/custom/fullcalendar/fullcalendar.bundle.css")}} rel="stylesheet" type="text/css" />

    <link type="text/css" rel="stylesheet" href={{URL::asset("assets/plugins/custom/datatables/datatables.bundle.css")}}>
    </head>
    {{-- end::Head --}}

    {{-- begin::Body --}}
    <body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true" data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">

        {{-- begin::Theme mode setup on page load --}}
        <script>
            let themeMode = null;
            let defaultThemeMode = "light";

        if(document.documentElement){
            if(document.documentElement.hasAttribute("data-theme-mode")){
                themeMode = document.documentElement.getAttribute("data-theme-mode");
            }
            else{
                themeMode = (null !== localStorage.getItem("data-theme")) ? localStorage.getItem("data-theme") : defaultThemeMode;
            }
            if(themeMode === "system"){
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-theme", themeMode);
        }
        </script>
        {{-- end::Theme mode setup on page load --}}

        @yield('content')

        {{-- begin::Javascript --}}
            <script>
                var hostUrl = "assets/";
            </script>
            {{-- begin::Global Javascript Bundle(used by all pages) --}}
            <script src={{URL::asset("assets/plugins/global/plugins.bundle.js")}}></script>
            <script src={{URL::asset("assets/js/scripts.bundle.js")}}></script>
            {{-- end::Global Javascript Bundle --}}
            
            {{-- begin::Page Vendors Javascript(used by this page) --}}
            <script src={{URL::asset("assets/plugins/custom/datatables/datatables.bundle.js")}}></script>
            {{-- end::Page Vendors Javascript --}}
            
            {{-- begin::Page Custom Javascript(used by this page) --}}
            @yield('scripts')
            {{-- end::Page Custom Javascript --}}
        {{-- end::Javascript --}}

    </body>
    {{-- end::Body --}}
</html>