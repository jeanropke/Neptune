<?php

namespace App\Http\Controllers;

use App\Models\HabbowoodMovie;
use App\Models\StaffPick;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function habbowood()
    {
        $top = HabbowoodMovie::orderBy('rating', 'DESC')->limit(10)->get();
        $staff = StaffPick::where('pick_type', 'movie')->limit(10)->get();

        return view('entertainment.habbowood')->with([
            'top'   => $top,
            'staff' => $staff
        ]);
    }
}
