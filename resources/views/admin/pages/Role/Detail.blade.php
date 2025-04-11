@extends('admin.layouts.masterad')
@section('title', 'Chi Tiết Role')
@section('content')

    <div class="content" id="content">
        <h1>Chi Tiết Role</h1>

        <div class="product-detail-container">

            <div class="product-info">
                <h2>ID : 1</h2>
                <h2>Tên Role : Admin</h2>
                <h2>Số Lượng : 2</h2>
                <p class="quantity">Ngày Tạo :  21/12/2121 </p>

                <p class="status">
                    Trạng thái : Hiển Thị
                    <span class="">

                    </span>
                </p>
                <p class="description"> Mô tả :  ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdi ádfddđâsdhjọadoiạdoiạdiádfddđâsdhjọadoiạdoiạdiọadio</p>

                <!-- Nút hành động -->
                <div class="action-buttons">
                    <a href="{{ route('admin.Role.Edit') }}" class="btn btn-edit">Chỉnh sửa sản phẩm</a>
                    <a href="{{ route('admin.Role') }}" class="btn btn-back">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
