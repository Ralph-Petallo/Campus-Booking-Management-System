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
    @include('admin.nav-bar')

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
                    <a href="{{ route('facility.view', $facility->id) }}">
                        <button>MANAGE</button>
                    </a>
                </div>
            @endforeach

        </section>
    </main>
</body>

</html>