@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')

<div class="content" id="content">
    <h1>Thương Hiệu Sản Phẩm</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Đơn Hàng</th>
                    <th>ID Sản Phẩm</th>
                    <th>Số Lượng</th>
                    <th>Tổng Giá Trị</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>12</td>
                    <td>31</td>
                    <td>1</td>
                    <td>21,000,000</td>
                    <td>24/03/2025</td>
                    <td>24/03/2025</td>
                    <td>
                        <a href=""><button class="edit-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        <a href=""><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
