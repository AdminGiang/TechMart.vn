@extends('layout.app')

@section('title', 'Cửa hàng')

@section('styles')
    <link href="{{ asset('css/shop.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="shop-container">
    <!-- Filter Section -->
    <div class="filter-sidebar">
        <h4 class="filter-header">
            <i class="fas fa-filter me-2"></i>Bộ lọc tìm kiếm
        </h4>
        
        <!-- Price Filter -->
        <div class="filter-section">
            <h5 class="filter-title">
                <i class="fas fa-tags me-2"></i>Khoảng giá
            </h5>
            <div class="price-filter">
                <div class="price-inputs">
                    <div class="price-input">
                        <label>Từ:</label>
                        <input type="number" id="minPrice" value="{{ request('min_price', 1000000) }}" min="1000000" step="100000">
                    </div>
                    <div class="price-input">
                        <label>Đến:</label>
                        <input type="number" id="maxPrice" value="{{ request('max_price', 10000000) }}" min="1000000" step="100000">
            </div>
        </div>
                <div class="price-slider">
                    <input type="range" id="priceRange" min="1000000" max="10000000" step="100000" 
                           value="{{ request('max_price', 10000000) }}"
                           class="range-slider">
            </div>
        </div>
    </div>

        <!-- Brand Filter -->
        <div class="filter-section">
            <h5 class="filter-title">
                <i class="fas fa-building me-2"></i>Thương hiệu
            </h5>
            <div class="brand-filter">
                                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="apple" id="apple" {{ in_array('apple', (array)request('brand')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="apple">Apple</label>
                                </div>
                                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="samsung" id="samsung" {{ in_array('samsung', (array)request('brand')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="samsung">Samsung</label>
                                </div>
                                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="dell" id="dell" {{ in_array('dell', (array)request('brand')) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dell">Dell</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="brand[]" value="asus" id="asus" {{ in_array('asus', (array)request('brand')) ? 'checked' : '' }}>
                    <label class="form-check-label" for="asus">Asus</label>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="products-section">
        <!-- Sort and Results Count -->
        <div class="products-header">
            <div class="results-count">
                Hiển thị {{ $products->firstItem() }}-{{ $products->lastItem() }} của {{ $products->total() }} sản phẩm
            </div>
            <div class="sort-dropdown">
                <select id="sortSelect" class="form-select">
                    <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Sắp xếp mặc định</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                </select>
            </div>
            </div>

        <!-- Products Grid -->
        <div class="products-grid">
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('images/' . $product->Image) }}" alt="{{ $product->Name }}">
                    @php
                        $discountPercentage = $product->getDiscountPercentage();
                    @endphp
                    @if($discountPercentage > 0)
                        <div class="discount-badge">-{{ round($discountPercentage) }}%</div>
                    @endif
                </div>
                <div class="product-info">
                    <h3 class="product-title">{{ $product->Name }}</h3>
                    <div class="price-section">
                        @if($discountPercentage > 0)
                            <span class="original-price">{{ number_format($product->Price) }}₫</span>
                            <span class="current-price">{{ number_format($product->getDiscountedPrice()) }}₫</span>
                        @else
                            <span class="current-price">{{ number_format($product->Price) }}₫</span>
                        @endif
                    </div>
                    <div class="product-meta">
                        <div class="rating">
                            @php
                                $rating = $product->Rating ?? 0;
                            @endphp
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star{{ $i < $rating ? ' active' : '' }}"></i>
                            @endfor
                            <span>({{ $product->ReviewCount ?? 0 }} đánh giá)</span>
                        </div>
                        <div class="sold-count">
                            <i class="fas fa-fire"></i> Đã bán: {{ $product->SoldCount ?? 0 }}
                        </div>
                    </div>
                    <button class="add-to-cart" data-product-id="{{ $product->ProductID }}">
                        <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ
                    </button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        {{ $products->withQueryString()->links('vendor.pagination.custom') }}
    </div>
</div>
@endsection

@push('scripts')
    <script>
    // Price Range Slider
    const priceRange = document.getElementById('priceRange');
    const minPriceInput = document.getElementById('minPrice');
    const maxPriceInput = document.getElementById('maxPrice');

    // Update max price when slider changes
    priceRange.addEventListener('input', function() {
        maxPriceInput.value = this.value;
        updateFilters();
    });

    // Update slider when max price input changes
    maxPriceInput.addEventListener('change', function() {
        if (parseInt(this.value) < parseInt(minPriceInput.value)) {
            this.value = minPriceInput.value;
        }
        priceRange.value = this.value;
        updateFilters();
    });

    // Update min price input
    minPriceInput.addEventListener('change', function() {
        if (parseInt(this.value) > parseInt(maxPriceInput.value)) {
            this.value = maxPriceInput.value;
        }
        updateFilters();
    });

    // Handle brand checkboxes
    document.querySelectorAll('input[name="brand[]"]').forEach(checkbox => {
        checkbox.addEventListener('change', updateFilters);
    });

    // Handle sort select
    document.getElementById('sortSelect').addEventListener('change', function() {
        updateFilters();
    });

    function updateFilters() {
            const url = new URL(window.location.href);
            
        // Update price range
        url.searchParams.set('min_price', minPriceInput.value);
        url.searchParams.set('max_price', maxPriceInput.value);
        
        // Update brands
        const selectedBrands = Array.from(document.querySelectorAll('input[name="brand[]"]:checked'))
            .map(cb => cb.value);
        if (selectedBrands.length > 0) {
            url.searchParams.set('brand', selectedBrands.join(','));
        } else {
            url.searchParams.delete('brand');
        }
        
        // Update sort
        const sortValue = document.getElementById('sortSelect').value;
        if (sortValue !== 'default') {
                url.searchParams.set('sort', sortValue);
            } else {
                url.searchParams.delete('sort');
            }
            
        // Reset to first page
        url.searchParams.set('page', '1');
        
            window.location.href = url.toString();
        }
    </script>
@endpush 