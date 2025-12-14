<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Http\Model\Admin;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function profile()
    {
        $admin = Auth::guard('admin')->user(); //to get current auth admin
        
        return view('admin.profile', compact('admin'));
    }

}
