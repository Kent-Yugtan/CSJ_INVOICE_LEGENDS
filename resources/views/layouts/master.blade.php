<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/assets/css/styles.css') }}" rel="stylesheet">

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="{{ asset('/assets/js/bootstrap.bundle.min.js') }}"></script>


    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


    <!-- Sparkline Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>



</head>

<body class="sb-nav-fixed">

    @include('layouts.inc.admin-navbar')

    <div id="layoutSidenav">

        @include('layouts.inc.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>


                @yield('content-dashboard')

            </main>
            @include('layouts.inc.admin-footer')
        </div>
    </div>

    <script src="{{ asset('/assets/js/fileupload.js') }}"></script>
    <script src="{{ asset('/assets/js/scripts.js') }}">
    </script>

</body>

</html>