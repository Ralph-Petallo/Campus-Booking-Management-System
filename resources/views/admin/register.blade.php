<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="register-body">
  <div class="container">
    <div class="form-box">
      <h2 class="title">Register</h2>

      {{-- Display Validation Errors --}}
      @if ($errors->any())
        <div class="errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Success Message --}}
      @if(session('success'))
        <div class="success">
          {{ session('success') }}
        </div>
      @endif

      <form method="POST" action="{{ route('admin.register.submit') }}">
        @csrf
        <input type="text" name="name" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button type="submit" class="register-btn">Register</button>
      </form>

      <p class="login-text">Have an account? <a href="{{ url('/admin/login') }}">Log in here</a></p>
    </div>
  </div>

  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
