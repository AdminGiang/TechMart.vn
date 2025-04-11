@extends('layouts.master')
@section('title', 'Đặt Hàng Thành Công')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 64px;"></i>
                    </div>
                    <h2 class="card-title mb-4">Đặt Hàng Thành Công!</h2>
                    <p class="card-text mb-4">Cảm ơn bạn đã mua hàng tại TechMart.vn. Chúng tôi sẽ gửi email xác nhận đơn hàng cho bạn trong thời gian sớm nhất.</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">Tiếp Tục Mua Sắm</a>
                        <a href="{{ route('profile') }}" class="btn btn-outline-primary">Xem Đơn Hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border: none;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    border-radius: 15px;
    padding: 2rem;
}

.card-body {
    padding: 2rem;
}

.btn {
    padding: 0.75rem 2rem;
    font-weight: 500;
}

.text-success {
    color: #28a745 !important;
}
</style>
@endsection 