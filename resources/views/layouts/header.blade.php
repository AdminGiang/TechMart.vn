<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">TechMart<span>.vn</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
            aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li><a class="nav-link" href="{{ route('product') }}">Sản phẩm</a></li>
                {{-- <li><a class="nav-link" href="{{ route('services') }}">Dịch vụ</a></li> --}}
                <li><a class="nav-link" href="{{ route('about') }}">Chúng tôi</a></li>
                <li><a class="nav-link" href="{{ route('contact') }}">Liên hệ</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                <li>
                    <div class="search-container position-relative">
                        <form action="{{ route('product.search') }}" method="GET" class="search-form">
                            <input type="text" name="search" class="form-control search-input" placeholder="Tìm kiếm sản phẩm..." autocomplete="off">
                            <button type="submit" class="search-button">
                                <i class="bi bi-search"></i>
                            </button>
                        </form>
                        <div class="search-suggestions" style="display: none;">
                            <!-- Kết quả gợi ý sẽ được thêm vào đây -->
                        </div>
                    </div>
                </li>
                <li><a href="{{ Auth::check() ? route('profile') : route('login') }}" class="nav-link"><img src="{{asset('assets/images/user.svg')}}"></a></li>
                <li class="nav-item">
                    <a class="nav-link cart-link" href="{{ route('cart') }}">
                        <div class="cart-icon-wrapper">
                            <img src="{{asset('assets/images/cart.svg')}}" alt="Cart">
                            @if(Auth::check())
                                @php
                                    $cartCount = App\Models\CartItem::where('user_id', Auth::id())->sum('quantity');
                                @endphp
                                @if($cartCount > 0)
                                    <span class="cart-count">{{ $cartCount }}</span>
                                @endif
                            @endif
                        </div>
                        <div class="cart-popup">
                            <!-- Nội dung popup sẽ được thêm bởi JavaScript -->
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Header/Navigation -->


<style>
.search-container {
    margin-right: 20px;
}

.search-input {
    width: 300px;
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 20px;
    background-color: rgba(255, 255, 255, 0.1);
    color: #fff;
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

.search-input:focus {
    outline: none;
    border-color: #3B5D50;
    background-color: rgba(255, 255, 255, 0.2);
}

.search-button {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #fff;
    cursor: pointer;
}

.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    z-index: 1000;
    max-height: 300px;
    overflow-y: auto;
}

.suggestion-item {
    padding: 10px 15px;
    cursor: pointer;
    color: #333;
    display: flex;
    align-items: center;
    gap: 10px;
}

.suggestion-item:hover {
    background-color: #f8f9fa;
}

.suggestion-item img {
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius: 4px;
}

.suggestion-item .product-info {
    flex: 1;
}

.suggestion-item .product-name {
    font-weight: 500;
    margin-bottom: 2px;
}

.suggestion-item .product-price {
    color: #3B5D50;
    font-weight: 600;
}

.cart-link {
    padding: 0;
    position: relative;
}

.cart-icon-wrapper {
    position: relative;
    display: inline-block;
    padding: 8px;
    cursor: pointer;
}

.cart-icon-wrapper:hover + .cart-popup,
.cart-popup:hover {
    display: block;
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.cart-icon-wrapper img {
    width: 24px;
    height: 24px;
    display: block;
}

.cart-count {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #ff4444;
    color: white;
    border-radius: 50%;
    padding: 2px 6px;
    font-size: 12px;
    min-width: 18px;
    height: 18px;
    line-height: 18px;
    text-align: center;
    display: inline-block;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    transform: translate(50%, -50%);
}

.cart-popup {
    display: none;
    position: absolute;
    top: calc(100% + 10px);
    right: -10px;
    width: 320px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.15);
    z-index: 1000;
    padding: 15px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
}

.cart-popup::before {
    content: '';
    position: absolute;
    top: -6px;
    right: 20px;
    width: 12px;
    height: 12px;
    background: white;
    transform: rotate(45deg);
    box-shadow: -2px -2px 5px rgba(0,0,0,0.04);
}

