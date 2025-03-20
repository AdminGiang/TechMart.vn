@extends('layouts.master')
@section('title', 'Sản phẩm')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Công nghệ<br> <span clsas="d-block"> hôm nay!!!</span></h1>
                    <p class="mb-4">Khám phá bộ sưu tập sản phẩm công nghệ mới nhất với thiết kế hiện đại,
                         hiệu suất mạnh mẽ và tính năng đột phá.<br>
                          Từ điện thoại thông minh, laptop đến thiết bị thông minh, 
                          chúng tôi mang đến cho bạn những giải pháp công nghệ tối ưu nhất.</p>
                    <p><a href="" class="btn btn-secondary me-2">Mua ngay</a><a href="#" class="btn btn-white-outline">Khám phá</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="{{asset('assets/images/couch.png')}}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
          <div class="row">
            <!-- Start Column 1 -->
            <x-product-item/>
            <!-- End Column 1 -->
          </div>
    </div>
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
        <div class="d-flex mb-2">
            <div class="flex-shrink-0">
                <img src="{{asset('assets/images/person_3.jpg')}}" alt="User" class="rounded-circle" width="40" height="40">
            </div>
            <div class="flex-grow-1 ms-3">
                <h6 class="mb-0">Jane Smith</h6>
                <small class="text-muted">5 ngày trước</small>
                <p class="mt-2">Chất lượng tốt nhưng giá hơi cao.</p>
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