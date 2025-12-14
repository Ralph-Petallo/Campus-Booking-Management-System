<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="overlay"></div>

    <!-- TOP GREEN BAR -->
    @include('admin.nav-bar')

    <!-- LOGO OVERLAY -->
    <div class="logo-overlay">
        <img src="{{asset('assets/logo.png')}}" alt="SNSU Logo" />
    </div>

    <!-- MAIN CONTENT -->
    <main>
        <div class="history-.table-container">
            <table class="history-table">
                <thead>
                    <tr>
                        <th colspan="7" class="history-header">Booking History</th>
                    </tr>

                    <tr>
                        <td>Student ID</td>
                        <td>Student Name</td>
                        <td>Reserved Facility</td>
                        <td>Date</td>
                        <td>Time In</td>
                        <td>Time Out</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    @if($booking_history->count() > 0)
                        @foreach ($booking_history as $booking)
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

                    @else
                        <td colspan="7" class="history-header">No Booking History yet</td>
                    @endif

                </tbody>
            </table>
        </div>
    </main>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>