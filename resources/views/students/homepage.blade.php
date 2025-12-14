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
  @include('nav-bar-student')

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
        <a href="{{ route('student.facility-details', $facility->id) }}">
          <button>DISCOVER</button>
        </a>
      </div>
    @endforeach

  </section>

  <script src="{{ asset('js/student-script.js') }}"></script>

</body>

</html>