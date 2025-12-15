<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <!-- ===== MAIN CONTENT ===== -->
    <main>
        <div class="booking-table-container">
            <table class="booking-table">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Reserved Facility</th>
                        <th>Date</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->student->student_id }}</td>
                            <td>{{ $booking->student->name }}</td>
                            <td>{{ $booking->facility->faculty_name }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->date)->format('m-d-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->time_in)->format('h:i A') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->time_out)->format('h:i A') }}</td>
                            <td>
                                <!-- CONFIRM -->
                                <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="confirm">
                                        {{$booking->status == 'CONFIRMED' ? 'CONFIRMED' : 'CONFIRM'}}
                                    </button>
                                </form>

                                <!-- CANCEL -->
                                <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="cancel">
                                        {{$booking->status == 'CANCELLED' ? 'CANCELLED' : 'CANCEL'}}
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align:center;">
                                No bookings found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>