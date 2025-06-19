<?php

namespace App\Http\Controllers;

use App\Models\Fansite;
use App\Models\Photo;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function photos()
    {
        return view('community.photos')->with([
            'photos' => Photo::orderBy('timestamp', 'DESC')->limit(20)->get()
        ]);
    }

    public function fansites()
    {
        return view('community.fansites')->with([
            'fansites' => Fansite::get()
        ]);
    }

    public function linktoolSearch(Request $request)
    {
        return $request->all();
    }

    public function sendlinkPreview(Request $request)
    {
        //invite_1_sent
        $request->validate([
            'invite_1_senderName'   => 'required',
            'invite_1_senderEmail'  => 'required|email',
            'invite_1_recipients'   => 'required|array|min:1|max:4',
            'invite_1_message'      => 'required'
        ]);

        return view('community.mgm_sendlink_preview');
    }

}
