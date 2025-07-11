<?php

namespace App\Http\Controllers;

use App\Models\Neptune\HelpTicket;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class HelpController extends Controller
{
    public function index()
    {
        return view('help.index');
    }

    public function hotelWay()
    {
        return view('help.hotel_way');
    }

    public function tool()
    {
        return view('help.tool');
    }

    public function contactUs()
    {
        return view('help.contact_us');
    }

    public function lawEnforcementContact()
    {
        return view('help.lawenforcementcontact');
    }

    public function iotGo()
    {
        return view('help.iot.go');
    }

    public function iotNext(Request $request)
    {
        switch ($request->sid) {
            case 0:
                return view('help.iot.go');
                break;
            case 58:
                if ($request->event == 'Not member') {
                    session(['is_member' => false]);
                    return view('help.iot.step2_notmember');
                } elseif ($request->event == 'Member') {
                    session(['is_member' => true]);
                    return view('help.iot.step2');
                }

                if ($request->event == 'change') {
                    if (session('is_member')) {
                        return view('help.iot.step2');
                    } else {
                        return view('help.iot.step2_notmember');
                    }
                }
                break;

            case 26:
                session(['email' => $request->email, 'name' => $request->name]);
                return view('help.iot.step3');
                break;

            case 76:
                if (!$request->issue)
                    return view('help.iot.step3');

                session(['issue' => $request->issue]);
                return view('help.iot.step4');
                break;

            case 63:
                if (!$request->message)
                    return view('help.iot.step4');

                HelpTicket::create([
                    'username'  => session('name'),
                    'email'     => session('email'),
                    'issue'     => session('issue'),
                    'message'   => $request->message,
                ]);

                session()->forget(['name', 'email', 'issue']);

                return view('help.iot.done');

                break;
        }

        return redirect()->back();
    }
}
