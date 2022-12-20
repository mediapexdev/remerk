<!DOCTYPE html>
<html id="html" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    {{-- begin::Head --}}
    <head>
        {{-- begin::Global Meta Data(used by all pages) --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- end::Global Meta Data --}}

        {{-- begin::Title --}}
        @yield('title')
        {{-- end::Tile --}}

        {{-- begin::Favicon --}}
        <link type="image/x-icon" rel="shortcut icon" href="{{URL::asset('assets/media/logos/favicon.ico')}}">
        {{-- end::Favicon --}}

        {{-- begin::Fonts --}}
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700'>
        {{-- end::Fonts --}}

        {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
        <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/plugins/global/plugins.bundle.css')}}">
        <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/style.bundle.css')}}">
        <link type="text/css" rel="stylesheet" href="{{URL::asset('assets/css/personal-style.css')}}">
        {{-- end::Global Stylesheets Bundle --}}

        {{-- begin::Page Custom Styles(used by this page) --}}
        @yield('styles')
        {{-- end::Page Custom Styles --}}
    </head>
    {{-- end::Head --}}

    {{-- begin::Body --}}
    @if(!isset($body_classes))
    <body id="kt_body" data-kt-name="remerk">
    @else
    <body id="kt_body" data-kt-name="remerk" class="{{$body_classes}}">
    @endif
        {{-- begin::Theme mode setup on page load --}}
        <script>
            let themeMode = null;
            const defaultThemeMode = "light";

        if(document.documentElement) {
            if(document.documentElement.hasAttribute("data-theme-mode")) {
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
                const hostUrl = "assets/";
            </script>
            {{-- begin::Global Javascript Bundle(used by all pages) --}}
            <script type="text/javascript" src="{{URL::asset('assets/plugins/global/plugins.bundle.js')}}"></script>
            <script type="text/javascript" src="{{URL::asset('assets/js/scripts.bundle.js')}}"></script>
            {{-- end::Global Javascript Bundle --}}
            {{-- begin::Page Javascript(used by this page) --}}
            @yield('scripts')
            {{-- end::Page Javascript --}}
        {{-- end::Javascript --}}
    </body>
    {{-- end::Body --}}
</html>
