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
    <header class="topbar">
      <nav class="nav">
        <ul class="nav-list">
          <li><a href="{{ route('student.home') }}">Home</a></li>
          <li><a href="{{ route('student.bookings') }}">Bookings</a></li>
          <li><a href="{{ route('student.notifications') }}">Notifications</a></li>
          <li><a href="{{ route('student.profile') }}" class="active">Profile</a></li>
        </ul>
      </nav>
    </header>

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Account Settings Form -->
    <main class="content-page active">
      <h2>Account Settings</h2>

      <form id="passwordForm" method="POST" action="{{ route('student.profile.account.update') }}">
        @csrf
        <label for="currentPass">Current Password</label>
        <input type="password" id="currentPass" name="current_password" placeholder="Enter current password" required>

        <label for="newPass">New Password</label>
        <input type="password" id="newPass" name="new_password" placeholder="Enter new password" required>

        <label for="confirmPass">Confirm New Password</label>
        <input type="password" id="confirmPass" name="confirm_password" placeholder="Confirm new password" required>

        <div class="form-buttons">
          <button type="submit" class="btn blue">Update Password</button>
          <button type="button" class="btn cancel" id="cancelBtn">Cancel</button>
        </div>
      </form>

      <button class="back-btn" id="backBtn">← Back</button>
    </main>

  </div>

  <script>
    window.routes = {
      welcome: "{{ route('students.welcome') }}",
      logout: "{{ route('logout') }}",
      studentNotifications: "{{ route('student.notifications') }}",
      profileEdit: "{{ route('student.profile.edit') }}",
      bookings: "{{ route('student.bookings') }}",
      profileAccount: "{{ route('student.profile.account') }}",
      profile: "{{ route('student.profile') }}"
    };
  </script>

  <script src="{{ asset('js/student-script.js') }}"></script>

</body>

</html>