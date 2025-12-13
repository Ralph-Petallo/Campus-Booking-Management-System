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
    <header class="topbar">
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li><a href="{{ route('admin.facilities') }}">Facilities</a></li>
                <li><a href="{{ route('admin.booking') }}">Bookings</a></li>
                <li><a href="{{ route('admin.notifications') }}">Notifications</a></li>
                <li><a href="{{ route('admin.profile') }}">Profile</a></li>
            </ul>
        </nav>
    </header>

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
                    <tr>
                        <td>2023-00157</td>
                        <td>Benny Basil</td>
                        <td>Conference Room</td>
                        <td>09-35-2028</td>
                        <td>9:00 A.M</td>
                        <td>12:00 NN</td>
                        <td>

                            <button class="confirm">CONFIRM</button>
                            <button class="cancel">CANCEL</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2023-0123</td>
                        <td>triew smsl</td>
                        <td>Gym</td>
                        <td>09-02-2099</td>
                        <td>13:00 A.M</td>
                        <td>21:00 NN</td>
                        <td>

                            <button class="confirm">CONFIRM</button>
                            <button class="cancel">CANCEL</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>