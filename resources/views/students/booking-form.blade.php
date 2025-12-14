<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking Form - {{ $facility->faculty_name }}</title>
    <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body class="booking-fill">

    <div class="overlay"></div>

    <!-- Header -->
    @include('nav-bar-student')

    <!-- Logo -->
    <div class="logo-overlay">
        <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Booking Form -->
    <main class="booking-container">
        <div class="booking-form">
            <h2 class="form-header">Please fill out this form to process your booking...</h2>

            <form action="{{ route('students.booking-form.store') }}" method="POST">
                @csrf

                <table class="booking-table">
                    <tr>
                        <td><label>Student ID</label></td>
                        <td><input type="text" name="student_id" value="{{ session('student_id') }}"></td>
                    </tr>

                    <tr>
                        <td><label>Student Name</label></td>
                        <td><input type="text" name="student_name" value="{{ session('student_name') }}"></td>
                    </tr>

                    <tr>
                        <td><label>Facility</label></td>
                        <td><input type="text" name="facility_name" value="{{ $facility->faculty_name }}" readonly></td>
                    </tr>

                    <tr>
                        <td><label>Date</label></td>
                        <td><input type="date" name="date" required></td>
                    </tr>

                    <tr>
                        <td><label>Time In</label></td>
                        <td><input type="time" name="time_in" required></td>
                    </tr>

                    <tr>
                        <td><label>Time Out</label></td>
                        <td><input type="time" name="time_out" required></td>
                    </tr>
                </table>

                <div class="btn-container">
                    <a href="{{ route('students.facility-details', $facility->id) }}" class="cancel-btn">Cancel</a>
                    <button type="submit" class="book-btn">Book</button>
                </div>
            </form>
        </div>
    </main>

    <script src="{{ asset('js/student-script.js') }}"></script>
</body>

</html>