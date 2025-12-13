<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
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

    <!-- TITLE -->
    <section class="title-section">
        <h1>YOUR NEXT CAMPUS BOOKING STARTS HERE</h1>
        <p>For nations greater heights</p>
    </section>

    <!-- ===== MAIN CONTENT ===== -->
    <main class="dashboard-class">

        <!-- ===== DYNAMIC FACILITIES FROM DATABASE ===== -->
        <section class="facilities-section">

            @foreach($facilities as $facility)
                <div class="facility-card">
                    <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="{{ $facility->faculty_name }}">
                    <h2>{{ $facility->faculty_name }}</h2>
                    <a href="{{ route('students.facility-details', $facility->id) }}">
                        <button>DISCOVER</button>
                    </a>
                </div>
            @endforeach

        </section>
    </main>
</body>

</html>