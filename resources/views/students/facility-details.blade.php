<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $facility->faculty_name }} - SNSU Campus Space</title>
  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body class="facility-css">
  <div class="overlay"></div>
  <div class="container">

    <!-- Header -->
    @include('students.nav-bar-student')

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Facility Content -->
    <div class="facility-container">

      <!-- Facility Image -->
      <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="{{ $facility->faculty_name }}"
        class="facility-img">

      <!-- Facility Details -->
      <div class="facility-details">
        <h2 class="facility-name">{{ $facility->faculty_name }}</h2>
        <p><strong>Type:</strong> <span class="facility-type">{{ $facility->type }}</span></p>
        <p><strong>Administrator:</strong> <span class="facility-administrator">{{ $facility->administrator_name }}</span></p>
        <p><strong>Location:</strong> <span class="facility-location">{{ $facility->location }}</span></p>
        <p><strong>Availability:</strong>
          <span class="availability">{{ $facility->status ?? 'Available' }}</span>
        </p>
        <p><strong>Time Limit:</strong>
          <span class="facility-time">{{ $facility->time_open }}</span>
        </p>

        <div>
          <a href="{{ route('student.booking-form.create', $facility->id) }}">
            <button class="reserve-btn">Reserve</button>
          </a>
        </div>

      </div>

    </div> <!-- .facility-container -->

  </div> <!-- .container -->


  </div>

  <script src="{{ asset('js/student-script.js') }}"></script>
</body>

</html>