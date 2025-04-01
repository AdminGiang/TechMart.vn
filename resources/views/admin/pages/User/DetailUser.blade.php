@extends('admin.layouts.masterad')
@section('title', 'Chi Tiết Người Dùng')
@section('content')

    <div class="content" id="content">
        <h1>Chi Tiết Người Dùng</h1>

        <div class="product-detail-container">

            <div class="product-info">
                <h2>ID : 1</h2>
                <h2>Tên Nhân Viên : Nguyễn Thành Sứ</h2>
                <h2>Quyền Hạn : Admin </h2>
                <h2>Email : Sunguyen@gmail.com</h2>
                <h2>Mật Khẩu : asd1234556</h2>
                <h2>Số Điện Thoại : 012857454 </h2>
                <h2>Địa Chỉ : 22 Mia anh Đào Đà lạt</h2>
                <h2>Quyền : Admin</h2>
                <p class="quantity">Ngày Vào Làm :  21/12/2121 </p>
                <p class="status">
                    Trạng thái : Hiển Thị
                    <span class="">

                    </span>
                </p>
                <!-- Nút hành động -->
                <div class="action-buttons">
                    <a href="" class="btn btn-edit">Hành Vi</a>
                    <a href="{{ route('admin.User') }}" class="btn btn-back">Quay lại danh sách</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
