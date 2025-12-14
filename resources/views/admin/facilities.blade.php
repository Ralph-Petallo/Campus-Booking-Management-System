<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="facilities-crud">
    <div class="overlay"></div>
    <div class="container">

        <!-- Header -->
        @include('admin.nav-bar')

        <!-- Logo -->
        <div class="logo-overlay">
            <img src="{{ asset('assets/logo.png') }}" alt="SNSU Logo" />
        </div>

        <!-- Title -->
        <section class="title-section">
            <h1>YOUR NEXT CAMPUS BOOKING STARTS HERE</h1>
            <p>For nations greater heights</p>
        </section>

        <!-- Facilities -->
        <section class="facilities-grid-wrapper">
            <section class="facilities-grid" id="facilitiesGrid">

                @foreach($facilities as $facility)
                    <div class="facilities-card"
                        data-id="{{ $facility->id }}"
                        data-name="{{ $facility->faculty_name }}"
                        data-type="{{ $facility->type }}"
                        data-location="{{ $facility->location }}"
                        data-time="{{ $facility->time_open }}"
                        data-image="{{ $facility->image }}"
                    >
                        <h3>{{ $facility->faculty_name }}</h3>
                        <p>Type: {{ $facility->type }}</p>
                        <p>Location: {{ $facility->location }}</p>
                        <p>Time Limit: {{ $facility->time_open }}</p>
                        <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="{{ $facility->faculty_name }}">

                        <div class="edit-container">
                            <button class="edit-btn">EDIT</button>
                        </div>

                        <form action="{{ route('facilities.delete', $facility->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="delete-container"><button type="submit" class="delete-btn" onclick="return confirm('Delete this facility?')">DELETE</button></div>
                        </form>
                    </div>
                @endforeach

            </section>
        </section>

        <!-- Add New -->
        <section class="add-section">
            <div class="add-box"><span class="plus">+</span></div>
            <button class="add-btn">ADD NEW</button>
        </section>

        <!-- Overlay Modal -->
        <div class="facilities-overlay" style="display:none;">
            <div class="facilities-modal">
                <h2 id="modalTitle">Add Facility</h2>

                <form id="facilityForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="facility_id">

                    <input type="text" name="faculty_name" placeholder="Faculty Name" required>
                    <input type="text" name="type" placeholder="Type" required>
                    <input type="text" name="location" placeholder="Location" required>
                    <input type="text" name="time_open" placeholder="Time Limit" required>

                    <input type="file" name="image" accept="image/*">
                    <img id="previewImg" style="max-width:200px; display:block; margin: 10px auto;">

                    <div style="text-align:center; margin-top:10px;">
                        <button type="submit">Save</button>
                        <button type="button" id="cancelBtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/facilities-overlay.js') }}"></script>
</body>
</html>
