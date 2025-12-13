<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>

    <div class="overlay"></div>
    <div class="container">
        <!-- Header Section -->
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
        <!-- LOGO OVERLAY (sits on top of green bar) -->
        <div class="logo-overlay">
            <img src="{{asset('assets/logo.png')}}" alt="SNSU Logo" />
        </div>

        <div class="notifications-container">

            <div class="notification-section">
                <h2>Today</h2>

                <div class="notification-box">
                    <p><strong>Benny</strong> reserved the Conference Room for <strong>September 35, 2028</strong>.</p>
                    <a href="#" class="more">Click to see more</a>
                </div>

                <div class="notification-box">
                    <p><strong>Rose</strong> canceled her booking.</p>
                    <a href="#" class="more">Click to see more</a>
                </div>
            </div>

            <div class="notification-section">
                <h2>1 week ago</h2>

                <div class="notification-box">
                    <p>AAAAAAAAAAAAAAAAAAAAA...</p>
                    <a href="#" class="more">Click to see more</a>
                </div>
            </div>
        </div>

</body>

</html>