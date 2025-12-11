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

    <!-- Overlay Panel -->
    <div class="overlay-prof">
      <div class="profile-container">
          <div class="profile-preview">
              <img id="profilePic" src="assets/hunter-x.jpg" alt="Profile Picture">
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
          <label>Name:</label>
          <input type="text" id="personalName" placeholder="Your Name">
          <label>Email:</label>
          <input type="email" id="personalEmail" value="user@example.com" disabled>
          <label>Faculty ID:</label>
          <input type="text" id="facultyId" value="FAC12345" disabled>
          <div class="popup-actions">
            <button id="savePersonal" class="save-btn">Save</button>
            <button id="closePersonal" class="cancel-btn">Cancel</button>
          </div>
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
        <a href="#" class="btn">Admin</a>
        <button class="btn" id="personalBtn">Personal Information</button>
        <a href="{{ route('admin.bookinghistory') }}" class="btn">Booking History</a>
        <button class="btn" id="accountBtn">Account</button>
        <button class="btn-logout">Logout</button>
      </div>
    </div>
    <!-- Center Logo -->
    <div class="center-logo">
        <img src="{{asset('assets/logo.png')}}" alt="SNSU-LOGO">
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
    const routes = {
        login: "{{ route('admin.login') }}"
    };
</script>
<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
