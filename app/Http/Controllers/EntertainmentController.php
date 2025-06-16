<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function habbowood()
    {
        return view('entertainment.habbowood');
    }
}
