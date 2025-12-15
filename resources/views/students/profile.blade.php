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
    @include('students.nav-bar-student')

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

        <!-- Menu Buttons -->
        <div class="menu-buttons">
          <div class="menu-btn"><a href="{{ route('student.profile_edit_page') }}">Edit Profile</a></div>
          <div class="menu-btn"><a href="{{ route('student.profile_info') }}">Personal Info</a></div>
          <div class="menu-btn"> <a href="{{ route('student.booking-history') }}">Booking History</a></div>
          <div class="menu-btn"><a href="{{ route('student.profile_change_pass_page') }}">Account</a></div>

          <div class="menu-btn"><a href="{{ route('student.logout') }}">Logout</a></div>

        </div>

      </aside>

    </main>
  </div>

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