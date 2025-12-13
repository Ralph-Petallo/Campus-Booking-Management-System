<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SNSU Campus Space</title>

  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body>

  <div class="overlay"></div>

  <!-- HEADER -->
  <header class="topbar">
    <nav class="nav">
      <ul class="nav-list">
        <li><a href="{{ route('students.homepage') }}">Home</a></li>
        <li><a href="{{ route('students.booking-history') }}">Bookings</a></li>
        <li><a href="{{ route('students.notifications') }}">Notifications</a></li>
        <li><a href="{{ route('students.profile') }}">Profile</a></li>
      </ul>
    </nav>
  </header>

  <!-- LOGO -->
  <div class="logo-overlay">
    <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
  </div>

  <!-- WELCOME SECTION -->
  <section class="welcome-section">
    <h1>YOUR NEXT CAMPUS BOOKING STARTS HERE</h1>
    <p>For nation’s greater heights</p>
  </section>

  <!-- FACILITIES SECTION -->
  <section class="facilities-section">

    @foreach($facilities as $facility)
      <div class="facility-card">
        <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="{{ $facility->faculty_name }}">
        <h2>{{ $facility->faculty_name }}</h2>
        <a href="{{ route('students.facility-details', $facility->id) }}">
          <button>DISCOVER</button>
        </a>
      </div>
    @endforeach

  </section>

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