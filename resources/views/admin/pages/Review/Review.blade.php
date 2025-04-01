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
                    <th>ID Người Dùng</th>
                    <th>Sản Phẩm Review</th>
                    <th>Đánh Giá</th>
                    <th>Bình Luận</th>
                    <th>Ngày Đánh Giá</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>12</td>
                    <td>3</td>
                    <td>5 Sao</td>
                    <td>Gía khá Cao so với chất lượng , yêu cầu được giảm giá hoặc có chính sách đổi trả hoàn tiền </td>
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
@endsection
