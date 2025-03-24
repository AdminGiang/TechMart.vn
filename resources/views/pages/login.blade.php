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
            <form action="{{ route('login') }}" method="POST" class="login-form" autocomplete="off" id="loginForm">
                @csrf
                <div class="input-box">
                    <input type="email" class="input-field" name="email" value="{{ session('registered_email', '') }}" required>
                    <label for="email" class="label">Email</label>
                    <i class='bx bx-envelope icon'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" name="password" required>
                    <label for="password" class="label">Mật Khẩu</label>
                    <i class='bx bx-lock-alt icon'></i>
                </div>
                <!-- Thêm checkbox Remember Me -->
                <label>
                    <input type="checkbox" name="remember"> Nhớ đăng nhập
                </label>
                <div class="form-cols">
                    <div class="col-2">
                        <a href="#">Quên Mật Khẩu?</a>
                    </div>
                </div>
                <div class="input-box">
                    <button class="btn-submit" id="submit">Đăng Nhập<i class='bx bx-log-in'></i></button>
                </div>
                <div class="switch-form">
                    <span>Bạn chưa có tài khoản ? <a href="{{ route('register') }}">Đăng Ký</a></span>
                </div>
            </form>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content; // Lấy ra token 
        document.querySelector('form').addEventListener('submit', function(e) { // Bắt sự kiện submit form
            let input = document.createElement('input');
            input.type = 'hidden';
            input.name = '_token';
            input.value = csrfToken;
            this.appendChild(input);
        });
    });
</script>
@endsection
