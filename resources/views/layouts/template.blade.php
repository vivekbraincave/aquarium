<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>@yield('title')</title>
        <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}" type="image/gif" sizes="20x20" />
        <link rel="stylesheet" href="{{ asset('main/css/all.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/animate.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/boxicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/bootstrap-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/jquery-ui.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/swiper-bundle.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/nice-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/jquery.fancybox.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/odometer.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/datepicker.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/uiicss.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/style.css') }}" />
    </head>
    <body class="home-pages-2">
        
        @include('layouts.inc.main.header')

        @yield('content')

        @include('layouts.inc.main.footer')

        <script src="{{ asset('main/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('main/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('main/js/jquery.timepicker.min.js') }}"></script>
        <script src="{{ asset('main/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('main/js/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('main/js/jquery.nice-select.js') }}"></script>
        <script src="{{ asset('main/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('main/js/morphext.min.js') }}"></script>
        <script src="{{ asset('main/js/odometer.min.js') }}"></script>
        <script src="{{ asset('main/js/jquery.marquee.min.js') }}"></script>
        <script src="{{ asset('main/js/viewport.jquery.js') }}"></script>
        <script src="{{ asset('main/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('main/js/SmoothScroll.js') }}"></script>
        <script src="{{ asset('main/js/jquery.nice-number.min.js') }}"></script>
        <script src="{{ asset('main/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('main/js/masonry.pkgd.min.js') }}"></script>
        <script src="{{ asset('main/js/main.js') }}"></script>
    </body>
</html>
