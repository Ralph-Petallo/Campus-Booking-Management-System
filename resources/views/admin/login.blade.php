<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>

<div class="login-wrapper">

    <div class="login-card">

        {{-- Error Message --}}
        @if(session('error'))
            <p style="color:red; text-align:center;">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required />
            <input type="password" name="password" placeholder="Password" required />
            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="divider">or</div>

        <button class="btn-google">Sign in with Google</button>

        <a href="#" class="forgot">Forgot Password?</a>

        <p class="register">
            Don’t have an account?
            <a href="{{ route('admin.register') }}">Register Here</a>
        </p>

    </div>

</div>

<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
