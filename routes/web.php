<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminProfileController;

//Admin side

Route::get('/admin/login', [FacilityController::class, 'loginPage'])
    ->name('admin.login');

Route::post('/admin/login/request', [FacilityController::class, 'loginRequest'])
    ->name('admin.login.submit');

Route::get('/admin/register', [FacilityController::class, 'registerPage'])
    ->name('admin.register');

Route::post('/admin/register/submit', [FacilityController::class, 'registerRequest'])
    ->name('admin.register.submit');

// Authentication
Route::prefix('admin')
    ->middleware('auth:admin') // fixed middleware syntax
    ->group(function () {

        // Rooms
        Route::get('/', [FacilityController::class, 'welcomePage'])->name('admin.welcome');
        Route::get('dashboard', [FacilityController::class, 'dashBoard'])->name('dashboard');
        Route::get('lrc', [FacilityController::class, 'lrc'])->name('lrc');
        Route::get('acadhall', [FacilityController::class, 'acadhall'])->name('acadhall');
        Route::get('innovative', [FacilityController::class, 'innovative'])->name('innovative');
        Route::get('conference', [FacilityController::class, 'conference'])->name('conference');
        Route::get('gym', [FacilityController::class, 'gym'])->name('gym');
        Route::get('discussion', [FacilityController::class, 'discussion'])->name('discussion');

        // Booking pages
        Route::get('booking-history', [FacilityController::class, 'bookingHistory'])->name('bookinghistory');
        Route::get('bookings', [FacilityController::class, 'bookings'])->name('bookings');
        Route::put(
            'bookings/{id}/confirm',
            [FacilityController::class, 'confirm']
        )->name('admin.bookings.confirm');

        Route::put(
            'bookings/{id}/cancel',
            [FacilityController::class, 'cancel']
        )->name('admin.bookings.cancel');

        // Facilities
        Route::get('facilities/academic-hall', [FacilityController::class, 'academicHall'])
            ->name('facilities.academic_hall');

        // Notifications & profile
        Route::get('notifications', [FacilityController::class, 'notifications'])->name('notifications');
        Route::get('profile', [AdminProfileController::class, 'profile'])->name('profile');

        // Facility manager (dynamic)
        Route::get('facility/{id}', [FacilityController::class, 'facilityView'])
            ->name('facility.view');

        // Facilities list & store
        Route::get('facilities', [FacilityController::class, 'index'])->name('facilities');
        Route::post('facilities', [FacilityController::class, 'store'])->name('facilities.store');
        Route::post('facilities/update/{id}', [FacilityController::class, 'update'])->name('facilities.update');
        Route::delete('acilities/delete/{id}', [FacilityController::class, 'destroy'])->name('facilities.delete');
    });



// =====================
// STUDENT AUTH
// =====================
Route::get('/login', [StudentController::class, 'showLogin'])
    ->name('login');

Route::post('/login-process', [StudentController::class, 'login'])
    ->name('student.login.process');


// =====================
// STUDENT AREA
// =====================
Route::prefix('student')->middleware('auth:student')->group(function () {

    Route::get('/welcome', [StudentController::class, 'welcome'])
        ->name('student.welcome');

    Route::get('/home-page', [StudentController::class, 'index'])
        ->name('student.homepage');

    Route::get('/profile', [StudentController::class, 'profile'])
        ->name('student.profile');

    Route::get('/profile-edit', [StudentController::class, 'profileEdit'])
        ->name('student.profile-edit');

    Route::get('/profile-account', [StudentController::class, 'profileAccount'])
        ->name('student.profile-account');

    Route::get('/profile-info', [StudentController::class, 'profileInfo'])
        ->name('student.profile_info');

    Route::get('/notifications', [StudentController::class, 'studentNotifications'])
        ->name('student.notifications');

    Route::get('/booking-form', [StudentController::class, 'bookingForm'])
        ->name('student.booking-form');

    Route::get('/facility-details/{id}', [FacilityController::class, 'show'])
        ->name('student.facility-details');

    Route::get('/booking-form/create/{id}', [BookingController::class, 'create'])
        ->name('student.booking-form.create');

    Route::post('/booking-form/store', [BookingController::class, 'store'])
        ->name('student.booking-form.store');

    Route::get('bookings/history', [StudentController::class, 'history'])
        ->name('student.booking-history');

    //booking confirmation page
    Route::get('/booking-confirmation/{id}', [BookingController::class, 'bookingSlip'])
        ->name('student.booking-confirmation');
    //cancelled page
    Route::get('/booking-cancellation/{id}', [BookingController::class, 'bookingSlip'])
        ->name('student.booking-cancel');
    //pending page
    Route::get('/booking-confirmation/{id}', [BookingController::class, 'bookingSlip'])
        ->name('student.booking-confirmation');
});
