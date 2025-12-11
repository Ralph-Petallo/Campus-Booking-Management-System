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

    <!-- MAIN CONTENT -->
    <main>
        <div class="history-.table-container">
            <table class="history-table">
                <thead>
                    <tr>
                        <th colspan="7" class="history-header">Booking History</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Student ID</td>
                        <td>Student Name</td>
                        <td>Reserved Facility</td>
                        <td>Date</td>
                        <td>Time In</td>
                        <td>Time Out</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td>2023-00157</td>
                        <td>Benny Basil</td>
                        <td>Conference Room</td>
                        <td>09-35-2028</td>
                        <td>9:00 A.M</td>
                        <td>12:00 NN</td>
                        <td>
                            <button class="history-confirm">CONFIRMED</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2023-0123</td>
                        <td>Triew Smsl</td>
                        <td>Gym</td>
                        <td>09-02-2099</td>
                        <td>1:00 P.M</td>
                        <td>9:00 P.M</td>
                        <td>
                            <button class="history-cancel">CANCELLED</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    
    <script src="{{asset('js/script.js')}}"></script>
</body>
</html>
