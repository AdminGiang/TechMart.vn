<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sb-admin-2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/metisMenu.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/headsearch.css') }}"> <!-- CSS HEADER -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/sidebar.css') }}"> <!-- Sidebar -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/dashboard.css') }}"> <!-- Dashboard -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/main.css') }}"> <!-- Main -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/font-awesome.min.css') }}"> <!-- Font Awesome -->

    {{-- CSS-DASHBOARD --}}

    {{-- icon --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    {{-- CSS SIDEBAR --}}
    <title> TechMart.vn </title>
</head>

<body>

    @include('admin.layouts.sidebar')

    @include('admin.layouts.header')

    <div class="container">
        @yield('content')
    </div>



    {{-- JS FOR DASHBOARD --}}
    <script src="{{ asset('assets/admin/js/dash/jquery.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/dash/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/dash/metisMenu.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/dash/raphael.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/dash/morris.min.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/dash/morris-data.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/dash/sb-admin-2.min.js') }}" defer></script>

      {{-- JS SIDEBAR--}}
    <script src="{{ asset('assets/admin/js/siderbar.js') }}" defer></script>
    <script src="{{ asset('assets/admin/js/headsearch.js') }}" defer></script>

</body>

</html>
