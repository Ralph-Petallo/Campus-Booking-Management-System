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
        @include('admin.nav-bar')
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