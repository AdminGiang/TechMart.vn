<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    


    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <link href="{{ asset('assets/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @stack('styles')
    <!-- BOXICONS LOGIN-REGISTER -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>
    <!-- CSS LOGIN-REGISTER-->
    <link href="{{ asset('assets/css/lgstyle.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
    
</head>

@yield('script')

<body>

    @include('layouts.header')

    @if (Request::is('/'))
    @include('layouts.banners')
    @endif
    
    <div class="container">
        @yield('content')
    </div>


    @include('layouts.footer')
    {{-- Chỉ hiển thị footer nếu không phải trang login --}}
    {{-- @if (!isset($isLoginPage) || !$isLoginPage)
        @include('layouts.footer')
    @endif --}}



    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/jslogin.js') }}"></script> --}}
</body>

</html>
