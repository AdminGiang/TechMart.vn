@extends('admin.layouts.masterad')
@section('title', 'Dashboard')
@section('content')
    <div class="container">
        <h1>Dashboard Quản Trị</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Người Dùng</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Số Đơn Hàng</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tổng Doanh Thu</h5>
                        <p class="card-text"> VNĐ</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h2>Đơn Hàng Mới Nhất</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Khách Hàng</th>
                        <th>Tổng Tiền</th>
                        <th>Ngày Tạo</th>
                    </tr>
                </thead>
                <tbody>

                        <tr>
                            {{-- <td>{{ $order->id }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ number_format($order->total_amount) }} VNĐ</td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td> --}}
                        </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
@endsection