@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')

    <div class="content" id="content">
        <h1>Chi Tiết Thương Hiệu</h1>

        <div class="product-detail-container">
            <!-- Hình ảnh sản phẩm -->
            <div class="product-image">
                <img src="" alt="">
            </div>

            <div class="product-info">
                <h2>ID</h2>
                <p class="price">Giá: </p>
                <p class="category">Tên Thương Hiệu:  Apple</p>
                <p class="quantity">Ngày Tạo :  21/12/2121 </p>
                <p class="quantity">Ngày Cập Nhật : 12/21/1212 </p>
                <p class="status">
                    Trạng thái:
                    <span class="">

                    </span>
                </p>
                <p class="description"></p>

                <!-- Nút hành động -->
                <div class="action-buttons">
                    <a href="{{ route('admin.Brand.Edit') }}" class="btn btn-edit">Chỉnh Sửa Thương Hiệu</a>
                    <a href="{{ route('admin.Brand') }}" class="btn btn-back">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
