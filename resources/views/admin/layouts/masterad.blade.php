<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <link href="{{ asset('assets/admin/css/sidebar.css') }}" rel="stylesheet" />

    {{-- link icon --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title> TechMart.vn </title>
</head>

<body>
    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

    <div class="container">
        @yield('content')
    </div>

    <!--   Core JS Files   -->

    <script src="{{ asset('assets/admin/js/siderbar.js') }}"></script>

</body>

</html>
