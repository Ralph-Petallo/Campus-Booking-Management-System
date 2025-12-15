<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Facility;
use App\Models\Student;
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
            'student_id' => 'required|exists:students,student_id',
            'administrator_name' => 'required|exists:facilities,administrator_name',
            'facility_name' => 'required|exists:facilities,facility_name',
            'date' => 'required|date',
            'time_in' => 'required',
            'time_out' => 'required',
        ]);

        // Resolve related models
        $student = Student::where('student_id', $request->student_id)->firstOrFail();
        $facility = Facility::where('facility_name', $request->facility_name)->firstOrFail();

        // Create booking
        $book = Booking::create([
            'student_id' => $student->id,
            'facility_id' => $facility->id,
            'date' => $request->date,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,
            'status' => 'PENDING',
        ]);

        // Create booking
        Notification::create([
            'student_id' => $student->id,
            'booking_id' => $book->id,
            'action' => 'RESERVED',
            'recipient_id' => $student->id,
            'is_read' => false,
        ]);

        return redirect()->route('student.booking-confirmation', $book->id);
    }

    public function bookingSlip($id)
    {

        if(!$id){
            return redirect()->route('dashboard');
        }

        $booking = Booking::where('id', $id)->first();

        return view('students.booking-confirmation', compact('booking'));
    }


    public function storeBook(Request $request)
    {
        Booking::create([
            'student_id' => $request->student_id,
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
