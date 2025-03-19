<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'TechMart.vn - Cửa hàng công nghệ')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    
    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/shop.css') }}" rel="stylesheet">
    
    <!-- Additional Styles -->
    @yield('styles')

    <style>
        /* Header Styles */
        .shop-header {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .shop-header .navbar {
            padding: 1rem 2rem;
        }

        .shop-header .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: #3B5D50;
        }

        .shop-header .nav-link {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: color 0.2s;
        }

        .shop-header .nav-link:hover {
            color: #3B5D50;
        }

        .shop-header .nav-link.active {
            color: #3B5D50;
        }

        .cart-icon {
            position: relative;
            font-size: 1.2rem;
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff4444;
            color: #fff;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            min-width: 18px;
            text-align: center;
        }

        /* Footer Styles */
        .shop-footer {
            background: #3B5D50;
            color: #fff;
            padding: 3rem 0;
            margin-top: 3rem;
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: color 0.2s;
        }

        .footer-links a:hover {
            color: #fff;
        }

        .footer-contact i {
            width: 25px;
            margin-right: 10px;
        }

        .footer-bottom {
            background: #2A4337;
            color: rgba(255,255,255,0.8);
            padding: 1rem 0;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 300px);
            background: #f8f9fa;
            padding: 2rem 0;
        }

        /* Breadcrumb */
        .shop-breadcrumb {
            background: #fff;
            padding: 1rem 2rem;
            margin-bottom: 2rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .breadcrumb-item a {
            color: #666;
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: #3B5D50;
        }

        /* Search Bar */
        .search-form {
            position: relative;
            max-width: 300px;
        }

        .search-input {
            width: 100%;
            padding: 0.5rem 2.5rem 0.5rem 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: all 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: #3B5D50;
            box-shadow: 0 0 0 2px rgba(59, 93, 80, 0.1);
        }

        .search-button {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #666;
            cursor: pointer;
        }

        .search-button:hover {
            color: #3B5D50;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="shop-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="TechMart.vn" height="40">
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <form class="search-form mx-auto">
                        <input type="search" class="search-input" placeholder="Tìm kiếm sản phẩm...">
                        <button type="submit" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                                <i class="fas fa-home"></i> Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('shop*') ? 'active' : '' }}" href="{{ route('shop') }}">
                                <i class="fas fa-store"></i> Cửa hàng
                            </a>
                        </li>
                       
                        @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                    <i class="fas fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ route('profile') }}">Tài khoản của tôi</a></li>
                                    <li><a class="dropdown-item" href="{{ route('orders') }}">Đơn hàng</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Đăng xuất</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @else
                            
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Breadcrumb -->
    <div class="container">
        <nav class="shop-breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Trang chủ</a></li>
                @yield('breadcrumb')
            </ol>
        </nav>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="shop-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Về TechMart.vn</h5>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Hỗ trợ khách hàng</h5>
                    <ul class="footer-links">
                        <li><a href="#">Hướng dẫn mua hàng</a></li>
                        <li><a href="#">Chính sách đổi trả</a></li>
                        <li><a href="#">Chính sách bảo hành</a></li>
                        <li><a href="#">Phương thức thanh toán</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Chăm sóc khách hàng</h5>
                    <div class="footer-contact">
                        <p><i class="fas fa-phone"></i> 1900 1234</p>
                        <p><i class="fas fa-envelope"></i> support@techmart.vn</p>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Đường ABC, Quận XYZ, TP.HCM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="footer-title">Kết nối với chúng tôi</h5>
                    <div class="social-links">
                        <a href="#" class="me-3"><i class="fab fa-facebook fa-2x"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-youtube fa-2x"></i></a>
                        <a href="#" class="me-3"><i class="fab fa-instagram fa-2x"></i></a>
                        <a href="#"><i class="fab fa-tiktok fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom mt-4">
            <div class="container">
                <p class="mb-0">&copy; 2024 TechMart.vn. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>
    @stack('scripts')
</body>
</html> 