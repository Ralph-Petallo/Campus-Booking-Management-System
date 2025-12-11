<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Welcome Page</title>
  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>
<body>

  <div class="landing-overlay">

    <div class="top-left">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="logo" class="logo">
      <h3 class="motto">For nations greater heights</h3>
    </div>

    <div class="text-section">
      <h1 class="welcome-text">WELCOME TO SNSU<br>CAMPUS SPACE!</h1>
      <p class="sub-text">ACCESS, BOOK, MANAGE</p>

      <a href="{{ route('students.homepage') }}">
        <button class="explore-btn">EXPLORE</button>
      </a>
    </div>

</div>

<script>
    window.routes = {
        welcome: "{{ route('students.welcome') }}",
        studentNotifications: "{{ route('students.notifications') }}",
        bookings: "{{ route('students.booking-history') }}",
        profile: "{{ route('students.profile') }}"
    };
</script>

<script src="{{ asset('js/student-script.js') }}"></script>
</body>
</html>
