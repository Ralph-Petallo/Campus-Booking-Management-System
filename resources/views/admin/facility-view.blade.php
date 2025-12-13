<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $facility->faculty_name }} — Admin</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
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
        <img src="{{ asset('assets/logo.png') }}" alt="SNSU LOGO" />
    </div>

    <!-- MAIN -->
    <main class="facility-container">
        <h2 class="page-title">{{ strtoupper($facility->faculty_name) }}</h2>

        <div class="panel">
            <!-- LEFT IMAGE -->
            <section class="left">
                <div class="photo-card">
                    <img src="{{ asset('uploads/facilities/' . $facility->image) }}"
                        alt="{{ $facility->faculty_name }}" />
                </div>
            </section>

            <!-- RIGHT DETAILS -->
            <aside class="right">
                <div class="detail pill">Type: {{ $facility->type }}</div>
                <div class="detail pill">Location: {{ $facility->location }}</div>
                <div class="detail pill">Time Limit: {{ $facility->time_open }}</div>

                <div class="status-row">
                    <div class="status-top">
                        <button class="btn-available">AVAILABLE</button>
                        <button class="btn-unavailable">UNAVAILABLE</button>
                    </div>
                    <button class="btn-maintenance">UNDER MAINTENANCE</button>
                </div>
            </aside>
        </div>
    </main>

    <script>
        const routes = {
            dashboard: "{{ route('admin.dashboard') }}"
        };
    </script>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>