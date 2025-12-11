<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications | SNSU</title>
  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body>
  <div class="overlay"></div>

  <div class="container">

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

      <div class="logo-overlay">
          <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
      </div>

        <div class="notif-container">
          <p class="subtext">Check your booking updates and confirmation slips here.</p>

          <div class="notif-box">
            <p><strong>Your booking has been confirmed!</strong> Please download your booking confirmation slip and present it to the facility administrator or staff.
            <a href="{{ route('students.booking-confirmation') }}">Confirm</a>
          </div>

          <div class="confirmation-box hidden" id="confirmationBox">
            <p><strong>Greetings!</strong></p>
            <p>
              Please present this confirmation slip to the facility administrator or staff on the day of your scheduled use.
              The staff may verify your booking details before allowing access.
            </p>

            <button id="downloadBtn" class="ok-btn">Download File</button>
        </div>

    </div>

</div>

<script src="{{ asset('js/student-script.js') }}"></script>
</body>
</html>
