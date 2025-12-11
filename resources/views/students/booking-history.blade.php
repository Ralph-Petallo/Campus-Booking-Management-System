<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking History | SNSU Campus Space</title>

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
    <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo">
</div>

<!-- MAIN CONTENT -->
<a href="{{ route('students.homepage') }}" class="bookingback-btn">← Back to Home</a>

<div class="booking-wrapper">
    <div class="booking-header">Booking History...</div>

    <table>
      <thead>
        <tr>
          <th>Student ID</th>
          <th>Student Name</th>
          <th>Facility</th>
          <th>Date</th>
          <th>Time In</th>
          <th>Time Out</th>
          <th>Status</th>
        </tr>
        </thead>

        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->student_id }}</td>
                <td>{{ $booking->student_name }}</td>
                <td>{{ $booking->facility }}</td>
                <td>{{ $booking->date }}</td>
                <td>{{ $booking->time_in }}</td>
                <td>{{ $booking->time_out }}</td>
            <td><span class="status">{{ $booking->status }}</span></td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

<script src="{{ asset('js/student-script.js') }}"></script>

</body>
</html>
