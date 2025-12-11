<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation | SNSU</title>

    <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">

    <!-- html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
</head>
<body>

<div class="overlay"></div>

<div class="container">

    <!-- Header Navigation -->
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

    <!-- Logo -->
    <div class="logo-overlay">
        <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Confirmation Content -->
    <div class="notif-container">

        <div class="confirmation-box" id="confirmationContent">

            <h2>Booking Confirmation Slip</h2>

            <p><strong>Greetings!</strong></p>

            <p>
                Please present this confirmation slip to the facility administrator or staff on the day of your scheduled use.
                The staff may verify your booking details before allowing access.
            </p>

            <div class="booking-details">
                <p><strong>Student Name:</strong> <span id="studentName">Juan Dela Cruz</span></p>
                <p><strong>Student ID:</strong> <span id="studentId">2023-001</span></p>
                <p><strong>Facility:</strong> <span id="facility">Learners’ Resource Center</span></p>
                <p><strong>Date:</strong> <span id="date">November 12, 2025</span></p>
                <p><strong>Time:</strong> <span id="time">8:00 AM - 10:00 AM</span></p>
                <p><strong>Status:</strong> <span class="status confirmed">Confirmed</span></p>
            </div>

        </div>

        <div class="btn-container">
            <button class="ok-btn" id="downloadBtn">Download File</button>
            <button class="ok-btn">Back</button>
        </div>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script src="{{ asset('js/student-script.js') }}"></script>

</body>
</html>