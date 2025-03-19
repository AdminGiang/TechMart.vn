<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />

    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('assets/css/tiny-slider.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <title>Shop - TechMart.vn</title>
    <style>
        .nav-link {
            color: #fff !important;
            padding: 0.5rem 1rem;
            font-weight: 500;
        }
        .nav-link.active {
            border-bottom: 2px solid #FDB813;
        }
        .navbar {
            background-color: #3B5D50 !important;
            padding: 1rem 0;
        }
        .navbar-brand {
            color: #fff !important;
            font-size: 24px;
            font-weight: bold;
        }
        .navbar-brand span {
            color: #fff !important;
            opacity: 0.8;
        }
        .hero {
            background-color: #3B5D50;
            padding: 50px 0;
            position: relative;
            overflow: hidden;
        }
        .dots-overlay {
            position: absolute;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background-image: radial-gradient(rgba(255,255,255,0.1) 2px, transparent 2px);
            background-size: 15px 15px;
        }
        .btn-warning {
            background-color: #FDB813;
            border: none;
            padding: 12px 30px;
            font-weight: 500;
        }
        .btn-outline-light {
            padding: 12px 30px;
            font-weight: 500;
        }
        .fas {
            color: #fff !important;
        }

        /* Cải thiện UI Shop */
        .shop-container {
            padding: 3rem 0;
            background-color: #f8f9fa;
        }
        .filter-card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
            position: sticky;
            top: 20px;
        }
        .filter-card .card-header {
            background-color: #3B5D50;
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 1rem 1.5rem;
        }
        .filter-card .card-body {
            padding: 1.5rem;
        }
        .filter-heading {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #3B5D50;
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
        }
        .form-check-label {
            cursor: pointer;
        }
        .filter-btn {
            background-color: #3B5D50;
            border: none;
            transition: all 0.3s;
        }
        .filter-btn:hover {
            background-color: #2a4a3d;
            transform: translateY(-2px);
        }
        .reset-btn {
            border: 1px solid #3B5D50;
            color: #3B5D50;
            transition: all 0.3s;
        }
        .reset-btn:hover {
            background-color: #f1f1f1;
        }
        
        /* Product Card Styling */
        .product-card {
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            height: 100%;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .product-img-wrapper {
            height: 220px;
            overflow: hidden;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .product-img {
            max-height: 100%;
            object-fit: contain;
            transition: all 0.5s;
        }
        .product-card:hover .product-img {
            transform: scale(1.05);
        }
        .product-info {
            padding: 1.25rem;
        }
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #333;
            height: 50px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .product-desc {
            color: #6c757d;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            height: 40px;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .product-price {
            font-weight: 700;
            font-size: 1.2rem;
            color: #3B5D50;
            margin-bottom: 1rem;
        }
        .add-to-cart-btn {
            width: 100%;
            background-color: #3B5D50;
            border: none;
            border-radius: 30px;
            padding: 0.5rem 0;
            font-weight: 500;
            transition: all 0.3s;
        }
        .add-to-cart-btn:hover {
            background-color: #2a4a3d;
            transform: translateY(-2px);
        }
        
        /* Pagination Styling - NEW */
        .custom-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 2rem;
            background: #3B5D50;
            padding: 10px 20px;
            border-radius: 50px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            list-style: none;
        }

        .custom-pagination .page-item {
            margin: 0;
            list-style: none;
        }

        .custom-pagination .page-link {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            color: #fff;
            font-weight: 500;
            border: none;
            background: transparent;
            transition: all 0.3s ease;
            padding: 0;
            font-size: 16px;
            text-decoration: none;
        }

        .custom-pagination .page-item.active .page-link {
            background-color: #fff;
            color: #3B5D50;
        }

        .custom-pagination .page-item:not(.active) .page-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .custom-pagination .page-item.disabled .page-link {
            opacity: 0.5;
            cursor: not-allowed;
        }

        /* Arrow styling - NEW */
        .custom-pagination .arrow-link {
            background: transparent;
            border: none;
            padding: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            transition: all 0.3s ease;
            position: relative;
        }

        .custom-pagination .arrow-link::before {
            content: '';
            width: 10px;
            height: 10px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            display: inline-block;
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .custom-pagination .arrow-left::before {
            transform: translate(-25%, -50%) rotate(135deg);
        }

        .custom-pagination .arrow-right::before {
            transform: translate(-75%, -50%) rotate(-45deg);
        }

        .custom-pagination .page-item.disabled .arrow-link::before {
            opacity: 0.5;
            border-color: #fff;
        }

        .custom-pagination .page-item:not(.disabled) .arrow-link:hover::before {
            border-color: rgba(255, 255, 255, 0.8);
        }

        /* Banner styling */
        .shop-banner {
            background-color: #3B5D50;
            color: white;
            padding: 2.5rem 0;
            margin-bottom: 2rem;
            position: relative;
            overflow: hidden;
        }
        .shop-banner h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .shop-banner p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 80%;
        }
        .shop-banner::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 40%;
            height: 100%;
            background-image: radial-gradient(rgba(255,255,255,0.1) 2px, transparent 2px);
            background-size: 15px 15px;
        }
        
        /* Results count */
        .results-count {
            font-size: 1rem;
            color: #6c757d;
            margin-bottom: 1.5rem;
        }

        /* Product Card Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            animation: fadeInUp 0.6s ease-out;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        /* Filter Animation */
        .filter-card {
            animation: fadeInUp 0.4s ease-out;
        }

        .filter-checkbox:checked + .form-check-label {
            color: #3B5D50;
            font-weight: 500;
            transform: translateX(3px);
            transition: all 0.3s ease;
        }

        /* Button Animation */
        .filter-btn, .add-to-cart-btn {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .filter-btn::after, .add-to-cart-btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: -100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: 0.5s;
        }

        .filter-btn:hover::after, .add-to-cart-btn:hover::after {
            left: 100%;
        }

        .filter-btn:hover, .add-to-cart-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Sort Select Animation */
        .sort-options .form-select {
            transition: all 0.3s ease;
            border-color: #3B5D50;
        }

        .sort-options .form-select:hover {
            border-color: #2a4a3d;
            box-shadow: 0 0 0 0.2rem rgba(59, 93, 80, 0.25);
        }

        /* Results Count Animation */
        .results-count {
            animation: fadeInUp 0.5s ease-out;
            transition: all 0.3s ease;
        }

        /* Shop Banner Animation */
        .shop-banner {
            animation: fadeInUp 0.7s ease-out;
        }

        @keyframes dotPulse {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; }
            100% { transform: scale(1); opacity: 1; }
        }

        .custom-pagination::before,
        .custom-pagination::after,
        .custom-pagination .page-item:not(:first-child):not(:last-child)::after {
            animation: dotPulse 2s infinite;
        }
    </style>
