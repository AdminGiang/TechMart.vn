@extends('layouts.master')

@section('title', 'Đăng Nhập')
{{-- @php
    $isLoginPage = true;
@endphp --}}

@section('content')
    <div class="tocenter">
        <div class="wrapperlogin">
            <div class="form-header">
                <div class="titles">
                    <div class="title-login">Đăng Nhập</div>
                </div>
            </div>
            <!-- LOGIN FORM -->
            <form action="#" class="login-form" autocomplete="off">
                <div class="input-box">
                    <input type="text" class="input-field" id="log-email" required>
                    <label for="log-email" class="label">Email</label>
                    <i class='bx bx-envelope icon'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" id="log-pass" required>
                    <label for="log-pass" class="label">Mật Khẩu</label>
                    <i class='bx bx-lock-alt icon'></i>
                </div>
                <div class="form-cols">
                    <div class="col-2">
                        <a href="#">Quên Mật Khẩu?</a>
                    </div>
                </div>
                <div class="input-box">
                    <button class="btn-submit" id="SignInBtn">Đăng Nhập<i class='bx bx-log-in'></i></button>
                </div>
                <div class="switch-form">
                    <span>Bạn chưa có tài khoản ? <a href="{{ route('register') }}">Đăng Ký</a></span>
                </div>
            </form>
        </div>
    </div>
@endsection
