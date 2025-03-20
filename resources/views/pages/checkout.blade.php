@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Thanh Toán</h1>
    <div class="row">
        <div class="col-md-8">
            <h2>Chi Tiết Thanh Toán</h2>
            <form>
                <div class="form-group">
                    <label for="first-name">Tên</label>
                    <input type="text" class="form-control" id="first-name">
                </div>
                <div class="form-group">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="email">Địa Chỉ Email</label>
                    <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="phone">Số Điện Thoại</label>
                    <input type="text" class="form-control" id="phone">
                </div>
                <div class="form-group">
                    <label for="order-notes">Ghi Chú Đơn Hàng</label>
                    <textarea class="form-control" id="order-notes"></textarea>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <h2>Mã Giảm Giá</h2>
            <form>
                <div class="form-group">
                    <label for="coupon-code">Nhập mã giảm giá nếu bạn có</label>
                    <input type="text" class="form-control" id="coupon-code">
                </div><br>
                <button type="submit" class="btn btn-primary">Áp Dụng</button>
            </form>
            <h2>Đơn Hàng Của Bạn</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Tổng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Áo Thun x 1</td>
                        <td>$250.00</td>
                    </tr>
                    <tr>
                        <td>Áo Polo x 1</td>
                        <td>$100.00</td>
                    </tr>
                    <tr>
                        <td>Tổng Giỏ Hàng</td>
                        <td>$350.00</td>
                    </tr>
                    <tr>
                        <td>Tổng Đơn Hàng</td>
                        <td>$350.00</td>
                    </tr>
                </tbody>
            </table>
            <h2>Phương Thức Thanh Toán</h2>
            <form>
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="direct-bank-transfer" value="direct-bank-transfer">
                        <label class="form-check-label" for="direct-bank-transfer">
                            <i class="fas fa-university"></i> VNPay
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="cheque-payment" value="cheque-payment">
                        <label class="form-check-label" for="cheque-payment">
                            <i class="fas fa-money-check"></i> Momo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="paymentMethod" id="paypal" value="paypal">
                        <label class="form-check-label" for="paypal">
                            <i class="fab fa-paypal"></i> PayPal
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Đặt Hàng</button>
            </form>
        </div>
    </div>
</div>
@endsection