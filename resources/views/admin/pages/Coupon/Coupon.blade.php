@extends('admin.layouts.masterad')
@section('title', 'Phiếu Giảm Giá')
@section('content')

<div class="content" id="content">
    <h1>Phiếu Giảm Giá</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã CODE</th>
                    <th>Giá Trị Giảm</th>
                    <th>Ngày Hết Hạn</th>
                    <th>Ngày Tạo</th>
                    <th>Ngày Cập Nhật</th>
                    <td>Thao Tác</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2ET456DD</td>
                    <td>30%</td>
                    <td>24/03/2025</td>
                    <td>24/03/2025</td>
                    <td>24/03/2025</td>
                    <td>
                        <a href="{{ route('admin.Coupon.Edit') }}"><button class="edit-btn">Sửa</button></a>
                        <a href=""><button class="delete-btn">Xóa</button></a>
                        <a href="{{ route('admin.Coupon.Detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
