@extends('layouts.master')
@section('title', 'Sản phẩm')
@section('content')

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

<!-- Start Column 2 -->
<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">
            @foreach($products as $product)
              <!-- Start Column 1 -->
            <div class="col-12 col-md-4 col-lg-3 mb-5">
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
          {{-- {{ $product->links() }} --}}
          {{ $products->links('pagination::bootstrap-4') }}
    </div>

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
</div>

@endsection