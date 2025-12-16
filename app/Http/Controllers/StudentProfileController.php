<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentProfileController extends Controller
{

    public function profile()
    {
        $student = Auth::guard('student')->user();
        return view('students.profile', compact('student'));
    }

    public function profileEditPage()
    {
        $student = Auth::guard('student')->user();
        return view('students.profile-edit', compact('student'));
    }

    public function profileChangePassPage()
    {
        return view('students.profile-change-pass');
    }

    public function profileEdit(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'course' => 'required|string|max:255',
            'year' => 'required|string|max:255',
            'department' => 'required|string|max:255',
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'course' => $request->course,
            'year' => $request->year,
            'department' => $request->department,
        ]);

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }


    public function profileInfo(Request $request)
    {
        $student = Auth::guard('student')->user();

        return view('students.profile-info', compact('student'));
    }

    public function changePass(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $student->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        $student->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()
            ->route('student.profile')
            ->with('success', 'Password changed successfully.');
    }

    public function updateProfilePicture(Request $request)
    {
        $student = Auth::guard('student')->user();

        $request->validate([
            'profile_picture' => 'required|image|max:2048',
        ]);

        $fileName = time() . '_' . $request->profile_picture->getClientOriginalName();
        $request->profile_picture->move(
            public_path('uploads/profile_pictures'),
            $fileName
        );

        $student->update([
            'profile_picture' => 'uploads/profile_pictures/' . $fileName
        ]);

        return redirect()
            ->route('student.profile')
            ->with('success', 'Profile picture updated successfully.');
    }



}
