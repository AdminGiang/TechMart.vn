@extends('layouts.master')
@section('title', 'Sản phẩm')
@section('content')

<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Mới nhất <span clsas="d-block">Hôm nay!!!</span></h1>
                    <p class="mb-4">Mô tả trang sản phẩm</p>
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



@endsection