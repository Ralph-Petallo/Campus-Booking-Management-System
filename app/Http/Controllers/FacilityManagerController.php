<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facility;


class FacilityManagerController extends Controller
{
    public function facilityView($id)
    {
        $facility = Facility::findOrFail($id);
        return view('admin.facility-view', compact('facility'));
    }
}
