<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentLoginController;
use App\Http\Controllers\StudentsHomeController;
use App\Http\Controllers\FacilityManagerController;
use App\Http\Controllers\BookingController;


//Admin side


// Authentication
Route::get('/admin/login', [FacilityController::class, 'loginPage'])
    ->name('admin.login');

Route::post('/admin/login/request', [FacilityController::class, 'loginRequest'])
    ->name('admin.login.submit');

Route::get('/admin/register', [FacilityController::class, 'registerPage'])
    ->name('admin.register');

Route::post('/admin/register/submit', [FacilityController::class, 'registerRequest'])
    ->name('admin.register.submit');

// Rooms / individual facility pages

Route::prefix('admin')
    ->middleware('auth:admin') // fixed middleware syntax
    ->group(function () {

        // Rooms
        Route::get('/', [FacilityController::class, 'welcomePage'])->name('admin-welcome');
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('lrc', [FacilityController::class, 'lrc'])->name('lrc');
        Route::get('acadhall', [FacilityController::class, 'acadhall'])->name('acadhall');
        Route::get('innovative', [FacilityController::class, 'innovative'])->name('innovative');
        Route::get('conference', [FacilityController::class, 'conference'])->name('conference');
        Route::get('gym', [FacilityController::class, 'gym'])->name('gym');
        Route::get('discussion', [FacilityController::class, 'discussion'])->name('discussion');

        // Booking pages
        Route::get('booking-history', [FacilityController::class, 'bookingHistory'])->name('bookinghistory');
        Route::get('booking', [FacilityController::class, 'booking'])->name('booking');
        Route::get('bookings', [FacilityController::class, 'bookings'])->name('bookings');

        // Facilities
        Route::get('facilities/academic-hall', [FacilityController::class, 'academicHall'])
            ->name('facilities.academic_hall');

        // Notifications & profile
        Route::get('notifications', [FacilityController::class, 'notifications'])->name('notifications');
        Route::get('profile', [FacilityController::class, 'profile'])->name('profile');

        // Facility manager (dynamic)
        Route::get('facility/{id}', [FacilityManagerController::class, 'facilityView'])
            ->name('facility.view');


        //REQUEST 
    
        // Facilities list & store
        Route::get('facilities', [FacilityController::class, 'index'])->name('facilities');
        Route::post('facilities', [FacilityController::class, 'store'])->name('facilities.store');
        Route::post('facilities/update/{id}', [FacilityController::class, 'update'])->name('facilities.update');
        Route::delete('acilities/delete/{id}', [FacilityController::class, 'destroy'])->name('facilities.delete');

    });


//STUDENTS SIDE
Route::get('/login', function () {
    return view('students.login');
})->name('login');

Route::prefix('students')->middleware('auth:student')->group(function () {
    Route::get('/welcome', function () {
        return view('students.welcome');
    })->name('student.welcome');

    Route::get('/homepage', [StudentsHomeController::class, 'index'])
        ->name('student.homepage');

    Route::get('/profile', function () {
        return view('students.profile');
    })->name('student.profile');

    Route::get('/profile-edit', function () {
        return view('students.profile-edit');
    })->name('student.profile-edit');

    Route::get('/profile-account', function () {
        return view('students.profile-account');
    })->name('student.profile-account');

    Route::get('/profile-info', function () {
        return view('students.profile-info');
    })->name('student.profile_info');

    Route::get('/notifications', function () {
        return view('students.notifications');
    })->name('student.notifications');

    Route::get('/booking-form', function () {
        return view('students.booking-form');
    })->name('student.booking-form');

    Route::get('/booking-confirmation', [BookingController::class, 'bookingSlip'])
        ->name('student.booking-confirmation');

    // Facility details route — do NOT nest another prefix
    Route::get('/facility-details/{id}', [FacilityController::class, 'show'])
        ->name('student.facilit_details');

    Route::get('/booking-form/create/{id}', [BookingController::class, 'create'])
        ->name('student.booking-form.create');

    Route::post('/booking-form/store/', [BookingController::class, 'store'])
        ->name('student.booking-form.store');

    Route::post('/login-process', [StudentLoginController::class, 'login'])
        ->name('login.process');

    Route::post('/booking/storeBook', [BookingController::class, 'storeBook'])
        ->name('student.booking-form.storeBook');

    Route::get('bookings/history', [BookingController::class, 'history'])
        ->name('student.booking-history');
});
