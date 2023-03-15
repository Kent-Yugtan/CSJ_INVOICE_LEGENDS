<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5Pints Productions</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('images/invoices-logo.ico') }}" type="image/x-icon">

    @include('layouts.private.script')
</head>

<body class="sb-nav-fixed">

    @include('layouts.private.header')

    <div id="layoutSidenav">
        @include('layouts.private.sidemenu')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('layouts.private.footer')
        </div>
    </div>

</body>

</html>