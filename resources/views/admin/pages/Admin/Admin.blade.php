@extends('admin.layouts.masterad')
@section('title', 'Danh Mục')
@section('content')

<div class="content" id="content">
    <h1>Danh Mục Sản Phẩm</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Người Dùng</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2</td>
                    <td>24/03/2025</td>
                    <td>24/03/2025</td>
                    <td>
                        <a href="{{ route('admin.Product.edit') }}"><button class="edit-btn">Sửa</button></a>
                        <a href="{{ route('admin.Product.edit') }}"><button class="delete-btn">Xóa</button></a>
                        <a href="{{ route('admin.Product.edit') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
