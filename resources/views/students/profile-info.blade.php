<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information — SNSU</title>
  <link rel="stylesheet" href="css/style-global.css">
  <link rel="stylesheet" href="student-style.css">
</head>

<body>
  <div class="overlay"></div>
  <div class="container">

    <!-- Header -->
    <header class="topbar">
      <nav class="nav">
        <ul class="nav-list">
          <li><a href="homepage.html">Home</a></li>
          <li><a href="bookings.html">Bookings</a></li>
          <li><a href="notifications.html">Notifications</a></li>
          <li><a href="profile.html">Profile</a></li>
        </ul>
      </nav>
    </header>

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="images/snsu-logo.png" alt="SNSU Logo" />
    </div>

    <main class="content-page active">
      <h2>Personal Information</h2>

      <div class="info-group">
        <label>Full Name:</label>
        <p>Benny Basil</p>
      </div>

      <div class="info-group">
        <label>Email:</label>
        <p>bbasil@ssct.edu.ph</p>
      </div>

      <div class="info-group">
        <label>Course:</label>
        <p>BS in Information Technology</p>
      </div>

      <div class="info-group">
        <label>Year Level:</label>
        <p>4th Year</p>
      </div>

      <div class="info-group">
        <label>Campus:</label>
        <p>Main Campus — Surigao City</p>
      </div>

      <button class="back-btn" onclick="window.location.href='profile.html'">← Back</button>
    </main>

    <script>
      window.routes = {
        welcome: "{{ route('students.homepage') }}",
        studentNotifications: "{{ route('students.notifications') }}",
        bookings: "{{ route('students.booking-history') }}",
        profile: "{{ route('students.profile') }}"
      };
    </script>

    <script src="student-script.js"></script>
</body>

</html>