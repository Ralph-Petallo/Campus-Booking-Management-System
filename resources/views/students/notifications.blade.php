<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notifications | SNSU</title>
  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">

  <style>
    .pending {
      color: darkorange;
    }

    .confirmed {
      color: darkgreen;
    }

    .cancelled {
      color: brown;
    }
  </style>
</head>

<body>
  <div class="overlay"></div>

  <div class="container">

    @include('students.nav-bar-student')

    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <div class="notif-container">
      <p class="subtext">Check your booking updates and confirmation slips here.</p>

      @forelse($notifications as $notif)
        <div class="notif-box">
          <p>
            @php
              $status = $notif->booking?->status;
            @endphp

            @if($status === 'CONFIRMED')
              <strong class="confirmed">Your booking has been confirmed!</strong>
              Please download your booking confirmation slip and present it to the facility administrator or staff.

            @elseif($status === 'CANCELLED')
              <strong class="cancelled">Your booking has been cancelled.</strong>
              If you have questions, please contact the administrator.

            @elseif($status === 'PENDING')
              <strong class="pending">Your booking is pending approval.</strong>
              Please wait for the administrator’s confirmation.
            @endif

            @if($notif)
              <a href="{{ route('student.booking-confirmation', $notif->booking->id) }}">
                View more
            </a> @endif

          </p>

        </div>
      @empty
        <div class="notif-box">
          <p>No booking notifications yet.</p>
        </div>
      @endforelse

    </div>


  </div>

  <script src="{{ asset('js/student-script.js') }}"></script>
</body>

</html>