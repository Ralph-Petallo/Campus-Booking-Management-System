<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Check student in WAMP DB
        $student = DB::table('students')
            ->where('email', $request->email)
            ->where('password', $request->password) // plain text password
            ->first();

        if (!$student) {
            return back()->with('error', 'Invalid email or password.');
        }

        // Store student info in session
        session([
            'student_id' => $student->student_id,
            'student_name' => $student->name,
            'student_email' => $student->email
        ]);

        // Redirect to homepage
        return redirect()->route('students.welcome');
    }
}
