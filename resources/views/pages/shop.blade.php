@extends('layouts.master')

@section('title', 'Shop')

@section('styles')
    <link href="{{ asset('assets/css/shop.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .shop-container {
            padding: 2rem;
            display: flex;
            gap: 2rem;
        }
        .filter-sidebar {
            width: 280px;
            background: #fff;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .filter-header {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .price-filter {
            margin-bottom: 1.5rem;
        }
        .price-inputs {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        .price-input input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .product-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-image {
            position: relative;
            padding-top: 100%;
        }
        .product-image img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #ff4444;
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .product-info {
            padding: 1rem;
        }
        .product-title {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: #333;
            height: 2.4em;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .price-section {
            margin-bottom: 0.5rem;
        }
        .original-price {
            color: #999;
            text-decoration: line-through;
            font-size: 0.9rem;
            margin-right: 0.5rem;
        }
        .current-price {
            color: #ff4444;
            font-weight: 600;
            font-size: 1.1rem;
        }
        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            color: #666;
        }
        .rating .fa-star {
            color: #ddd;
            font-size: 0.9rem;
        }
        .rating .fa-star.active {
            color: #ffc107;
        }
        .add-to-cart {
            width: 100%;
            padding: 0.5rem;
            background: #3B5D50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        .add-to-cart:hover {
            background: #2A4337;
        }
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .results-count {
            color: #666;
        }
        .sort-dropdown select {
            padding: 0.5rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            min-width: 200px;
        }
    </style>
@endsection

@section('content')
<div class="shop-container">
    <!-- Filter Section -->
    <div class="filter-sidebar">
        <h4 class="filter-header">
            <i class="fas fa-filter"></i>
            Bộ lọc tìm kiếm
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
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp đến Cao</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao đến Thấp</option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Mới nhất</option>
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image">
                    <img src="{{ asset('assets/images/' . $product->Image) }}" alt="{{ $product->Name }}">
                    @php
                        $discount = $product->discounts()
                            ->where('is_active', true)
                            ->where(function($query) {
                                $now = now();
                                $query->where(function($q) use ($now) {
                                    $q->whereNull('start_date')
                                      ->orWhere('start_date', '<=', $now);
                                })
                                ->where(function($q) use ($now) {
                                    $q->whereNull('end_date')
                                      ->orWhere('end_date', '>=', $now);
                                });
                            })
                            ->latest()
                            ->first();
                    @endphp
                    @if($discount)
                        <div class="discount-badge">-{{ round($discount->discount_percentage) }}%</div>
                    @endif
                </div>
                <div class="product-info">
                    <h3 class="product-title">{{ $product->Name }}</h3>
                    <div class="price-section">
                        @if($discount)
                            <span class="original-price">{{ number_format($product->Price) }}₫</span>
                            <span class="current-price">{{ number_format($discount->final_price) }}₫</span>
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
                    <button class="add-to-cart" data-product-id="{{ $product->Id }}">
                        <i class="fas fa-shopping-cart"></i>Thêm vào giỏ
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
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // Add to cart functionality
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.productId;
                    // Add your cart logic here
                    alert('Đã thêm sản phẩm vào giỏ hàng!');
                });
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
        });
    </script>
@endpush

