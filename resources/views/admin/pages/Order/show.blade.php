@extends('admin.layouts.masterad')
@section('title', 'Chi Tiết Đơn Hàng')
@section('content')

<div class="content" id="content">
    <h1 class="page-title">Chi Tiết Đơn Hàng #{{ $order->id }}</h1>

    <div class="order-details">
        <h2>Thông Tin Khách Hàng</h2>
        <table class="details-table">
            <tr>
                <th>Khách hàng:</th>
                <td>{{ $order->user->name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $order->user->email }}</td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td>{{ $order->user->phone }}</td>
            </tr>
            <tr>
                <th>Địa chỉ:</th>
                <td>{{ $order->shipping_address }}, {{ $order->shipping_city }}</td>
            </tr>
            <tr>
                <th>Phương thức thanh toán:</th>
                <td>{{ ucfirst($order->payment_method) }}</td>
            </tr>
            <tr>
                <th>Trạng thái:</th>
                <td>
                    @if ($order->status == 'pending')
                        <span class="badge badge-warning">Chờ Xử Lý</span>
                    @elseif ($order->status == 'completed')
                        <span class="badge badge-success">Hoàn Thành</span>
                    @else
                        <span class="badge badge-danger">Đã Hủy</span>
                    @endif
                </td>
            </tr>
        </table>
    </div>

    <div class="order-items">
        <h2>Sản Phẩm Trong Đơn Hàng</h2>
        <table class="product-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                    <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} VND</td>
                </tr>
                @endforeach
            </tbody>
            <button>In hóa đơn</button>
        </table>
    </div>
</div>

@endsection
