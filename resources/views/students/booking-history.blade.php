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
    @include('students.nav-bar-student')

    <!-- LOGO -->
    <div class="logo-overlay">
        <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo">
    </div>

    <!-- MAIN CONTENT -->
    <a href="{{ route('student.homepage') }}" class="bookingback-btn">← Back to Home</a>

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
                @if($bookings->isEmpty())
                    <tr>
                        <td colspan="7" style="text-align:center;">No bookings yet</td>
                    </tr>
                @else
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->student->student_id }}</td>
                            <td>{{ $booking->student->name }}</td>
                            <td>{{ $booking->facility->faculty_name }}</td>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->time_in }}</td>
                            <td>{{ $booking->time_out }}</td>
                            <td><span class="status">{{ $booking->status }}</span></td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/student-script.js') }}"></script>

</body>

</html>