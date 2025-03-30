<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check())
            return redirect('housekeeping/dashboard');

        return view('housekeeping.login');
    }
    public function doLogin(Request $request)
    {

        $validator = $request->validate([
            'username'  => 'required',
            'password'  => 'required'
        ]);

        if (Auth::attempt($validator)) {
            if (user()->hasPermission('can_access_housekeeping'))
                return redirect()->route('housekeeping.index');

            Auth::logout();
            return redirect()->route('index.home');
        } else {
            return redirect()->back()->withErrors(['error' => trans('Username or password wrong')]);
        }
    }
}
