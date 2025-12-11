<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index() {
        $facilities = Facility::all();
        return view('admin.facilities', compact('facilities'));
    }

    public function store(Request $request) {
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

        return redirect()->back();
    }

    public function update(Request $request, $id) {
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

    public function destroy($id) {
        Facility::findOrFail($id)->delete();
        return redirect()->back();
    }

    private function uploadImage($request) {
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
