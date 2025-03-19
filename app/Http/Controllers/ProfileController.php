<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function figure($page = 'figure')
    {
        $possiblePages = ['figure', 'motto', 'password', 'email'];
        if (!in_array($page, $possiblePages))
            return view('errors.404');


        return view("profile.{$page}")->with('page', $page);
    }

    public function save($page = 'index', Request $request)
    {
        $possiblePages = ['figure', 'motto', 'password', 'email'];

        if (!in_array($page, $possiblePages))
            return view('errors.404');

        switch ($page) {
            case 'figure':

                $request->validate([
                    'newGender'    => 'required|in:F,M',
                    'newFigure'    => 'required|numeric'
                ]);

                user()->setLook($request->newFigure, $request->newGender);
                return redirect()->back()->with('status', 'Figure updated!');
                break;

            case 'motto':
                user()->setMotto($request->motto ?? '');
                return redirect()->back()->with('status', 'Motto updated!');
                break;

            case 'email':
                $request->validate([
                    'email' => 'required|unique:users,mail|regex:/(.+)@(.+)\.(.+)/i'
                ]);
                Auth::user()->update(['mail' => $request->email]);
                return redirect()->back()->with('status', 'Email updated!');
                break;

            case 'password':
                $request->validate([
                    'currentpassword'    => 'required',
                    'newpassword'        => 'required|min:8|max:30',
                    'newpasswordconfirm' => 'required|min:8|max:30|same:newpassword'
                ]);
                if (!Hash::check(Auth::user()->password, $request->currentpassword)) {
                    Auth::user()->update(['password' => Hash::make($request->currentpassword)]);
                    return redirect()->back()->with('status', 'Password updated!');
                }
                return redirect()->back()->withErrors('Wrong password!');
                break;

            default:
                return redirect()->back();
                break;
        }
    }
}
