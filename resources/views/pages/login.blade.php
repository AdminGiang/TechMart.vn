<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/stylelg.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
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
        <div class="col-1"></div>
        <div class="col-2">
            <a href="#">Forgot password?</a>
        </div>
    </div>
    <div class="input-box">
        <button class="btn-submit" id="SignInBtn">Sign In <i class='bx bx-log-in'></i></button>
    </div>
    <div class="switch-form">
        <span>Don't have an account? <a href="/register" >Register</a></span>
    </div>
</form>
    </div>
    <script src="{{ asset('assets/js/jslogin.js') }}"></script>
</body>
</html>