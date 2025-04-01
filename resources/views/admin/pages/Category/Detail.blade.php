@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')

    <div class="content" id="content">
        <h1>Chi Tiết Danh Mục</h1>

        <div class="product-detail-container">

            <div class="product-info">
                <h2>ID - 1</h2>
                <h2>SmảtPhone</h2>
                <p class="quantity">Ngày Tạo :  21/12/2121 </p>
                <p class="quantity">Ngày Cập Nhật : 12/21/1212 </p>
                <p class="status">
                    Trạng thái:
                    <span class="">

                    </span>
                </p>
                <p class="description"> Mô tả :  ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdiádfddđâsdhjọadoiạdoiạdiọadio</p>

                <!-- Nút hành động -->
                <div class="action-buttons">
                    <a href="{{ route('admin.Category.Edit') }}" class="btn btn-edit">Chỉnh sửa Danh Mục</a>
                    <a href="{{ route('admin.Category') }}" class="btn btn-back">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
