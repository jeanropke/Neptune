<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (user()) {
            return redirect()->route('housekeeping.dashboard');
        }

        return view('housekeeping.login');
    }

    public function doLogin(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (user()->hasPermission('can_access_housekeeping')) {
                return redirect()->route('housekeeping.index');
            }

            Auth::logout();
            return redirect()->route('index.home');
        }

        return back()->withErrors([
            'error' => trans('Username or password wrong'),
        ])->withInput();
    }
}
