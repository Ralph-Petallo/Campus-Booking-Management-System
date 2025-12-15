<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Personal Information — SNSU</title>
  <link rel="stylesheet" href="{{asset('css/style-global.css')}}">
  <link rel="stylesheet" href="{{asset('css/student-style.css')}}">
</head>

<body>
  <div class="overlay"></div>
  <div class="container">

    <!-- Header -->
    @include('students.nav-bar-student')
    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{asset('images/snsu-logo.png')}}" alt="SNSU Logo" />
    </div>

    <main class="content-page active">
      <h2>Personal Information</h2>

      <div class="info-group">
        <label>Full Name:</label>
        <p>{{ $student->name}}</p>
      </div>

      <div class="info-group">
        <label>Email:</label>
        <p>{{ $student->email }}</p>
      </div>

      <div class="info-group">
        <label>Course:</label>
        <p>{{ $student->course }}</p>
      </div>

      <div class="info-group">
        <label>Year level:</label>
        <p>{{ $student->year_level }}</p>
      </div>

      <div class="info-group">
        <label>Department:</label>
        <p>{{ $student->department }}</p>
      </div>

      <button class="back-btn" onclick="window.location.href='{{ route('student.profile') }}'">
        ← Back
      </button>
    </main>


    <script>

      <script src="student-script.js"></script>
</body>

</html>