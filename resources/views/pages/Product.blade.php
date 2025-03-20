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
    </div>
</div>

@endsection