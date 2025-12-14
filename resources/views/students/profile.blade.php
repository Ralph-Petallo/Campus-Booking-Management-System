<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile — SNSU</title>

  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}" />
</head>

<body class="profile-body">

  <div class="overlay"></div>

  <div class="container">

    <!-- Header -->
    @include('nav-bar-student')

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>


    <main class="main-wrap">

      <!-- LEFT SIDE PROFILE PANEL -->
      <aside class="left-panel">

        <!-- Profile Picture -->
        <div class="profile-photo">
          <img id="profileImage" src="{{ asset('images/profile.jpg') }}" alt="Profile Photo">

          <input type="file" id="uploadPhoto" accept="image/*" hidden>
          <button class="btn-small" id="changePhotoBtn">Change Photo</button>
        </div>

        <!-- User Info -->
        <h2 id="userName">{{ $user->name ?? 'Benny Basil' }}</h2>
        <p id="userEmail">{{ $user->email ?? 'bbasil@ssct.edu.ph' }}</p>
        <p id="userCourse">{{ $user->course ?? 'BS in Information Technology' }}</p>

        <!-- Menu Buttons -->
        <div class="menu-buttons">
          <button class="menu-btn" id="editProfileBtn">Edit Profile</button>
          <button class="menu-btn" id="bookingHistoryBtn">Booking History</button>
          <button class="menu-btn" id="accountBtn">Account</button>

          <button id="logoutBtn" class="logout-btn">Logout</button>

          </form>
        </div>

      </aside>

    </main>
  </div>

  <script>
    window.routes = {
      login: "{{ route('students.login') }}",
      profileEdit: "{{ route('students.profile-edit') }}",
      profileAccount: "{{ route('students.profile-account') }}",
      profile: "{{ route('students.profile') }}",
      bookingHistory: "{{ route('students.booking-history') }}"
    };
  </script>

  <script src="{{ asset('js/student-script.js') }}"></script>

  <script>
    // Photo upload logic
    document.getElementById("changePhotoBtn").onclick = () => {
      document.getElementById("uploadPhoto").click();
    };

    document.getElementById("uploadPhoto").onchange = (event) => {
      const file = event.target.files[0];
      if (file) {
        document.getElementById("profileImage").src = URL.createObjectURL(file);
      }
    };
  </script>

</body>

</html>