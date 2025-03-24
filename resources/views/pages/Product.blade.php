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
                    <img src="{{('assets/images/img-iphone-banner.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->
@endif

<!-- Start Product Section -->
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <!-- Start Filter Sidebar -->
            <div class="col-lg-3">
                <div class="filter-sidebar">
                    <h4 class="mb-4">Bộ lọc sản phẩm</h4>
                    
                    <!-- Danh mục -->
                    <div class="filter-section mb-4">
                        <h5>Danh mục</h5>
                        @foreach($categories as $category)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category" value="{{ $category->id }}" id="category{{ $category->id }}">
                            <label class="form-check-label" for="category{{ $category->id }}">{{ $category->name }}</label>
                        </div>
                        @endforeach
                    </div>

                    <!-- Hãng sản xuất -->
                    <div class="filter-section mb-4">
                        <h5>Hãng sản xuất</h5>
                        @foreach($brands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="brand" value="{{ $brand }}" id="brand{{ $loop->index }}">
                            <label class="form-check-label" for="brand{{ $loop->index }}">{{ $brand }}</label>
                        </div>
                        @endforeach
                    </div>

                    <!-- Khoảng giá -->
                    <div class="filter-section mb-4">
                        <h5>Khoảng giá</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="price" value="0-10000000" id="price1">
                            <label class="form-check-label" for="price1">Dưới 10 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="price" value="10000000-20000000" id="price2">
                            <label class="form-check-label" for="price2">10 - 20 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="price" value="20000000-30000000" id="price3">
                            <label class="form-check-label" for="price3">20 - 30 triệu</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="price" value="30000000-999999999" id="price4">
                            <label class="form-check-label" for="price4">Trên 30 triệu</label>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100" id="applyFilter">Áp dụng bộ lọc</button>
                </div>
            </div>
            <!-- End Filter Sidebar -->

            <!-- Start Product Grid -->
            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $product)
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
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
            <!-- End Product Grid -->
        </div>
    </div>
</div>
<!-- End Product Section -->

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