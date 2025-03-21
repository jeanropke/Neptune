<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    public function index()
    {
        return view('club.index');
    }

    private function getCurrentChoice($choice)
    {
        $credits = -1;
        $days = -1;

        switch ($choice) {
            default:
            case 1:
                $credits = 25;
                $days = 31;
                break;
            case 2:
                $credits = 60;
                $days = 93;
                break;
            case 3:
                $credits = 105;
                $days = 186;
                break;
        }

        return array(
            'credits'   => $credits,
            'days'      => $days,
        );
    }

    public function clubSubscribe(Request $request)
    {
        $choice = $this->getCurrentChoice($request->optionNumber);
        return view('club.ajax.subscribe_form')->with([
            'month' => $choice['days'] / 31,
            'optionNumber' => $request->optionNumber,
            'days'  => $choice['days'],
            'price' => $choice['credits']
        ]);
    }

    public function clubSubscribeSubmit(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('account.login');

        $choice = $this->getCurrentChoice($request->optionNumber);

        if(user()->credits >= $choice['credits'])
        {
            user()->giveHCDays($choice['days']);
            user()->updateCredits(-$choice['credits']);

            return view('club.ajax.subscribe_success');
        }
    }

    public function clubMeterUpdate()
    {
        return view('club.ajax.habboclub_meter');
    }

    public function join()
    {
        return view('club.join');
    }

    public function shop()
    {
        return view('club.shop');
    }

    public function benefitsHabbo()
    {
        return view('club.benefitshabbo');
    }

    public function benefitsRoom()
    {
        return view('club.benefitsroom');
    }

    public function benefitsHome()
    {
        return view('club.benefitshome');
    }

    public function benefitsExtras()
    {
        return view('club.benefitsextras');
    }
}
