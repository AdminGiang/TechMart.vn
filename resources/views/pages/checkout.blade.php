@extends('layouts.master')
@section('title', 'Thanh Toán')
@section('content')
<div class="checkout-container">
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
        <div class="checkout-main">
            <form action="{{ route('checkout.process') }}" method="POST">
                @csrf
                <h2>Thông Tin Thanh Toán</h2>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="first_name">Họ</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="last_name">Tên</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">Tỉnh/Thành Phố</label>
                    <select class="form-control @error('city') is-invalid @enderror" id="city" name="city" required>
                        <option value="">Chọn tỉnh/thành phố</option>
                        <option value="hanoi" {{ old('city') == 'hanoi' ? 'selected' : '' }}>Hà Nội</option>
                        <option value="hcm" {{ old('city') == 'hcm' ? 'selected' : '' }}>TP. Hồ Chí Minh</option>
                        <option value="danang" {{ old('city') == 'danang' ? 'selected' : '' }}>Đà Nẵng</option>
                    </select>
                    @error('city')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="order_notes">Ghi Chú Đơn Hàng</label>
                    <textarea class="form-control" id="order_notes" name="order_notes" rows="3" placeholder="Ghi chú về đơn hàng của bạn (không bắt buộc)">{{ old('order_notes') }}</textarea>
                </div>

                <div class="payment-methods">
                    <h2>Phương Thức Thanh Toán</h2>
                    <div class="payment-options">
                        <div class="payment-option">
                            <input type="radio" name="payment_method" id="vnpay" value="vnpay" {{ old('payment_method') == 'vnpay' ? 'checked' : '' }} required>
                            <label for="vnpay">
                                <img src="/images/vnpay-logo.png" alt="VNPay">
                                <span>VNPay</span>
                            </label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="payment_method" id="momo" value="momo" {{ old('payment_method') == 'momo' ? 'checked' : '' }}>
                            <label for="momo">
                                <img src="/images/momo-logo.png" alt="Momo">
                                <span>Momo</span>
                            </label>
                        </div>
                        <div class="payment-option">
                            <input type="radio" name="payment_method" id="paypal" value="paypal" {{ old('payment_method') == 'paypal' ? 'checked' : '' }}>
                            <label for="paypal">
                                <img src="/images/paypal-logo.png" alt="PayPal">
                                <span>PayPal</span>
                            </label>
                        </div>
                    </div>
                    @error('payment_method')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-place-order">Đặt Hàng</button>
            </form>
        </div>

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
                        <div class="item-price">{{ number_format($item['price'] * $item['quantity']) }} VND</div>
                    </div>
                    @endforeach
                </div>

                <div class="order-totals">
                    <div class="total-row">
                        <span>Tạm Tính</span>
                        <span>{{ number_format($totalPrice) }} VND</span>
                    </div>
                    <div class="total-row">
                        <span>Phí Vận Chuyển</span>
                        <span>{{ number_format($shipping) }} VND</span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Tổng Cộng</span>
                        <span>{{ number_format($total) }} VND</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}">
@endpush