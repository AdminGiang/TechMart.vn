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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('.search-input');
    const searchSuggestions = document.querySelector('.search-suggestions');
    let timeoutId;

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
});
</script>

