@extends('layouts.master')

@section('title', 'Shop')

@section('content')
    <!-- Start Hero Section -->
 
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <div class="filter-sidebar">
                        <h4 class="mb-4 section-title">Filter Products</h4>
                        
                        <!-- Price Filter -->
                        <div class="mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-dollar-sign me-2"></i>
                                Price Range
                            </h5>
                            <div class="price-filter">
                                <div class="price-inputs">
                                    <div class="form-group mb-3">
                                        <label class="mb-2">From:</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₫</span>
                                            <input type="number" id="minPrice" class="form-control" value="{{ request('min_price', 1000000) }}" min="0" step="100000">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="mb-2">To:</label>
                                        <div class="input-group">
                                            <span class="input-group-text">₫</span>
                                            <input type="number" id="maxPrice" class="form-control" value="{{ request('max_price', 10000000) }}" min="0" step="100000">
                                        </div>
                                    </div>
                                </div>
                                <div class="price-slider mb-3">
                                    <input type="range" id="priceRange" class="form-range" min="0" max="50000000" step="100000" 
                                           value="{{ request('max_price', 10000000) }}">
                                </div>
                                <button class="btn btn-primary btn-sm w-100 apply-filter">
                                    <i class="fas fa-filter me-2"></i>Apply Filter
                                </button>
                            </div>
                        </div>

                        <!-- Brand Filter -->
                        <div class="mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-tag me-2"></i>
                                Brands
                            </h5>
                            <div class="brand-filter">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search brands..." id="brandSearch">
                                    <span class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <div class="brand-list">
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="brand[]" value="apple" id="apple" {{ in_array('apple', (array)request('brand')) ? 'checked' : '' }}>
                                        <label class="form-check-label d-flex align-items-center" for="apple">
                                            <img src="{{ asset('assets/images/brands/apple.png') }}" alt="Apple" class="brand-icon me-2">
                                            Apple
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="brand[]" value="samsung" id="samsung" {{ in_array('samsung', (array)request('brand')) ? 'checked' : '' }}>
                                        <label class="form-check-label d-flex align-items-center" for="samsung">
                                            <img src="{{ asset('assets/images/brands/samsung.png') }}" alt="Samsung" class="brand-icon me-2">
                                            Samsung
                                        </label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="brand[]" value="dell" id="dell" {{ in_array('dell', (array)request('brand')) ? 'checked' : '' }}>
                                        <label class="form-check-label d-flex align-items-center" for="dell">
                                            <img src="{{ asset('assets/images/brands/dell.png') }}" alt="Dell" class="brand-icon me-2">
                                            Dell
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="brand[]" value="asus" id="asus" {{ in_array('asus', (array)request('brand')) ? 'checked' : '' }}>
                                        <label class="form-check-label d-flex align-items-center" for="asus">
                                            <img src="{{ asset('assets/images/brands/asus.png') }}" alt="Asus" class="brand-icon me-2">
                                            Asus
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Discount Filter -->
                        <div class="mb-4">
                            <h5 class="mb-3">
                                <i class="fas fa-percent me-2"></i>
                                Promotions
                            </h5>
                            <div class="discount-filter">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="discount" id="hasDiscount" {{ request('discount') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hasDiscount">
                                        On Sale
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="discount_30" id="discount30" {{ request('discount_30') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="discount30">
                                        Discount ≥ 30%
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="discount_50" id="discount50" {{ request('discount_50') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="discount50">
                                        Discount ≥ 50%
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Clear Filters -->
                        <button class="btn btn-outline-secondary w-100 clear-filter">
                            <i class="fas fa-times me-2"></i>Clear All Filters
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <!-- Sort and Results Count -->
                    <div class="row mb-5">
                        <div class="col-sm-6">
                            <h2 class="section-title">Our Products</h2>
                            <p class="results-count">Showing {{ $products->firstItem() }}-{{ $products->lastItem() }} of {{ $products->total() }} products</p>
                        </div>
                        <div class="col-sm-6 text-sm-end">
                            <select id="sortSelect" class="form-select" style="max-width: 200px; float: right;">
                                <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Default sorting</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest first</option>
                                <option value="discount" {{ request('sort') == 'discount' ? 'selected' : '' }}>Biggest discount</option>
                            </select>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="row">
                        @foreach($products as $product)
                        <div class="col-12 col-md-4 col-lg-4 mb-5">
                            <div class="product-item">
                              <a href="{{ route('product.detail', $product->Id) }}" class="product-link"> 
                                    <div class="product-image position-relative">
                                        <img src="{{ asset('assets/images/' . $product->Image) }}" class="img-fluid product-thumbnail" alt="{{ $product->Name }}">
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
                                            <div class="product-discount">
                                                <span class="discount-label">-{{ round($discount->discount_percentage) }}%</span>
                                                <span class="discount-save">Save {{ number_format($product->Price - $discount->final_price) }}₫</span>
                                            </div>
                                        @endif
                                        @if($product->is_new)
                                            <div class="product-badge new">New</div>
                                        @endif
                                        @if($product->is_hot)
                                            <div class="product-badge hot">Hot</div>
                                        @endif
                                    </div>
                                </a>
                                <div class="product-info">
                                    <h3 class="product-title">
                                    <a href="{{ route('product.detail', $product->Id) }}">{{ $product->Name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        @if($discount)
                                            <del class="original-price">{{ number_format($product->Price) }}₫</del>
                                            <strong class="current-price">{{ number_format($discount->final_price) }}₫</strong>
                                        @else
                                            <strong class="current-price">{{ number_format($product->Price) }}₫</strong>
                                        @endif
                                    </div>
                                    <div class="product-meta mb-3">
                                        <div class="rating">
                                            @php
                                                $rating = $product->Rating ?? 0;
                                            @endphp
                                            @for($i = 0; $i < 5; $i++)
                                                <i class="fas fa-star{{ $i < $rating ? ' active' : '' }}"></i>
                                            @endfor
                                            <span>({{ $product->ReviewCount ?? 0 }})</span>
                                        </div>
                                        <div class="sold-count">
                                            <i class="fas fa-fire"></i> Sold: {{ $product->SoldCount ?? 0 }}
                                        </div>
                                    </div>
                                    <div class="product-actions">
                                        <button class="btn btn-primary add-to-cart w-100" data-product-id="{{ $product->Id }}">
                                            <i class="fas fa-shopping-cart"></i> Add to Cart
                                        </button>
                                        <button class="btn btn-outline-primary quick-view w-100 mt-2" data-product-id="{{ $product->Id }}">
                                            <i class="fas fa-eye"></i> Quick View
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-12">
                            {{ $products->withQueryString()->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Section -->
@endsection

@push('styles')
<style>
    .product-item {
        text-decoration: none;
        border-radius: 8px;
        overflow: hidden;
        background: #fff;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        transition: all 0.3s;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .product-link {
        text-decoration: none;
        color: inherit;
    }

    .product-image {
        position: relative;
        padding-top: 100%;
        overflow: hidden;
    }

    .product-thumbnail {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .product-item:hover .product-thumbnail {
        transform: scale(1.05);
    }

    .product-discount {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ff4444;
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.9rem;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .discount-label {
        font-size: 1.1rem;
        font-weight: 700;
    }

    .discount-save {
        font-size: 0.8rem;
        opacity: 0.9;
    }

    .product-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 600;
        font-size: 0.8rem;
    }

    .product-badge.new {
        background: #4CAF50;
        color: #fff;
    }

    .product-badge.hot {
        background: #ff9800;
        color: #fff;
    }

    .product-info {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-title {
        font-size: 1rem;
        margin-bottom: 1rem;
        color: #333;
        height: 2.4em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-title a {
        color: inherit;
        text-decoration: none;
    }

    .product-title a:hover {
        color: #3B5D50;
    }

    .product-price {
        margin-bottom: 1rem;
    }

    .original-price {
        color: #999;
        text-decoration: line-through;
        font-size: 0.9rem;
        margin-right: 0.5rem;
    }

    .current-price {
        color: #ff4444;
        font-size: 1.1rem;
    }

    .product-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.9rem;
        color: #666;
        margin-top: auto;
    }

    .rating .fa-star {
        color: #ddd;
        font-size: 0.9rem;
    }

    .rating .fa-star.active {
        color: #ffc107;
    }

    .sold-count {
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .sold-count i {
        color: #ff4444;
    }

    .product-actions {
        margin-top: 1rem;
    }

    .filter-sidebar {
        background: #fff;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .brand-icon {
        width: 20px;
        height: 20px;
        object-fit: contain;
    }

    .brand-list {
        max-height: 200px;
        overflow-y: auto;
        padding-right: 10px;
    }

    .brand-list::-webkit-scrollbar {
        width: 4px;
    }

    .brand-list::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .brand-list::-webkit-scrollbar-thumb {
        background: #3B5D50;
        border-radius: 2px;
    }

    .form-range::-webkit-slider-thumb {
        background: #3B5D50;
    }

    .form-check-input:checked {
        background-color: #3B5D50;
        border-color: #3B5D50;
    }

    .input-group-text {
        background-color: #3B5D50;
        color: #fff;
        border: none;
    }

    .apply-filter, .clear-filter {
        transition: all 0.3s;
    }

    .apply-filter:hover {
        background-color: #2d4a3e;
    }

    .clear-filter:hover {
        background-color: #dc3545;
        border-color: #dc3545;
        color: #fff;
    }

    @media (max-width: 768px) {
        .product-item {
            margin-bottom: 1rem;
        }
        
        .filter-sidebar {
            margin-bottom: 2rem;
        }
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/js/shop.js') }}"></script>
@endpush

