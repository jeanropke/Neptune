<?php

namespace App\Http\Controllers;

use App\Models\Furni\Photo;
use App\Models\Neptune\Fansite;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function photos()
    {
        $photos = Photo::with('furni')->latest('timestamp')->limit(20)->get();

        return view('community.photos', compact('photos'));
    }

    public function fansites()
    {
        $fansites = Fansite::all();

        return view('community.fansites', compact('fansites'));
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