</head>

<body>
    <!-- Start Header/Navigation -->
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
        <div class="container">
            <a class="navbar-brand" href="/">TechMart<span>.vn</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsFurni">
                <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Trang chủ</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/shop">Cửa hàng</a>
                    </li>
                    <li><a class="nav-link" href="/about">Về chúng tôi</a></li>
                    <li><a class="nav-link" href="/services">Dịch vụ</a></li>
                    <li><a class="nav-link" href="/blog">Blog</a></li>
                    <li><a class="nav-link" href="/contact">Liên hệ</a></li>
                </ul>

                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                    <li><a class="nav-link" href="#"><img src="{{asset('assets/images/user.svg')}}"></a></li>
                    <li><a class="nav-link" href="cart.html"><img src="{{asset('assets/images/cart.svg')}}"></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Header/Navigation -->

    <!-- Shop Banner -->
    <div class="shop-banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1>Cửa Hàng TechMart</h1>
                    <p>Khám phá các sản phẩm công nghệ mới nhất với giá cả hợp lý và chất lượng đảm bảo. Từ laptop, điện thoại đến các phụ kiện thông minh.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Shop Content -->
    <div class="shop-container">
        <div class="container">
            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-md-3">
                    <form action="/shop" method="GET" id="filterForm">
                        <div class="card filter-card">
                            <div class="card-header">
                                <h5 class="mb-0"><i class="fas fa-filter me-2"></i>Bộ lọc</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="filter-heading">Danh mục sản phẩm</h6>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="category[]" value="1" id="laptop" {{ in_array('1', request()->get('category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="laptop">Laptop</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="category[]" value="2" id="phone" {{ in_array('2', request()->get('category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="phone">Điện thoại</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="category[]" value="3" id="tablet" {{ in_array('3', request()->get('category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="tablet">Máy tính bảng</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="category[]" value="4" id="accessories" {{ in_array('4', request()->get('category', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="accessories">Phụ kiện</label>
                                </div>

                                <h6 class="filter-heading mt-4">Khoảng giá</h6>
                                <div class="input-group mb-3">
                                    <input type="number" name="price_from" class="form-control filter-input" placeholder="Từ" value="{{ request()->get('price_from') }}">
                                    <span class="input-group-text">-</span>
                                    <input type="number" name="price_to" class="form-control filter-input" placeholder="Đến" value="{{ request()->get('price_to') }}">
                                </div>

                                <h6 class="filter-heading mt-4">Thương hiệu</h6>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="brand[]" value="apple" id="apple" {{ in_array('apple', request()->get('brand', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="apple">Apple</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="brand[]" value="samsung" id="samsung" {{ in_array('samsung', request()->get('brand', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="samsung">Samsung</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="brand[]" value="lenovo" id="lenovo" {{ in_array('lenovo', request()->get('brand', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lenovo">Lenovo</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="brand[]" value="dell" id="dell" {{ in_array('dell', request()->get('brand', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dell">Dell</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input filter-checkbox" type="checkbox" name="brand[]" value="asus" id="asus" {{ in_array('asus', request()->get('brand', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="asus">Asus</label>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary w-100 filter-btn mb-2">Áp dụng bộ lọc</button>
                                    <button type="button" class="btn btn-outline-secondary w-100 reset-btn" id="resetFilter">Đặt lại</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Product Grid -->
                <div class="col-md-9">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="results-count">
                            Hiển thị {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} của {{ $products->total() ?? 0 }} sản phẩm
                        </div>
                        <div class="sort-options">
                            <select class="form-select" id="sort-select" onchange="updateSort(this.value)">
                                <option value="">Sắp xếp mặc định</option>
                                <option value="price_asc" {{ request()->get('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến cao</option>
                                <option value="price_desc" {{ request()->get('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến thấp</option>
                                <option value="newest" {{ request()->get('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                <div class="product-img-wrapper">
                                    <img src="{{asset($product->Image)}}" class="product-img" alt="{{ $product->Name }}">
                                </div>
                                <div class="product-info">
                                    <h5 class="product-title">{{ $product->Name }}</h5>
                                    <p class="product-desc">{{ $product->Description }}</p>
                                    <div class="product-price">{{ number_format($product->Price, 0, ',', '.') }}đ</div>
                                    <a href="#" class="btn btn-primary add-to-cart-btn" data-product-id="{{ $product->Id }}">
                                        <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-5">
                        <div class="custom-pagination">
                            @if ($products->currentPage() > 1)
                                <li class="page-item">
                                    <a class="page-link arrow-link arrow-left" href="{{ $products->withQueryString()->previousPageUrl() }}" rel="prev"></a>
                                </li>
                            @endif

                            @foreach ($products->withQueryString()->getUrlRange(1, $products->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $products->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            @if ($products->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link arrow-link arrow-right" href="{{ $products->withQueryString()->nextPageUrl() }}" rel="next"></a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link arrow-link arrow-right"></span>
                                </li>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer-section">
        <div class="container relative">
            <div class="sofa-img">
                
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img src="{{asset('assets/images/envelope-outline.svg')}}" alt="Image" class="img-fluid"></span><span>Đăng ký nhận tin</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" class="form-control" placeholder="Nhập tên của bạn">
                            </div>
                            <div class="col-auto">
                                <input type="email" class="form-control" placeholder="Nhập email của bạn">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="/" class="footer-logo">TechMart<span>.vn</span></a></div>
                    <p class="mb-4">Chuyên cung cấp các sản phẩm điện tử chính hãng với giá tốt nhất thị trường. Cam kết bảo hành chính hãng, giao hàng nhanh chóng.</p>

                    <ul class="list-unstyled custom-social">
                        <li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
                        <li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="/about">Về chúng tôi</a></li>
                                <li><a href="/services">Dịch vụ</a></li>
                                <li><a href="/blog">Blog</a></li>
                                <li><a href="/contact">Liên hệ</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Hỗ trợ</a></li>
                                <li><a href="#">Kiến thức</a></li>
                                <li><a href="#">Chat trực tuyến</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Tuyển dụng</a></li>
                                <li><a href="#">Đội ngũ</a></li>
                                <li><a href="#">Ban lãnh đạo</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                            </ul>
                        </div>

                  
                    </div>
                </div>
            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright ©<script>document.write(new Date().getFullYear());</script>2025. All Rights Reserved. — Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a></p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Điều khoản &amp; Điều kiện</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Xử lý checkbox
            const filterCheckboxes = document.querySelectorAll('.filter-checkbox');
            filterCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    document.getElementById('filterForm').submit();
                });
            });

            // Xử lý input giá với debounce
            const priceInputs = document.querySelectorAll('.filter-input');
            let timeout = null;
            priceInputs.forEach(input => {
                input.addEventListener('input', function() {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        document.getElementById('filterForm').submit();
                    }, 1000);
                });
            });

            // Xử lý nút reset
            document.getElementById('resetFilter').addEventListener('click', function() {
                // Reset tất cả checkbox
                filterCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                
                // Reset các input giá
                priceInputs.forEach(input => {
                    input.value = '';
                });

                // Submit form
                document.getElementById('filterForm').submit();
            });
        });

        // Hàm xử lý sắp xếp
        function updateSort(sortValue) {
            // Lấy URL hiện tại
            const url = new URL(window.location.href);
            
            // Cập nhật hoặc thêm tham số sort
            if (sortValue) {
                url.searchParams.set('sort', sortValue);
            } else {
                url.searchParams.delete('sort');
            }
            
            // Chuyển hướng đến URL mới
            window.location.href = url.toString();
        }
    </script>
</body>
</html> 