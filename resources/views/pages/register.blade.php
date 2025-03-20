@extends('layouts.master')
@section('title', 'Đăng ký')
@section('content')
<div class="daylaregister">
    <div class="tocenter">
        <div class="wrapperregister">
            <div class="form-header">
                <div class="titles">
                    <div class="title-register">Đăng ký</div>
                </div>
            </div>
            <!-- REGISTER FORM -->
            <form action="#" class="register-form" autocomplete="off">
                <div class="input-box">
                    <input type="text" class="input-field" id="reg-name" required>
                    <label for="reg-name" class="label">Tên đăng nhập</label>
                    <i class='bx bx-user icon'></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" id="reg-email" required>
                    <label for="reg-email" class="label">Email</label>
                    <i class='bx bx-envelope icon'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" id="reg-pass" required>
                    <label for="reg-pass" class="label">Mật khẩu</label>
                    <i class='bx bx-lock-alt icon'></i>
                </div>
                <div class="form-cols">
                    <div class="col-1">
                        <input type="checkbox" id="agree">
                        <label for="agree"> I agree to terms & conditions</label>
                    </div>
                    <div class="col-2"></div>
                </div>
                <div class="input-box">
                    <button class="btn-submit" id="SignUpBtn">Đăng ký <i class='bx bx-user-plus'></i></button>
                </div>
                <div class="switch-form">
                    <span>Bạn đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a></span>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
