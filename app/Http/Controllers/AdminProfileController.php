<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Model\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $admin = Auth::guard('admin')->user(); //to get current auth admin

        return view('admin.profile', compact('admin'));
    }


    public function adminChangePass(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        if (!Hash::check($request->old_password, $admin->password)) {
            return back()->with('error', 'Old password is incorrect.');
        }

        $admin->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }


    public function adminEditProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $admin->id,
        ]);

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        return back()->with('success', 'Profile updated successfully.');
    }

    public function adminChangeProfile(Request $request)
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'profile_picture' => 'required|image|max:2048',
        ]);

        $file = $request->file('profile_picture');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/admin_profiles'), $fileName);

        $admin->profile_picture = 'uploads/admin_profiles/' . $fileName;
        $admin->save();

        return back()->with('success', 'Profile picture updated successfully.');
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }


}
