<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClubController extends Controller
{
    public function index()
    {
        return view('club.index');
    }

    public function clubSubscribe(Request $request)
    {
        $subscription = DB::table('catalog_club_offers')->find($request->optionNumber);
        if(!$subscription)
            return 'Nice try!';

        return view('club.ajax.subscribe_form')->with([
            'month' => $subscription->days / 31,
            'optionNumber' => $subscription->id,
            'days'  => $subscription->days,
            'price' => $subscription->credits
        ]);
    }

    public function clubSubscribeSubmit(Request $request)
    {
        if(!Auth::check())
            return redirect()->route('account.login');

        $subscription = DB::table('catalog_club_offers')->find($request->optionNumber);
        if(!$subscription)
            return 'Nice try!';

        if(user()->credits >= $subscription->credits)
        {
            user()->giveHCDays($subscription->days);
            user()->updateCredits(-$subscription->credits);

            return view('club.ajax.subscribe_success');
        }
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
