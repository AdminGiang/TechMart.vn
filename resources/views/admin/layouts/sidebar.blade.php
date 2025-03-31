{{-- <button class="sidebar-menu-button">
    <span class="material-symbols-rounded">
        menu
    </span>
</button> --}}

<aside class="sidebar">
    <header class="sidebar-header">
        {{-- <a href="" class="header-logo"> --}}
        <img src="" alt="">
        <button class="sidebar-toggler">
            <span class="material-symbols-rounded">
                chevron_left
            </span>
        </button>
        </a>
    </header>

    <nav class="sidebar-nav">
        <ul class="nav-list primary-nav">
            {{-- THỐNG KÊ --}}
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">data_thresholding</span>
                    <span class="nav-label">Thống Kê</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="" class="nav-link dropdown-title">Thống Kê</a></li>
                </ul>
            </li>

            {{-- SẢN PHẨM - DANH MỤC --}}
            <li class="nav-item dropdown-container">
                <a href="" class="nav-link dropdown-toggle">
                    <span class="material-symbols-rounded">calendar_today</span>
                    <span class="nav-label">Sản Phẩm</span>
                    <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="{{ route('admin.Category') }}" class="nav-link dropdown-link">Danh
                            Mục</a></li>
                    <li class="nav-item"><a href="{{ route('admin.Product') }}" class="nav-link dropdown-link">Sản
                            Phẩm</a></li>
                    <li class="nav-item"><a href="{{ route('admin.Brand') }}" class="nav-link dropdown-link">Thuơng
                            Hiệu</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link"></a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link"></a></li>
                </ul>
            </li>

            {{-- BÀI VIẾT --}}
            <li class="nav-item dropdown-container">
                <a href="" class="nav-link dropdown-toggle">
                    <span class="material-symbols-rounded">calendar_today</span>
                    <span class="nav-label">Bài Viết</span>
                    <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Blog</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link"></a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link"></a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link"></a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link"></a></li>
                </ul>
            </li>

            {{-- TÀI KHOẢN --}}
            <li class="nav-item dropdown-container">
                <a href="" class="nav-link dropdown-toggle">
                    <span class="material-symbols-rounded">groups_3</span>
                    <span class="nav-label">Tài Khoản</span>
                    <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Vai trò</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Nhân Viên</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Khách Hàng</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">aaa</a></li>
                </ul>
            </li>

            {{-- THÔNG BÁO --}}
            <li class="nav-item dropdown-container">
                <a href="" class="nav-link dropdown-toggle">
                    <span class="material-symbols-rounded">notifications</span>
                    <span class="nav-label">Thông Báo</span>
                    <span class="dropdown-icon material-symbols-rounded">keyboard_arrow_down</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Bình Luận</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Đánh Giá</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">Liên Hệ</a></li>
                    <li class="nav-item"><a href="" class="nav-link dropdown-link">aaa</a></li>
                </ul>
            </li>

            {{-- ĐƠN HÀNG --}}
            <li class="nav-item">
                <a href="{{ route('admin.Order') }}" class="nav-link">
                    <span class="material-symbols-rounded">shopping_cart_checkout</span>
                    <span class="nav-label">Đơn Hàng</span>
                </a>
            </li>

            {{-- KHO HÀNG --}}
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">warehouse</span>
                    <span class="nav-label">Kho Hàng</span>
                </a>
            </li>

            {{-- VẬN CHUYỂN --}}
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">local_shipping</span>
                    <span class="nav-label">Vận Chuyển</span>
                </a>
            </li>

            {{-- EXTENSION --}}
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">extension</span>
                    <span class="nav-label">Extension</span>
                </a>
            </li>

            {{-- CÀI ĐẶT --}}
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">settings</span>
                    <span class="nav-label">Cài Đặt</span>
                </a>
            </li>
        </ul>

        <ul class="nav-list secondary-nav">
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">help</span>
                    <span class="nav-label">Hỗ Trợ</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">
                    <span class="material-symbols-rounded">logout</span>
                    <span class="nav-label">Đăng Xuất</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>
