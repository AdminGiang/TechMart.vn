@extends('admin.layouts.masterad')
@section('title', 'Quản Lý Đơn Hàng')
@section('content')

<div class="content" id="content">
    <h1>Danh Sách Đơn Hàng</h1>
    <div class="table-container">
        <table class="product-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Email</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa Chỉ Giao Hàng</th>
                    <th>Tổng Giá Trị</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Trạng Thái</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->user->phone }}</td>
                        <td>{{ $order->shipping_address }}, {{ $order->shipping_city }}</td>
                        <td>{{ number_format($order->total_price, 0, ',', '.') }} VND</td>
                        <td>{{ ucfirst($order->payment_method) }}</td>
                        <td>
                            @if ($order->status == 'pending')
                                <span class="badge badge-warning">Chờ Xử Lý</span>
                            @elseif ($order->status == 'completed')
                                <span class="badge badge-success">Hoàn Thành</span>
                            @else
                                <span class="badge badge-danger">Đã Hủy</span>
                            @endif
                        </td>
                        <td>{{ $order->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.order.show', $order->id) }}"><button class="detail-btn">Chi Tiết</button></a>
                            <a href=""><button class="edit-btn">Sửa</button></a>
                            <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn hàng này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
