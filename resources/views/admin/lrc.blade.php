<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Conference Room — Admin</title>
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

  <!-- LOGO OVERLAY (sits on top of green bar) -->
  <div class="logo-overlay">
    <img src="{{asset('assets/logo.png')}}" alt="SNSU Logo" />
  </div>

  <!-- MAIN -->
  <main class="facility-container">
    <h2 class="page-title">LEARNING RESOURCE CENTER</h2>

    <div class="panel">
      <!-- Left: Image -->
      <section class="left">
        <div class="photo-card">
          <img src="{{asset('assets/lrc.jpg')}}" alt="lrc" />
        </div>
      </section>

      <!-- Right: Info -->
      <aside class="right">
        <div class="detail pill">Type: Specialized Facility</div>
        <div class="detail pill">Location: Tapad Gym</div>
        <div class="detail pill">
          Time Limit: 8:00 P.M - 12:00 nn<br />1:00 P.M - 5:00 P.M
        </div>

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