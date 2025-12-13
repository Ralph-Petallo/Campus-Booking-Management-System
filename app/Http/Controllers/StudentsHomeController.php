<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class StudentsHomeController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('students.homepage', compact('facilities'));
    }
}
