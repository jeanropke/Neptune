<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    public function home()
    {
        return view('index');
    }

    public function maintenance()
    {
        if(Auth::check())
        {
            if (user()->hasPermission('can_access_housekeeping')) {
                return redirect('/');
            }
            return view('maintenance');
        }

        if(!cms_config('site.maintenance.enabled'))
            return redirect('/');

        return view('maintenance');
    }
}
