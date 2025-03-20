{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
		<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{asset('assets/css/tiny-slider.css')}}" rel="stylesheet">
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/stylelg.css') }}">
    <title>Login</title>
</head>

<body> --}}

    {{-- @include('layouts.header')  --}}

    @extends('layouts.master')

@section('title', 'login')
@section('content')	

    <div class="">
        <div class="tocenter">
            <div class="wrapperlogin">
                <div class="form-header">
                    <div class="titles">
                        <div class="title-login">Login</div>
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
                        <label for="log-pass" class="label">Password</label>
                        <i class='bx bx-lock-alt icon'></i>
                    </div>
                    <div class="form-cols">
                        <div class="col-2">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>
                    <div class="input-box">
                        <button class="btn-submit" id="SignInBtn">Sign In <i class='bx bx-log-in'></i></button>
                    </div>
                    <div class="switch-form">
                        <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
    {{-- @include('layouts.footer')  --}}
    {{-- <script src="{{ asset('assets/js/jslogin.js') }}"></script>
</body>

</html> --}}
