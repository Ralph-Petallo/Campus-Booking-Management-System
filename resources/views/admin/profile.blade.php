<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SNSU Portal</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
</head>

<body class="profile-set">
  <div class="overlay"></div>
  <div class="container">
    <!-- Header Section -->
    <!-- TOP GREEN BAR -->
    @include('admin.nav-bar')
    <!-- LOGO OVERLAY (sits on top of green bar) -->
    <div class="logo-overlay">
      <img src="{{asset('assets/logo.png')}}" alt="SNSU Logo" />
    </div>

    <!-- Overlay Panel -->
    <div class="overlay-prof">
      <div class="profile-container">
        <div class="profile-preview">
          <img id="profilePic" src="{{asset('assets/hunter-x.jpg') }}" alt="Profile Picture">
        </div>

        <button id="openProfilePopup" class="change-profile-btn">
          Change Profile
        </button>
      </div>

      <div class="profile-overlay" id="profileOverlay">
        <div class="profile-popup">

          <h3>Change Profile Picture</h3>

          <div class="preview-box">
            <img id="previewImage" src="assets/default-profile.png" alt="Preview">
          </div>

          <input type="file" id="profileInput" accept="image/*" style="display:none;">

          <button id="chooseFileBtn" class="choose-btn">Choose File</button>

          <div class="popup-actions">
            <button id="saveProfileBtn" class="save-btn">Save</button>
            <button id="closeProfilePopup" class="cancel-btn">Cancel</button>
          </div>

        </div>
      </div>

      <!-- Personal Information Overlay -->
      <div class="overlay" id="personalOverlay">
        <div class="popup">
          <h3>Personal Information</h3>
          <form action="">
            <label>Name:</label>
            <input type="text" id="personalName" value="{{$admin->username}}">
            <label>Email:</label>
            <input type="email" id="personalEmail" value="{{ $admin->email }}">
            <label>Faculty ID:</label>
            <input type="text" id="facultyId" value="{{$admin->id}}">
            <label>Role:</label>
            <input type="text" id="facultyRole" value="{{$admin->role}}" readonly disabled>
            <div class="popup-actions">
              <button type="submit" id="savePersonal" class="save-btn">Save</button>
              <button id="closePersonal" class="cancel-btn">Cancel</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Account Overlay -->
      <div class="overlay" id="accountOverlay">
        <div class="popup">
          <h3>Change Password</h3>
          <label>Old Password:</label>
          <input type="password" id="oldPassword">
          <label>New Password:</label>
          <input type="password" id="newPassword">
          <label>Confirm Password:</label>
          <input type="password" id="confirmPassword">
          <div class="popup-actions">
            <button id="savePassword" class="save-btn">Save</button>
            <button id="closeAccount" class="cancel-btn">Cancel</button>
          </div>
        </div>
      </div>

      <div class="buttons">
        <button class="btn" id="personalBtn">Personal Information</button>
        <a href="{{ route('bookinghistory') }}" class="btn">Booking History</a>
        <button class="btn" id="accountBtn">Account</button>
        <button class="btn-logout">Logout</button>
      </div>
    </div>
    <!-- Bottom Logos -->
    <div class="bottom-logos">
      <img src="{{asset('assets/cas.png')}}" alt="Logo 1">
      <img src="{{asset('assets/cbt.png')}}" alt="Logo 2">
      <img src="{{asset('assets/coe.png')}}" alt="Logo 3">
      <img src="{{asset('assets/ccis.png')}}" alt="Logo 4">
      <img src="{{asset('assets/cte.png')}}" alt="Logo 5">
    </div>
  </div>
  <script>
  </script>
  <script src="{{asset('js/script.js')}}"></script>
</body>

</html>