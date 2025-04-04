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
                        {{-- <option value="">Chọn thành phố</option>
                        <option value="hanoi">Hà Nội</option>
                        <option value="hcm">TP. Hồ Chí Minh</option>
                        <option value="danang">Đà Nẵng</option> --}}
                        <option value="">Chọn tỉnh/thành phố</option>
                        <option value="hanoi">Hà Nội</option>
                        <option value="hagiang">Hà Giang</option>
                        <option value="caobang">Cao Bằng</option>
                        <option value="backan">Bắc Kạn</option>
                        <option value="tuyenquang">Tuyên Quang</option>
                        <option value="laocai">Lào Cai</option>
                        <option value="dienbien">Điện Biên</option>
                        <option value="laichau">Lai Châu</option>
                        <option value="sonla">Sơn La</option>
                        <option value="yenbai">Yên Bái</option>
                        <option value="hoabinh">Hòa Bình</option>
                        <option value="thainguyen">Thái Nguyên</option>
                        <option value="langson">Lạng Sơn</option>
                        <option value="quangninh">Quảng Ninh</option>
                        <option value="bacgiang">Bắc Giang</option>
                        <option value="phutho">Phú Thọ</option>
                        <option value="vinhphuc">Vĩnh Phúc</option>
                        <option value="bacninh">Bắc Ninh</option>
                        <option value="haiduong">Hải Dương</option>
                        <option value="haiphong">Hải Phòng</option>
                        <option value="hungyen">Hưng Yên</option>
                        <option value="thaibinh">Thái Bình</option>
                        <option value="hanam">Hà Nam</option>
                        <option value="namdinh">Nam Định</option>
                        <option value="ninhbinh">Ninh Bình</option>
                        <option value="thanhhoa">Thanh Hóa</option>
                        <option value="nghean">Nghệ An</option>
                        <option value="hatinh">Hà Tĩnh</option>
                        <option value="quangbinh">Quảng Bình</option>
                        <option value="quangtri">Quảng Trị</option>
                        <option value="thuathien-hue">Thừa Thiên Huế</option>
                        <option value="danang">Đà Nẵng</option>
                        <option value="quangnam">Quảng Nam</option>
                        <option value="quangngai">Quảng Ngãi</option>
                        <option value="binhdinh">Bình Định</option>
                        <option value="phuyen">Phú Yên</option>
                        <option value="khanhhoa">Khánh Hòa</option>
                        <option value="ninhthuan">Ninh Thuận</option>
                        <option value="binhthuan">Bình Thuận</option>
                        <option value="kontum">Kon Tum</option>
                        <option value="gialai">Gia Lai</option>
                        <option value="daklak">Đắk Lắk</option>
                        <option value="daknong">Đắk Nông</option>
                        <option value="lamdong">Lâm Đồng</option>
                        <option value="binhphuoc">Bình Phước</option>
                        <option value="tayninh">Tây Ninh</option>
                        <option value="binhduong">Bình Dương</option>
                        <option value="dongnai">Đồng Nai</option>
                        <option value="bariavungtau">Bà Rịa - Vũng Tàu</option>
                        <option value="hochiminh">TP. Hồ Chí Minh</option>
                        <option value="longan">Long An</option>
                        <option value="tiengiang">Tiền Giang</option>
                        <option value="bentre">Bến Tre</option>
                        <option value="travinh">Trà Vinh</option>
                        <option value="vinhlong">Vĩnh Long</option>
                        <option value="dongthap">Đồng Tháp</option>
                        <option value="angiang">An Giang</option>
                        <option value="kiengiang">Kiên Giang</option>
                        <option value="cantho">Cần Thơ</option>
                        <option value="haugiang">Hậu Giang</option>
                        <option value="soctrang">Sóc Trăng</option>
                        <option value="baclieu">Bạc Liêu</option>
                        <option value="camau">Cà Mau</option>
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