@extends('layouts.master')
@section('title', 'Thanh Toán')

@section('content')
<div class="checkout-container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="checkout-header">
        <h1>Thanh Toán</h1>
        <div class="checkout-steps">
            <div class="step active">
                <span class="step-number">1</span>
                <span class="step-text">Giỏ Hàng</span>
            </div>
            <div class="step active">
                <span class="step-number">2</span>
                <span class="step-text">Thanh Toán</span>
            </div>
            <div class="step">
                <span class="step-number">3</span>
                <span class="step-text">Hoàn Tất</span>
            </div>
        </div>
    </div>

    <div class="checkout-content">
        <!-- Form Thanh Toán -->
        <div class="checkout-main">
            <h2>Thông Tin Thanh Toán</h2>
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="last_name">Họ</label>
                        <input type="text" id="last_name" name="last_name" value="{{ $lastName }}" required
                            class="form-control @error('last_name') is-invalid @enderror">
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="first_name">Tên</label>
                        <input type="text" id="first_name" name="first_name" value="{{ $firstName }}" required
                            class="form-control @error('first_name') is-invalid @enderror">
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}" required
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Số điện thoại</label>
                    <input type="tel" id="phone" name="phone" value="{{ $user->phone }}" required
                        class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Địa chỉ</label>
                    <input type="text" id="address" name="address" value="{{ $user->address }}" required
                        class="form-control @error('address') is-invalid @enderror">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">Thành phố</label>
                    <select id="city" name="city" required class="form-control @error('city') is-invalid @enderror">
                        <option value="">Chọn thành phố</option>
                        <option value="hanoi">Hà Nội</option>
                        <option value="hcm">TP. Hồ Chí Minh</option>
                        <option value="danang">Đà Nẵng</option>
                    </select>
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="order_notes">Ghi chú đơn hàng</label>
                    <textarea id="order_notes" name="order_notes" rows="3" 
                        class="form-control @error('order_notes') is-invalid @enderror"></textarea>
                    @error('order_notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="payment-methods">
                    <h2>Phương thức thanh toán</h2>
                    <div class="payment-options">
                        <div class="payment-option">
                            <input type="radio" name="payment_method" id="vnpay" value="vnpay" required
                                class="@error('payment_method') is-invalid @enderror">
                            <label for="vnpay">
                                <img src="/images/vnpay-logo.png" alt="VNPay">
                                <span>VNPay</span>
                            </label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="payment_method" id="momo" value="momo"
                                class="@error('payment_method') is-invalid @enderror">
                            <label for="momo">
                                <img src="/images/momo-logo.png" alt="Momo">
                                <span>Momo</span>
                            </label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="payment_method" id="paypal" value="paypal"
                                class="@error('payment_method') is-invalid @enderror">
                            <label for="paypal">
                                <img src="/images/paypal-logo.png" alt="PayPal">
                                <span>PayPal</span>
                            </label>
                        </div>
                    </div>
                    @error('payment_method')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-place-order">
                    Đặt Hàng
                </button>
            </form>
        </div>

        <!-- Tổng Quan Đơn Hàng -->
        <div class="checkout-sidebar">
            <div class="order-summary">
                <h2>Tổng Quan Đơn Hàng</h2>
                <div class="cart-items">
                    @foreach($cart as $id => $item)
                    <div class="cart-item">
                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}">
                        <div class="item-details">
                            <h4>{{ $item['name'] }}</h4>
                            <p>Số lượng: {{ $item['quantity'] }}</p>
                        </div>
                        <div class="item-price">{{ number_format($item['price'] * $item['quantity']) }}đ</div>
                    </div>
                    @endforeach
                </div>

                <div class="order-totals">
                    <div class="total-row">
                        <span>Tạm tính</span>
                        <span>{{ number_format($totalPrice) }}đ</span>
                    </div>
                    <div class="total-row">
                        <span>Phí vận chuyển</span>
                        <span>{{ number_format($shipping) }}đ</span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Tổng cộng</span>
                        <span>{{ number_format($total) }}đ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/checkout.css') }}">
@endpush