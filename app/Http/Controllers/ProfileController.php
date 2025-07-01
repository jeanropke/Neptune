<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function figure(string $page = 'figure')
    {
        $allowedPages = ['figure', 'motto', 'password', 'email'];

        if (!in_array($page, $allowedPages)) {
            abort(404);
        }

        return view("profile.{$page}", compact('page'));
    }

    public function save(string $page = 'index', Request $request)
    {
        $allowedPages = ['figure', 'motto', 'password', 'email'];

        if (!in_array($page, $allowedPages)) {
            abort(404);
        }

        $user = user();

        switch ($page) {
            case 'figure':
                $validated = $request->validate([
                    'newGender' => 'required|in:F,M',
                    'newFigure' => 'required|numeric',
                ]);

                $user->setLook($validated['newFigure'], $validated['newGender']);
                return back()->with('status', 'Figure updated!');

            case 'motto':
                $motto = $request->input('motto', '');
                $user->setMotto($motto ?? '');
                return back()->with('status', 'Motto updated!');

            case 'email':
                $validated = $request->validate([
                    'email' => 'required|email|unique:users,email',
                ]);

                $user->update(['email' => $validated['email']]);
                return back()->with('status', 'Email updated!');

            case 'password':
                $validated = $request->validate([
                    'currentpassword'    => 'required',
                    'newpassword'        => 'required|min:8|max:30',
                    'newpasswordconfirm' => 'required|same:newpassword',
                ]);

                if (!Hash::check($validated['currentpassword'], $user->password)) {
                    return back()->withErrors(['currentpassword' => 'Wrong password!']);
                }

                $user->update(['password' => Hash::make($validated['newpassword'])]);
                return back()->with('status', 'Password updated!');
        }

        return back();
    }
}
