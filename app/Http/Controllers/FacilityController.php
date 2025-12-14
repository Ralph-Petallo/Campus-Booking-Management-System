<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\Admin;

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
        return view('admin.bookinghistory');
    }
    public function booking()
    {
        return view('admin.booking');
    }
    public function bookings()
    {
        return view('admin.bookings');
    }

    // Facilities
    public function academicHall()
    {
        return view('admin.facilities.academic_hall');
    }

    // Others
    public function notifications()
    {
        return view('admin.notifications');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function loginRequest(Request $request)
    {
        $valid = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);


        if (Auth::guard('admin')->attempt($valid)) {
            $request->session()->regenerate();
            return redirect()->route('welcome');
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
            'password' => Hash::make($credentials['password']), // Hash the password
        ]);

        return redirect()->route('admin.login')->with('success', 'Registration successful. Please log in.');
    }


    public function index()
    {
        $facilities = Facility::all();
        return view('admin.facilities', compact('facilities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'faculty_name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'time_open' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $fileName = $this->uploadImage($request);

        Facility::create([
            'faculty_name' => $request->faculty_name,
            'type' => $request->type,
            'location' => $request->location,
            'time_open' => $request->time_open,
            'image' => $fileName
        ]);

        return redirect()->back()->with('success', 'Facility added successfully.'); ;
    }

    public function update(Request $request, $id)
    {
        $facility = Facility::findOrFail($id);

        $request->validate([
            'faculty_name' => 'required',
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
            'faculty_name' => $request->faculty_name,
            'type' => $request->type,
            'location' => $request->location,
            'time_open' => $request->time_open,
            'image' => $fileName
        ]);

        return redirect()->back();
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
