<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body>

    <div class="login-wrapper">

        <div class="login-card">

            <form action="{{ route('student.login.process') }}" method="POST">
                @csrf

                <input type="email" name="email" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />

                <button type="submit" class="btn-login">Login</button>
            </form>
            <div class="divider">or</div>

            <button type="button" class="btn-google">Sign in with Google</button>

            <a href="#" class="forgot">Forgot Password?</a>

        </div>

    </div>

</body>

</html>