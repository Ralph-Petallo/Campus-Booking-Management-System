<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\Booking;

class BookingController extends Controller
{
    public function create($facilityId)
    {
        $facility = Facility::findOrFail($facilityId);
        return view('students.booking-form', compact('facility'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'student_name' => 'required|string|max:255',
            'facility_name' => 'required|string|amx:255',
            'date' => 'required|date',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        $book = Booking::create([
            'student_id' => $request->student_id,
            'student_name' => $request->student_name,
            'facility' => $request->facility_name,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
        ]);

        return redirect()->route('student.booking-confirmation', ['id'=>$book->id]);
    }

    public function bookingSlip($id)
    {
        $booking = Booking::where('id',$id)->first();
        
        return view('students.booking-confirmation', compact('booking'));
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
        $student = Auth::guard('student')->user();

        $bookings = Booking::where('student_id', $student->student_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('students.booking-history', compact('bookings'));
    }

}
