@extends('layouts.master')
@section('title', 'Sản phẩm')
@section('content')

@if(request()->get('page') <= 1 || !request()->has('page'))
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Trải nghiệm<br> <span clsas="d-block">Iphone </span></h1>
                    <p class="mb-4">Khám phá bộ sưu tập sản phẩm công nghệ mới nhất với thiết kế hiện đại,
                         hiệu suất mạnh mẽ và tính năng đột phá.<br>
                          Từ điện thoại thông minh, laptop đến thiết bị thông minh, 
                          chúng tôi mang đến cho bạn những giải pháp công nghệ tối ưu nhất.</p>
                    <p><a href="" class="btn btn-secondary me-2">Mua ngay</a><a href="#" class="btn btn-white-outline">Khám phá</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{ asset('assets/images/img-iphone-banner.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
@endif

<!-- Start Filter Section -->
<div class="filter-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="filter-box p-4 rounded" style="background-color: #f8f9fa; border: 1px solid #e9ecef;">
                    <h4 class="mb-4" style="color: #2f2f2f;">Bộ lọc sản phẩm</h4>
                    <form action="{{ route('products.filter') }}" method="GET">
                        <style>
                            .form-check-input:checked {
                                background-color: #3B5D50 !important;
                                border-color: #3B5D50 !important;
                            }
                            .form-check-input:focus {
                                border-color: #3B5D50;
                                box-shadow: 0 0 0 0.25rem rgba(59, 93, 80, 0.25);
                            }
                        </style>
                        <!-- Danh mục -->
                        <div class="mb-4">
                            <h5 class="mb-3" style="color: #2f2f2f;">Danh mục</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="category[]" value="phone" id="phone"
                                    {{ in_array('phone', request()->get('category', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="phone" style="color: #6c757d;">
                                    Điện thoại
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="category[]" value="laptop" id="laptop"
                                    {{ in_array('laptop', request()->get('category', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="laptop" style="color: #6c757d;">
                                    Laptop
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="category[]" value="tablet" id="tablet"
                                    {{ in_array('tablet', request()->get('category', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="tablet" style="color: #6c757d;">
                                    Máy tính bảng
                                </label>
                            </div>
                        </div>

                        <!-- Hãng sản xuất -->
                        <div class="mb-4">
                            <h5 class="mb-3" style="color: #2f2f2f;">Hãng sản xuất</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="brand[]" value="apple" id="apple"
                                    {{ in_array('apple', request()->get('brand', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="apple" style="color: #6c757d;">
                                    Apple
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="brand[]" value="samsung" id="samsung"
                                    {{ in_array('samsung', request()->get('brand', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="samsung" style="color: #6c757d;">
                                    Samsung
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="brand[]" value="xiaomi" id="xiaomi"
                                    {{ in_array('xiaomi', request()->get('brand', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="xiaomi" style="color: #6c757d;">
                                    Xiaomi
                                </label>
                            </div>
                        </div>

                        <!-- Khoảng giá -->
                        <div class="mb-4">
                            <h5 class="mb-3" style="color: #2f2f2f;">Khoảng giá</h5>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price_range" value="0-10000000" id="price1"
                                    {{ request()->get('price_range') == '0-10000000' ? 'checked' : '' }}>
                                <label class="form-check-label" for="price1" style="color: #6c757d;">
                                    Dưới 10 triệu
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price_range" value="10000000-20000000" id="price2"
                                    {{ request()->get('price_range') == '10000000-20000000' ? 'checked' : '' }}>
                                <label class="form-check-label" for="price2" style="color: #6c757d;">
                                    10 - 20 triệu
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price_range" value="20000000-30000000" id="price3"
                                    {{ request()->get('price_range') == '20000000-30000000' ? 'checked' : '' }}>
                                <label class="form-check-label" for="price3" style="color: #6c757d;">
                                    20 - 30 triệu
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="price_range" value="30000000-999999999" id="price4"
                                    {{ request()->get('price_range') == '30000000-999999999' ? 'checked' : '' }}>
                                <label class="form-check-label" for="price4" style="color: #6c757d;">
                                    Trên 30 triệu
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-dark flex-grow-1">Áp dụng</button>
                            <a href="{{ route('product') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                    <!-- Start Column 1 -->
                    <div class="col-12 col-md-4 col-lg-4 mb-5">
                        <a class="product-item" href="#">
                            <img src="{{$product->Image}}" class="img-fluid product-thumbnail">
                            <h3 class="product-title">{{ $product->Name }}</h3>
                            <strong class="product-price">{{ number_format($product->Price) }} VND</strong>
                            <span class="icon-cross">
                                <img src="{{asset('assets/images/cross.svg')}}" class="img-fluid">
                            </span>
                        </a>
                    </div> 
                    <!-- End Column 1 -->
                    @endforeach		
                </div>
                
                {{-- start phan trang --}}
                <div class="d-flex justify-content-center">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
                {{-- End phân trang --}}
            </div>
        </div>
    </div>
</div>
<!-- End Filter Section -->

<!-- Start Comments Section -->
<div class="container mt-5">
    <h2>Bình luận</h2>
    <div class="mb-3">
        <div class="d-flex mb-2">
            <div class="flex-shrink-0">
                <img src="{{asset('assets/images/person_3.jpg')}}" alt="User" class="rounded-circle" width="40" height="40">
            </div>
            <div class="flex-grow-1 ms-3">
                <h6 class="mb-0">John Doe</h6>
                <small class="text-muted">2 ngày trước</small>
                <p class="mt-2">Sản phẩm tuyệt vời! Rất đáng mua.</p>
            </div>
        </div>
    </div>
    <form>
        <div class="mb-3">
            <label for="comment" class="form-label">Để lại bình luận</label>
            <textarea class="form-control" id="comment" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
</div>
<!-- End Comments Section -->

@endsection