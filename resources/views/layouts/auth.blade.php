<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('/') }}main.css" rel="stylesheet" />
    @stack('addon-style')

</head>

<body>
    {{-- Navbar --}}
    @include('includes.navbar-auth')

    {{-- Page Content --}}
    @yield('content')

    {{-- Footer --}}

    {{-- Script --}}
    @stack('prepend-script')
    <script src="{{ asset('/') }}vendor/jquery/jquery.slim.min.js"></script>
    <script src="{{ asset('/') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('/') }}navbar-scroll.js"></script>
    @stack('addon-script')
</body>

</html>
