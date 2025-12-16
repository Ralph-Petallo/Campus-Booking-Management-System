<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SNSU Portal</title>
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />

  <style>
    .btn-logout {
      width: 100%;
      padding: 10px 15px;
      background-color: #e74c3c;
      border: 2px solid black;
      border-radius: 5px;
      cursor: pointer
    }
  </style>
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
          <img id="previewImage" src="{{ auth()->guard('admin')->user()->profile_picture
  ? asset(auth()->guard('admin')->user()->profile_picture)
  : asset('assets/hunter-x.jpg') }}" alt="Preview">
        </div>

        <button id="openProfilePopup" class="change-profile-btn">
          Change Profile
        </button>
      </div>

      <div class="profile-overlay" id="profileOverlay">
        <div class="profile-popup">

          <h3>Change Profile Picture</h3>

          <form action="{{ route('admin.profile.picture') }}" method="POST" enctype="multipart/form-data"
            id="adminProfileForm">
            @csrf
            @method('PUT')

            <div class="preview-box">
              <img id="previewImage" src="{{ auth()->guard('admin')->user()->profile_picture
  ? asset(auth()->guard('admin')->user()->profile_picture)
  : asset('assets/hunter-x.jpg') }}" alt="Preview">
            </div>

            <input type="file" id="profileInput" name="profile_picture" accept="image/*" hidden>

            <button type="button" id="chooseFileBtn" class="choose-btn">
              Choose File
            </button>

            <div class="popup-actions">
              <button type="submit" id="saveProfileBtn" class="save-btn">
                Save
              </button>
              <button type="button" id="closeProfilePopup" class="cancel-btn">
                Cancel
              </button>
            </div>
          </form>

        </div>
      </div>


      <!-- Personal Information Overlay -->
      <div class="overlay" id="personalOverlay">
        <div class="popup">
          <h3>Personal Information</h3>

          {{-- SUCCESS MESSAGE --}}
          @if(session('success'))
            <p class="success-msg">{{ session('success') }}</p>
          @endif

          {{-- VALIDATION ERRORS --}}
          @if($errors->any())
            <div class="error-msg">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('admin.profile.update') }}">
            @csrf
            @method('PUT')

            <label for="personalName">Name:</label>
            <input type="text" id="personalName" name="name" value="{{ old('name', $admin->name) }}" required>

            <label for="personalEmail">Email:</label>
            <input type="email" id="personalEmail" name="email" value="{{ old('email', $admin->email) }}" required>

            <label for="facultyId">Faculty ID:</label>
            <input type="text" value="{{ $admin->id }}" readonly>

            <label for="facultyRole">Role:</label>
            <input type="text" value="{{ $admin->role }}" readonly>

            <div class="popup-actions">
              <button type="submit" class="save-btn">
                Save
              </button>

              <button type="button" id="closePersonal" class="cancel-btn">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- Account Overlay -->
      <div class="overlay" id="accountOverlay">
        <div class="popup">
          <h3>Change Password</h3>

          <form action="{{ route('admin.profile.change_pass') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Old Password:</label>
            <input type="password" name="old_password" required>

            <label>New Password:</label>
            <input type="password" name="new_password" required>

            <label>Confirm Password:</label>
            <input type="password" name="new_password_confirmation" required>

            <div class="popup-actions">
              <button type="submit" class="save-btn">
                Save
              </button>
              <button type="button" id="closeAccount" class="cancel-btn">
                Cancel
              </button>
            </div>
          </form>
        </div>
      </div>


      <div class="buttons">
        <button class="btn" id="personalBtn">Personal Information</button>
        <a href="{{ route('bookinghistory') }}" class="btn">Booking History</a>
        <button class="btn" id="accountBtn">Change Password</button>
        <form action="{{ route('admin.logout') }}" method="POST" class="logout-form">
          @csrf
          <button type="submit" class="btn-logout">
            Logout
          </button>
        </form>

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
  <script src="{{asset('js/script.js')}}"></script>
</body>

</html>