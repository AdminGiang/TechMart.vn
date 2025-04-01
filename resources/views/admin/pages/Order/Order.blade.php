@extends('admin.layouts.masterad')
@section('title', 'Thương Hiệu')
@section('content')

<div class="content" id="content">
    <h1>Đơn Hàng</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Nguời Dùng</th>
                    <th>ID Vận Chuyển</th>
                    <th>ID Mã Giảm Giá</th>
                    <th>Tổng Giá Trị</th>
                    <th>Thanh Toán</th>
                    <th>Trạng Thái Đơn</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Ngày Cập Nhật</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>12</td>
                    <td>EXPE1202</td>
                    <td>2ET456DD</td>
                    <td>21,000,000</td>
                    <td>Đã Thanh Toán</td>  {{--    Chưa thanh toán  --}}
                    <td>Đã Xử lý </td>  {{--Đang Vận Chuyển - Đang Được Giao - Đã Giao Hàng --}}
                    <td>24/03/2025</td>
                    <td>24/03/2025</td>
                    <td>
                        <a href="{{ route('admin.Order.Detail') }}"><button class="detail-btn">Chi Tiết</button></a>
                        <a href=""><button class="edit-btn">Xuất Hóa Đơn</button></a>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
