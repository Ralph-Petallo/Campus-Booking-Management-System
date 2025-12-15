<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>{{ $facility->facility_name }} — Admin</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
</head>

<body>
    <div class="overlay"></div>

    <!-- TOP GREEN BAR -->
    @include('admin.nav-bar')

    <!-- LOGO OVERLAY -->
    <div class="logo-overlay">
        <img src="{{ asset('assets/logo.png') }}" alt="SNSU LOGO" />
    </div>

    <!-- MAIN -->
    <main class="facility-container">
        <h2 class="page-title">{{ strtoupper($facility->facility_name) }}</h2>

        <div class="panel">
            <!-- LEFT IMAGE -->
            <section class="left">
                <div class="photo-card">
                    <img src="{{ asset('uploads/facilities/' . $facility->image) }}"
                        alt="{{ $facility->facility_name }}" />
                </div>
            </section>

            <!-- RIGHT DETAILS -->
            <aside class="right">
                <div class="detail pill">Administrator: {{ $facility->administrator_name }}</div>
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
            dashboard: "{{ route('dashboard') }}"
        };
    </script>

    <script src="{{asset('js/script.js')}}"></script>
</body>

</html>