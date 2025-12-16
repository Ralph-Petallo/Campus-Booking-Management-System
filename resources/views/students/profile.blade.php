<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Profile — SNSU</title>

  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}" />

  <style>
    .logout-btn {
      text-align: center;
    }

    .logout {
      width: 100%;
      border-radius: 20px;
      padding: 12px 20px;
      font-weight: bolder;
      font-size: 14px;
    }

    .logout:hover {
      background: black;
      color: white;
    }
  </style>
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
          <img id="profileImage" src="{{ $student->profile_picture
  ? asset($student->profile_picture)
  : asset('images/profile.jpg') }}" alt="Profile Photo">

          <form action="{{ route('student.profile_picture.update') }}" method="POST" enctype="multipart/form-data"
            id="profilePicForm">
            @csrf

            <input type="file" id="uploadPhoto" name="profile_picture" accept="image/*" hidden>

            <button type="button" class="btn-small" id="changePhotoBtn">
              Change Photo
            </button>
          </form>
        </div>


        <!-- Menu Buttons -->
        <div class="menu-buttons">
          <div class="menu-btn"><a href="{{ route('student.profile_edit_page') }}">Edit Profile</a></div>
          <div class="menu-btn"><a href="{{ route('student.profile_info') }}">Personal Info</a></div>
          <div class="menu-btn"> <a href="{{ route('student.booking-history') }}">Booking History</a></div>
          <div class="menu-btn"><a href="{{ route('student.profile_change_pass_page') }}">Account</a></div>

          <form class="logout-btn" action="{{ route('student.logout', auth()->user()->id) }}" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
          </form>

        </div>

      </aside>

    </main>
  </div>

  <script src="{{ asset('js/student-script.js') }}"></script>

  <script>
    document.getElementById("changePhotoBtn").onclick = () => {
      document.getElementById("uploadPhoto").click();
    };

    document.getElementById("uploadPhoto").onchange = (event) => {
      const file = event.target.files[0];
      if (file) {
        document.getElementById("profileImage").src = URL.createObjectURL(file);

        // auto-submit form
        document.getElementById("profilePicForm").submit();
      }
    };

  </script>

</body>

</html>