@extends('admin.layouts.masterad')
@section('title', 'Sản Phẩm')
@section('content')

<div class="content" id="content">
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="{{ route('admin.Product.Add') }}"><button class="addbtn">Thêm Sản Phẩm</button></a>
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
                        <a href="{{ route('admin.Product.Edit') }}"><button class="edit-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        <a href="{{ route('admin.Product.Detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
