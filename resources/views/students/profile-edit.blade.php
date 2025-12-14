<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile — SNSU</title>

  <link rel="stylesheet" href="{{ asset('css/style-global.css') }}">
  <link rel="stylesheet" href="{{ asset('css/student-style.css') }}">
</head>

<body>
  <div class="overlay"></div>

  <div class="container">

    <!-- Header -->
    @include('nav-bar-student')

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Edit Profile Form -->
    <main class="content-page active">
      <button class="back-btn" id="backBtn">← Back</button>

      <h2>Edit Profile</h2>
      <label for="editName">Full Name</label>
      <input type="text" id="editName" name="name" value="{{ $user->name ?? 'Benny Basil' }}" required>

      <label for="editEmail">Email</label>
      <input type="email" id="editEmail" name="email" value="{{ $user->email ?? 'bbasil@ssct.edu.ph' }}" required>

      <label for="editCourse">Course</label>
      <input type="text" id="editCourse" name="course" value="{{ $user->course ?? 'BS in Information Technology' }}"
        required>

      <div class="form-buttons">
        <button type="submit" class="btn blue">Save Changes</button>
        <button type="button" class="btn-cancel" id="cancelBtn">Cancel</button>
      </div>
      </form>
    </main>

  </div>


  <script src="{{ asset('js/student-script.js') }}"></script>

</body>

</html>