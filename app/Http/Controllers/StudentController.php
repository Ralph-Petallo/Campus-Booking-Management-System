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

    public function bookingForm()
    {
        return view('students.booking-form');
    }

    public function studentLogout(request $request)
    {
        Auth::guard('student')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('student.login');

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
    public function notification()
    {
        $recipient = auth()->guard('student')->user()->id;
        $notifications = Notification::with(['booking'])
            ->where('recipient_id', $recipient)
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

        $bookings = Booking::with('student', 'facility') // eager load relationships
            ->where('student_id', $student->id)
            ->latest()
            ->get();

        return view('students.booking-history', compact('bookings'));
    }

}