.cart-popup.show {
    display: block;
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.cart-popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.cart-popup-title {
    font-size: 16px;
    font-weight: 600;
    color: #333;
}

.cart-count-badge {
    background: #ff4444;
    color: white;
    padding: 2px 6px;
    border-radius: 12px;
    font-size: 12px;
}

.cart-items {
    max-height: 300px;
    overflow-y: auto;
    margin: 10px -15px;
    padding: 0 15px;
}

.cart-items::-webkit-scrollbar {
    width: 6px;
}

.cart-items::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.cart-items::-webkit-scrollbar-thumb {
    background: #3B5D50;
    border-radius: 3px;
}

.cart-item {
    display: flex;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    transition: background-color 0.2s ease;
}

.cart-item:hover {
    background-color: #f8f9fa;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-item-image {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 4px;
    margin-right: 10px;
    border: 1px solid #eee;
}

.cart-item-details {
    flex: 1;
}

.cart-item-name {
    font-size: 14px;
    color: #333;
    margin-bottom: 4px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.cart-item-price {
    font-size: 13px;
    color: #ff4444;
    font-weight: 600;
}

.cart-item-quantity {
    font-size: 12px;
    color: #666;
    margin-top: 2px;
}

.cart-popup-footer {
    margin-top: 10px;
    padding-top: 10px;
    border-top: 1px solid #eee;
}

.cart-total {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-weight: 600;
    color: #333;
}

.view-cart-btn {
    display: block;
    width: 100%;
    padding: 10px;
    background: #3B5D50;
    color: white;
    text-align: center;
    border-radius: 4px;
    text-decoration: none;
    transition: all 0.3s ease;
    border: none;
    font-weight: 500;
}

.view-cart-btn:hover {
    background: #2A4337;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}

.empty-cart {
    text-align: center;
    padding: 30px 0;
    color: #666;
}

.empty-cart p {
    margin-bottom: 15px;
    font-size: 14px;
    color: #999;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const searchSuggestions = document.querySelector('.search-suggestions');
    const cartLink = document.querySelector('.cart-link');
    const cartPopup = document.querySelector('.cart-popup');
    let timeoutId;

    // Xử lý tìm kiếm
    searchInput.addEventListener('input', function() {
        clearTimeout(timeoutId);
        const query = this.value.trim();

        if (query.length < 2) {
            searchSuggestions.style.display = 'none';
            return;
        }

        timeoutId = setTimeout(() => {
            fetch(`/search-suggestions?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        searchSuggestions.innerHTML = data.map(product => `
                            <div class="suggestion-item" onclick="window.location.href='/product/${product.id}'">
                                <img src="${product.image}" alt="${product.name}">
                                <div class="product-info">
                                    <div class="product-name">${product.name}</div>
                                    <div class="product-price">${new Intl.NumberFormat('vi-VN').format(product.price)} VNĐ</div>
                                </div>
                            </div>
                        `).join('');
                        searchSuggestions.style.display = 'block';
                    } else {
                        searchSuggestions.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    searchSuggestions.style.display = 'none';
                });
        }, 300);
    });

    // Đóng gợi ý khi click ra ngoài
    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !searchSuggestions.contains(event.target)) {
            searchSuggestions.style.display = 'none';
        }
    });

    // Xử lý hiển thị giỏ hàng mini
    let cartTimeoutId;

    function showMiniCart() {
        clearTimeout(cartTimeoutId);
        updateCartPopup();
        cartPopup.classList.add('show');
    }

    function hideMiniCart() {
        cartTimeoutId = setTimeout(() => {
            cartPopup.classList.remove('show');
        }, 300);
    }

    cartLink.addEventListener('mouseenter', showMiniCart);
    cartLink.addEventListener('mouseleave', hideMiniCart);
    cartPopup.addEventListener('mouseenter', () => clearTimeout(cartTimeoutId));
    cartPopup.addEventListener('mouseleave', hideMiniCart);

    // Hàm cập nhật nội dung giỏ hàng mini
    function updateCartPopup() {
        fetch('/cart/mini')
            .then(response => response.json())
            .then(data => {
                console.log('Cart data:', data); // Debug log
                
                if(data.items && data.items.length > 0) {
                    let html = `
                        <div class="cart-popup-header">
                            <span class="cart-popup-title">Giỏ hàng của bạn</span>
                            <span class="cart-count-badge">${data.total_items} sản phẩm</span>
                        </div>
                        <div class="cart-items">
                    `;

                    data.items.forEach(item => {
                        html += `
                            <div class="cart-item">
                                <img src="${item.image}" alt="${item.name}" class="cart-item-image">
                                <div class="cart-item-details">
                                    <div class="cart-item-name">${item.name}</div>
                                    <div class="cart-item-price">${new Intl.NumberFormat('vi-VN').format(item.price)} VNĐ</div>
                                    <div class="cart-item-quantity">Số lượng: ${item.quantity}</div>
                                </div>
                            </div>
                        `;
                    });

                    html += `
                        </div>
                        <div class="cart-popup-footer">
                            <div class="cart-total">
                                <span>Tổng tiền:</span>
                                <span>${new Intl.NumberFormat('vi-VN').format(data.total_price)} VNĐ</span>
                            </div>
                            <a href="/cart" class="view-cart-btn">Xem giỏ hàng</a>
                        </div>
                    `;
                    cartPopup.innerHTML = html;
                } else {
                    cartPopup.innerHTML = `
                        <div class="empty-cart">
                            <p>Giỏ hàng trống</p>
                            <a href="/product" class="view-cart-btn">Mua sắm ngay</a>
                        </div>
                    `;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                cartPopup.innerHTML = `
                    <div class="empty-cart">
                        <p>Có lỗi xảy ra khi tải giỏ hàng</p>
                        <p class="text-danger">Vui lòng thử lại sau</p>
                    </div>
                `;
            });
    }

    // Cập nhật giỏ hàng khi trang được tải
    if (cartPopup) {
        updateCartPopup();
    }
});
</script>



