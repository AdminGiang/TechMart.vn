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
            <div class="checkout-form">
                <h2>Thông Tin Thanh Toán</h2>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first-name">Họ</label>
                            <input type="text" class="form-control" id="first-name" placeholder="Nhập họ của bạn">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last-name">Tên</label>
                            <input type="text" class="form-control" id="last-name" placeholder="Nhập tên của bạn">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@email.com">
                    </div>

                    <div class="form-group">
                        <label for="phone">Số Điện Thoại</label>
                        <input type="tel" class="form-control" id="phone" placeholder="+84 123 456 789">
                    </div>

                    <div class="form-group">
                        <label for="address">Địa Chỉ</label>
                        <input type="text" class="form-control" id="address" placeholder="Số nhà, tên đường">
                    </div>

                    <div class="form-group">
                        <label for="city">Tỉnh/Thành Phố</label>
                        <select class="form-control" id="city">
                            <option value="">Chọn tỉnh/thành phố</option>
                            <option value="hanoi">Hà Nội</option>
                            <option value="hcm">TP. Hồ Chí Minh</option>
                            <option value="danang">Đà Nẵng</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="order-notes">Ghi Chú Đơn Hàng</label>
                        <textarea class="form-control" id="order-notes" rows="3" placeholder="Ghi chú về đơn hàng của bạn (không bắt buộc)"></textarea>
                    </div>
                </form>
            </div>

            <div class="payment-methods">
                <h2>Phương Thức Thanh Toán</h2>
                <div class="payment-options">
                    <div class="payment-option">
                        <input type="radio" name="paymentMethod" id="vnpay" value="vnpay">
                        <label for="vnpay">
                            <img src="/images/vnpay-logo.png" alt="VNPay">
                            <span>VNPay</span>
                        </label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" name="paymentMethod" id="momo" value="momo">
                        <label for="momo">
                            <img src="/images/momo-logo.png" alt="Momo">
                            <span>Momo</span>
                        </label>
                    </div>
                    <div class="payment-option">
                        <input type="radio" name="paymentMethod" id="paypal" value="paypal">
                        <label for="paypal">
                            <img src="/images/paypal-logo.png" alt="PayPal">
                            <span>PayPal</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout-sidebar">
            <div class="order-summary">
                <h2>Tổng Quan Đơn Hàng</h2>
                <div class="cart-items">
                    <div class="cart-item">
                        <img src="/images/product1.jpg" alt="Áo Thun">
                        <div class="item-details">
                            <h4>Áo Thun</h4>
                            <p>Số lượng: 1</p>
                        </div>
                        <div class="item-price">$250.00</div>
                    </div>
                    <div class="cart-item">
                        <img src="/images/product2.jpg" alt="Áo Polo">
                        <div class="item-details">
                            <h4>Áo Polo</h4>
                            <p>Số lượng: 1</p>
                        </div>
                        <div class="item-price">$100.00</div>
                    </div>
                </div>

                <div class="coupon-section">
                    <h3>Mã Giảm Giá</h3>
                    <div class="coupon-input">
                        <input type="text" placeholder="Nhập mã giảm giá">
                        <button type="button" class="btn-apply">Áp Dụng</button>
                    </div>
                </div>

                <div class="order-totals">
                    <div class="total-row">
                        <span>Tạm Tính</span>
                        <span>$350.00</span>
                    </div>
                    <div class="total-row">
                        <span>Phí Vận Chuyển</span>
                        <span>Miễn Phí</span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Tổng Cộng</span>
                        <span>$350.00</span>
                    </div>
                </div>

                <button type="submit" class="btn-place-order">Đặt Hàng</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('assets/css/checkout.css')}}">
@endpush