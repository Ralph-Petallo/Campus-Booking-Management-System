<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Account Settings — SNSU</title>

  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body class="bookingbody">

  <div class="overlay"></div>

  <div class="container">

    <!-- Header -->
    @include('students.nav-bar-student')

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Account Settings Form -->
    <main class="content-page active">
      <h2>Account Settings</h2>

      <form id="passwordForm" method="POST"
        action="{{ route('student.profile_change_pass', auth()->guard('student')->user()->id) }}">
        @csrf

        <label for="currentPass">Current Password</label>
        <input type="password" id="currentPass" name="old_password" placeholder="Enter current password" required>
        @error('old_password')
          <div> {{ $message }}</div>
        @enderror
        <label for="newPass">New Password</label>
        <input type="password" id="newPass" name="new_password" placeholder="Enter new password" required>
        @error('new_password')
          <div> {{ $message }}</div>
        @enderror
        <label for="confirmPass">Confirm New Password</label>
        <input type="password" id="confirmPass" name="new_password_confirmation" placeholder="Confirm new password"
          required>
        @error('new_password_confirmation')
          <div> {{ $message }}</div>
        @enderror

        <div class="form-buttons">
          <button type="submit" class="btn blue">Update Password</button>
          <button type="button" class="btn cancel" onclick="location.href='{{ route('student.profile') }}'">
            Cancel
          </button>
        </div>
      </form>


    </main>

  </div>


  <script src="{{ asset('js/student-script.js') }}"></script>

</body>

</html>