<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;
use App\Models\Booking;

class BookingController extends Controller
{
    public function create($facilityId)
    {
        $facility = Facility::findOrFail($facilityId);
        return view('students.booking-form', compact('facility'));
    }

    public function store(Request $request, $facilityId)
    {
        $request->validate([
            'student_id' => 'required',
            'student_name' => 'required',
            'date' => 'required|date',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        Booking::create([
            'student_id' => $request->student_id,
            'student_name' => $request->student_name,
            'facility_id' => $facilityId,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);

        return redirect()->route('students.booking-confirmation');
    }

    public function storeBook(Request $request)
    {
        Booking::create([
            'student_id' => $request->student_id,
            'student_name' => $request->student_name,
            'facility' => $request->facility,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'status' => 'PENDING',
        ]);

        return redirect()->route('students.booking-history');
    }

    public function history()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return view('students.booking-history', compact('bookings'));
    }

}
