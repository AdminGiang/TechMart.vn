{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/stylelg.css') }}"> 
    <title>Register</title>
</head>

<body>
    include('layouts.header') --}}

@extends('layouts.master')

@section('title', 'login')
@section('content')
    <div class="tocenter">
        <div class="wrapperregister">
            <div class="form-header">
                <div class="titles">
                    <div class="title-register">Register</div>
                </div>
            </div>
            <!-- REGISTER FORM -->
            <form action="#" class="register-form" autocomplete="off">
                <div class="input-box">
                    <input type="text" class="input-field" id="reg-name" required>
                    <label for="reg-name" class="label">Username</label>
                    <i class='bx bx-user icon'></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" id="reg-email" required>
                    <label for="reg-email" class="label">Email</label>
                    <i class='bx bx-envelope icon'></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" id="reg-pass" required>
                    <label for="reg-pass" class="label">Password</label>
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
                    <button class="btn-submit" id="SignUpBtn">Sign Up <i class='bx bx-user-plus'></i></button>
                </div>
                <div class="switch-form">
                    <span>Already have an account? <a href="{{ route('login') }}">Login</a></span>
                </div>
            </form>
        </div>
    </div>

@endsection
{{-- 
    @include('layouts.footer')
    <script src=""></script>
</body>

</html> --}}
