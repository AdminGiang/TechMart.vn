@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')

    <div class="content" id="content">
        <h1>Chi Tiết Sản Phẩm</h1>

        <div class="product-detail-container">
            <!-- Hình ảnh sản phẩm -->
            <div class="product-image">
                <img src="{{ asset('assets/images/img-iphone-banner.png') }}" alt="">
            </div>

            <div class="product-info">
                <h2>ID</h2>
                <h2>Iphoen 14 Promax Giá trị SIêu Cao</h2>
                <h2>Thương Hiệu : Apple</h2>
                <h2>Danh Mục : SmartPhone</h2>
                <p class="price">Giá : 28,000,000 </p>
                <p class="quantity">Ngày Tạo :  21/12/2121 </p>
                <p class="quantity">Ngày Cập Nhật : 12/21/1212 </p>
                <p class="quantity">Số lượng trong kho : 18</p>
                <p class="status">
                    Trạng thái: Hiển thị
                    <span class="">

                    </span>
                </p>
                <p class="description"> Mô tả :  ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdiádfddđâsdhjọadoiạdoiạdiọadio</p>

                <!-- Nút hành động -->
                <div class="action-buttons">
                    <a href="{{ route('admin.Product.Edit') }}" class="btn btn-edit">Chỉnh sửa sản phẩm</a>
                    <a href="{{ route('admin.Product') }}" class="btn btn-back">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
