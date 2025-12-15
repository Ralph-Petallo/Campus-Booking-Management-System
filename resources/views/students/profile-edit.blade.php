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
    @include('students.nav-bar-student')

    <!-- Logo -->
    <div class="logo-overlay">
      <img src="{{ asset('images/snsu-logo.png') }}" alt="SNSU Logo" />
    </div>

    <!-- Edit Profile Form -->
    <main class="content-page active">
      <button class="back-btn" onclick="window.location.href='{{ route('student.profile') }}'">
        ← Back
      </button>

      <h2>Edit Profile</h2>

      <form action="{{ route('student.profile_edit') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="editName">Full Name</label>
        <input type="text" id="editName" name="name" value="{{ old('name', $student->name) }}" required>
        @error('name')
          <div>{{ $message }}</div>
        @enderror
        <label for="editEmail">Email</label>
        <input type="email" id="editEmail" name="email" value="{{ old('email', $student->email) }}" required>
        @error('email')
          <div>{{ $message }}</div>
        @enderror
        <label for="editCourse">Course</label>
        <input type="text" id="editCourse" name="course" value="{{ old('course', $student->course) }}" required>
        @error('course')
          <div>{{ $message }}</div>
        @enderror
        <label for="editYear">Year Level</label>
        <input type="text" id="editYear" name="year_level" value="{{ old('year_level', $student->year_level) }}"
          required>
        @error('year_level')
          <div>{{ $message }}</div>
        @enderror
        <label for="editDepartment">Department</label>
        <input type="text" id="editDepartment" name="department" value="{{ old('department', $student->department) }}"
          required>
        @error('department')
          <div>{{ $message }}</div>
        @enderror
        <div class="form-buttons">
          <button type="submit" class="btn blue">Save Changes</button>
          <button type="button" class="btn-cancel" onclick="window.location.href='{{ route('student.profile') }}'">
            Cancel
          </button>
        </div>
      </form>

    </main>

  </div>

  <script src="{{ asset('js/student-script.js') }}"></script>
</body>

</html>