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
        @include('students.nav-bar-student')

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
                    Please present this confirmation slip to the facility administrator or staff on the day of your
                    scheduled use.
                    The staff may verify your booking details before allowing access.
                </p>


                <div class="booking-confirmation">

                    <h1>Your Bookings</h1>

                    @if($bookings->count() > 0)
                        @foreach($bookings as $booking)
                            <div class="booking-details">
                                <p><strong>Student Name:</strong> <span>{{ $booking->student_name }}</span></p>
                                <p><strong>Student ID:</strong> <span>{{ $booking->student_id }}</span></p>
                                <p><strong>Facility:</strong> <span>{{ $booking->facility }}</span></p>
                                <p><strong>Date:</strong>
                                    <span>{{ \Carbon\Carbon::parse($booking->date)->format('F d, Y') }}</span>
                                </p>
                                <p><strong>Time:</strong> <span>{{ \Carbon\Carbon::parse($booking->time_in)->format('h:i A') }}
                                        - {{ \Carbon\Carbon::parse($booking->time_out)->format('h:i A') }}</span></p>
                                <p><strong>Status:</strong>
                                    <span class="status {{ strtolower($booking->status) }}">
                                        {{ $booking->status ?? 'Pending' }}
                                    </span>
                                </p>
                            </div>
                            <hr>
                        @endforeach
                    @else
                        <p>No bookings found.</p>
                    @endif

                </div>

            </div>

            <div class="btn-container">
                <button class="ok-btn" id="downloadBtn">Download File</button>
                <button class="ok-btn" onclick="location.href='booking-form'">Back</button>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="{{ asset('js/student-script.js') }}"></script>

</body>

</html>