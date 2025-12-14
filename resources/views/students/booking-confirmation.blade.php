<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation | SNSU</title>

    <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
    <style>
        .download-btn {
            margin-top: 10px;
        }
    </style>
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
        <main class="notif-container">

            <div class="confirmation-box" id="confirmationContent">

                <h2>Booking Confirmation Slip</h2>

                <p><strong>Greetings!</strong></p>

                <p>
                    Please present this confirmation slip to the facility administrator or staff on the day of your
                    scheduled use.
                    The staff may verify your booking details before allowing access.
                </p>


                <div class="booking-confirmation">

                    <h1>Booking Confirmation</h1>

                    <div class="booking-details" id="booking-{{ $booking->id }}">
                        <p><strong>Student Name:</strong> <span>{{ $booking->student_name }}</span></p>
                        <p><strong>Student ID:</strong> <span>{{ $booking->student_id }}</span></p>
                        <p><strong>Facility:</strong> <span>{{ $booking->facility }}</span></p>
                        <p><strong>Date:</strong>
                            <span>{{ \Carbon\Carbon::parse($booking->date)->format('F d, Y') }}</span>
                        </p>
                        <p><strong>Time:</strong>
                            <span>
                                {{ \Carbon\Carbon::parse($booking->time_in)->format('h:i A') }}
                                -
                                {{ \Carbon\Carbon::parse($booking->time_out)->format('h:i A') }}
                            </span>
                        </p>
                        <p>
                            <strong>Status:</strong>
                            <span class="status-{{ strtolower($booking->status) }}">
                                {{ $booking->status }}
                            </span>
                        </p>

                        {{-- ✅ SHOW DOWNLOAD ONLY IF CONFIRMED --}}
                        @if($booking->status === 'CONFIRMED')
                            <button class="ok-btn download-btn" data-booking-id="{{ $booking->id }}"
                                data-student="{{ $booking->student_name }}">
                                Download PDF
                            </button>
                        @elseif($booking->status === 'RESERVED')
                            <p class="pending-msg">Your booking is pending approval. Please wait for confirmation.</p>
                        @elseif($booking->status === 'CANCELLED')
                            <p class="cancelled-msg">Your booking has been cancelled. Please contact the administrator if
                                needed.</p>
                        @endif
                    </div>
                </div>


            </div>


        </main>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script>
        // use for making a file into PDF file
        document.querySelectorAll('.download-btn').forEach(button => {
            button.addEventListener('click', function () {
                const bookingId = this.dataset.bookingId;
                const element = document.getElementById('booking-' + bookingId);
                const opt = {
                    margin: 0.5,
                    filename: `booking_confirmation_${bookingId}.pdf`,
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                };

                html2pdf().set(opt).from(element).save();
            });
        });
    </script>

</body>

</html>