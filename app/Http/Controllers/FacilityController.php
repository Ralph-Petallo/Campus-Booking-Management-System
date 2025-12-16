<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\Admin;
use App\Models\Booking;
use App\Models\Notification;


class FacilityController extends Controller
{

    public function welcomePage()
    {
        return view('admin.welcome');
    }

    public function loginPage()
    {
        return view('admin.login');
    }

    public function registerPage()
    {
        return view('admin.register');
    }

    public function lrc()
    {
        return view('admin.lrc');
    }
    public function acadhall()
    {
        return view('admin.acadhall');
    }
    public function innovative()
    {
        return view('admin.innovative');
    }
    public function conference()
    {
        return view('admin.conference');
    }
    public function gym()
    {
        return view('admin.gym');
    }
    public function discussion()
    {
        return view('admin.discussion');
    }

    // Booking pages
    public function bookingHistory()
    {
        $booking_history = Booking::with(['student'])
            ->latest()
            ->get();

        return view('admin.bookinghistory', compact('booking_history'));
    }
    public function bookings()
    {
        $bookings = Booking::with(['student', 'facility'])
            ->latest()
            ->get();

        return view('admin.bookings', compact('bookings'));
    }

    public function confirm($id)
    {
        if (!$id) {
            return redirect()->route('dashboard');
        }

        $book = Booking::where('id', $id);
        $book->update([
            'status' => 'CONFIRMED'
        ]);

        Notification::create([
            'booking_id' => $id,
            'action' => 'CONFIRMED',
            'recipient_id' => $id,
            'is_read' => true,
        ]);

        return back()->with('success', 'Booking confirmed.');
    }

    public function cancel($id)
    {
        if (!$id) {
            return redirect()->route('dashboard');
        }

        $book = Booking::where('id', $id);

        $book->update([
            'status' => 'CANCELLED'
        ]);

        Notification::create([
            'booking_id' => $id,
            'action' => 'CANCELLED',
            'recipient_id' => $id,
            'is_read' => true,
        ]);

        return back()->with('success', 'Booking cancelled.');
    }


    // Facilities
    public function academicHall()
    {
        return view('admin.facilities.academic_hall');
    }

    // Others
    public function notifications()
    {
        // Fetch notifications for admin (or all)
        $notifications = Notification::with('booking.facility')
            ->where('recipient_id', auth()->guard('student')->user()->id)
            ->latest()
            ->get();

        return view('admin.notifications', compact('notifications'));
    }

    public function viewBookingSlip($id)
    {

        if (!$id) {
            return redirect()->route('dashboard');
        }

        $booking = Booking::where('id', $id)->first();

        return view('admin.notification-about', compact('booking'));
    }

    public function dashBoard()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $facilities = Facility::all();
        return view('admin.dashboard', compact('facilities'));
    }


    public function loginRequest(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::guard('admin')->attempt($valid)) {
            $request->session()->regenerate();
            return redirect()->route('admin.welcome');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
    }

    public function registerRequest(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:50',
            'email' => 'required|unique:admin|email',
            'password' => 'required|min:6|confirmed',
        ]);

        Admin::create([
            'username' => $credentials['username'],
            'email' => $credentials['email'],
            'password' => Hash::make($credentials['password'])
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please log in.');
    }

    public function index()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.login');
        }

        $facilities = Facility::all();
        return view('admin.facilities', compact('facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'administrator_name' => 'required',
            'facility_name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'time_open' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $fileName = $this->uploadImage($request);

        Facility::create([
            'administrator_name' => $request->administrator_name,
            'facility_name' => $request->facility_name,
            'type' => $request->type,
            'location' => $request->location,
            'time_open' => $request->time_open,
            'image' => $fileName
        ]);

        return redirect()->back()->with('success', 'Facility added successfully.');
        ;
    }

    public function update(Request $request, $id)
    {
        if (!$id) {
            return redirect()->route('dashboard');
        }

        $facility = Facility::findOrFail($id);

        $request->validate([
            'administrator_name' => 'required',
            'facility_name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'time_open' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $fileName = $facility->image;

        if ($request->hasFile('image')) {
            $fileName = $this->uploadImage($request);
        }

        $facility->update([
            'administrator_name' => $request->administrator_name,
            'facility_name' => $request->facility_name,
            'type' => $request->type,
            'location' => $request->location,
            'time_open' => $request->time_open,
            'image' => $fileName
        ]);

        return redirect()->back();
    }

    public function facilityView($id)
    {
        if (!$id) {
            return redirect()->route('dashboard');
        }

        $facility = Facility::findOrFail($id);
        return view('admin.facility-view', compact('facility'));
    }

    public function destroy($id)
    {
        Facility::findOrFail($id)->delete();
        return redirect()->back();
    }

    private function uploadImage($request)
    {
        if (!$request->hasFile('image')) {
            return 'default.png';
        }

        $fileName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/facilities'), $fileName);
        return $fileName;
    }

    public function show($id)
    {
        $facility = Facility::findOrFail($id); // fetch from database
        return view('students.facility-details', compact('facility'));
    }
}
