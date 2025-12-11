<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityManagerController;
use App\Http\Controllers\BookingController;

// ===================== DYNAMIC PAGES =====================

// Dashboard (needs $facilities)
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// Facilities list & store
Route::get('/admin/facilities', [FacilityController::class, 'index'])->name('admin.facilities');
Route::post('/admin/facilities', [FacilityController::class, 'store'])->name('admin.facilities.store');
Route::post('/admin/facilities/update/{id}', [FacilityController::class, 'update'])->name('admin.facilities.update');
Route::delete('/admin/facilities/delete/{id}', [FacilityController::class, 'destroy'])->name('admin.facilities.delete');

// ===================== STATIC PAGES =====================

// Home / Welcome
Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/welcome', function () {
    return view('admin.welcome');
})->name('admin.welcome');

// Authentication
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/admin/login/submit', function () {
    return redirect()->route('admin.welcome');
})->name('admin.login.submit');

Route::get('/admin/register', function () {
    return view('admin.register');
})->name('admin.register');

Route::post('/admin/register/submit', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);
    return redirect()->route('admin.login')->with('success', 'Registration successful! Please log in.');
})->name('admin.register.submit');

// Rooms / individual facility pages
Route::get('/admin/lrc', function () {
    return view('admin.lrc');
})->name('admin.lrc');

Route::get('/admin/acadhall', function () {
    return view('admin.acadhall');
})->name('admin.acadhall');

Route::get('/admin/innovative', function () {
    return view('admin.innovative');
})->name('admin.innovative');

Route::get('/admin/conference', function () {
    return view('admin.conference');
})->name('admin.conference');

Route::get('/admin/gym', function () {
    return view('admin.gym');
})->name('admin.gym');

Route::get('/admin/discussion', function () {
    return view('admin.discussion');
})->name('admin.discussion');

Route::get('/admin/bookinghistory', function () {
    return view('admin.bookinghistory');
})->name('admin.bookinghistory');

Route::get('/admin/booking', function () {
    return view('admin.booking');
})->name('admin.booking');

Route::get('/admin/facilities/academic-hall', function () {
    return view('admin.facilities.academic_hall');
})->name('admin.facilities.academic_hall');

Route::get('/admin/bookings', function () {
    return view('admin.bookings');
})->name('admin.bookings');

Route::get('/admin/notifications', function () {
    return view('admin.notifications');
})->name('admin.notifications');

Route::get('/admin/profile', function () {
    return view('admin.profile');
})->name('admin.profile');

Route::get('/admin/facility/{id}', [FacilityManagerController::class, 'facilityView'])
    ->name('admin.facility.view');

//STUDENTS SIDE

Route::prefix('students')->name('students.')->group(function () {
    Route::get('/login', function () {
        return view('students.login');
    })->name('login');

    Route::get('/homepage', [\App\Http\Controllers\StudentsHomeController::class, 'index'])
        ->name('homepage');

    Route::get('/booking-history', function () {
        return view('students.booking-history');
    })->name('booking-history');

    Route::get('/profile', function () {
        return view('students.profile');
    })->name('profile');

    Route::get('/profile-edit', function () {
        return view('students.profile-edit');
    })->name('profile-edit');

    Route::get('/profile-account', function () {
        return view('students.profile-account');
    })->name('profile-account');
    
    Route::get('/profile-info', function () {
        return view('students.profile-info');
    })->name('profile-info');

    Route::get('/welcome', function () {
        return view('students.welcome');
    })->name('welcome');

    Route::get('/notifications', function () {
        return view('students.notifications');
    })->name('notifications');

    Route::get('/booking-form', function () {
        return view('students.booking-form');
    })->name('booking-form');

    Route::get('/booking-confirmation', function () {
        return view('students.booking-confirmation');
    })->name('booking-confirmation');

    // Facility details route — do NOT nest another prefix
    Route::get('/facility-details/{id}', [\App\Http\Controllers\FacilityController::class, 'show'])
        ->name('facility-details');

    Route::get('/booking-form/create/{facility}', [BookingController::class, 'create'])
        ->name('booking-form.create');

    Route::post('/booking-form/store/{facility}', [BookingController::class, 'store'])
        ->name('booking-form.store');
    
    Route::post('/login-process', [\App\Http\Controllers\StudentLoginController::class, 'login'])
    ->name('login.process');

    Route::post('/students/booking/storeBook', [BookingController::class, 'storeBook'])
    ->name('students.booking-form.storeBook');

    Route::get('/students/bookings/history', [BookingController::class, 'history'])
    ->name('students.booking-history');

});
