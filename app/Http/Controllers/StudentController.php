<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\Booking;
use App\Models\Notification;

class StudentController extends Controller
{
    // =====================
    // AUTH / PAGES
    // =====================
    public function showLogin()
    {
        return view('students.login');
    }

    public function welcome()
    {
        return view('students.welcome');
    }

    public function profile()
    {
        return view('students.profile');
    }

    public function profileEdit()
    {
        return view('students.profile-edit');
    }

    public function profileAccount()
    {
        return view('students.profile-account');
    }

    public function profileInfo()
    {
        return view('students.profile-info');
    }

    public function bookingForm()
    {
        return view('students.booking-form');
    }

    // =====================
    // LOGIN
    // =====================
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('student.welcome');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // =====================
    // HOMEPAGE
    // =====================
    public function index()
    {
        $facilities = Facility::all();
        return view('students.homepage', compact('facilities'));
    }

    // =====================
    // NOTIFICATIONS
    // =====================
    public function studentNotifications()
    {
        $student = Auth::guard('student')->user();

        $notifications = Notification::with('booking')
            ->where('recipient_id', $student->id)
            ->latest()
            ->get();

        return view('students.notifications', compact('notifications'));
    }

    // =====================
    // BOOKING HISTORY
    // =====================
    public function history()
    {
        $student = Auth::guard('student')->user();

        $bookings = Booking::where('student_id', $student->student_id)
            ->latest()
            ->get();

        return view('students.booking-history', compact('bookings'));
    }

}
