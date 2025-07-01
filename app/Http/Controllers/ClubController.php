<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClubController extends Controller
{
    protected array $plans = [
        1 => ['credits' => 25,  'days' => 31],
        2 => ['credits' => 60,  'days' => 93],
        3 => ['credits' => 105, 'days' => 186],
    ];

    private function getPlan(int $option): array
    {
        return $this->plans[$option] ?? $this->plans[1];
    }

    public function clubSubscribe(Request $request)
    {
        $optionNumber = (int) $request->optionNumber;
        $plan = $this->getPlan($optionNumber);

        return view('club.ajax.subscribe_form', [
            'month'        => $plan['days'] / 31,
            'optionNumber' => $optionNumber,
            'days'         => $plan['days'],
            'price'        => $plan['credits'],
        ]);
    }

    public function clubSubscribeSubmit(Request $request)
    {
        $user = user();

        if (!$user) {
            return redirect()->route('account.login');
        }

        $optionNumber = (int) $request->optionNumber;
        $plan = $this->getPlan($optionNumber);

        if ($user->credits < $plan['credits']) {
            return response()->json(['error' => 'Insufficient credits.'], 400);
        }

        $user->giveHCDays($plan['days']);
        $user->updateCredits(-$plan['credits']);

        return view('club.ajax.subscribe_success');
    }

    public function shop()
    {
        return view('club.shop');
    }
}
