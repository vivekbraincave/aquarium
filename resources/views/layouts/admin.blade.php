<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('storage/' . $settings->favicon) }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admin/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

        <link href="{{ asset('admin/css/main.css') }}" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="{{ asset('admin/css/jquery.dataTables.css') }}" />

    </head>
    <body data-sidebar="dark">


        <div id="layout-wrapper">
            @include('layouts.inc.admin.header')
            @include('layouts.inc.admin.sidebar')
            <div class="main-content">
                @yield('content')
            </div>
            @include('layouts.inc.admin.footer')
        </div>




        <!-- JAVASCRIPT -->
        <script src="{{ asset('admin/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admin/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admin/libs/node-waves/waves.min.js') }}"></script>

        <!-- apexcharts -->
        <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- dashboard init -->
        <script src="{{ asset('admin/js/pages/dashboard.init.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/js/app.js') }}"></script>

        <script src="{{ asset('admin/js/script.js') }}"></script>

        {{-- jquery data tables --}}
        <script src="{{ asset('admin/js/jquery.dataTables.js') }}"></script>
             
    </body>
</html>
        