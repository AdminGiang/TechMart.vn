@extends('admin.layouts.masterad')
@section('title', 'Sản Phẩm')
@section('content')

<div class="content" id="content">
    <h1>Danh sách sản phẩm</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Danh mục</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Iphone16 Pro Max Giá rị hiện tại</td>
                    <td><img src="{{ asset('assets/images/img-iphone-banner.png') }}" alt="Sản phẩm"></td>
                    <td>SmartPhone</td>
                    <td>28,000000₫</td>
                    <td>15</td>
                    <td>24/03/2025</td>
                    <td>Hiển thị</td>
                    <td>
                        <button class="edit-btn">Sửa</button>
                        <button class="delete-btn">Xóa</button>
                        <button class="detail-btn">Chi Tiết</button>
                    </td>
                </tr>
                <!-- Thêm các dòng sản phẩm khác tại đây -->
            </tbody>
        </table>
    </div>
</div>
