<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RemoteController extends Controller
{
    public function ban()
    {
        $lengths = array('2 Hours', '4 Hours', '12 Hours', '24 Hours', '2 Days', '7 Days', '2 Weeks', '1 Month', '6 Month', '1 Year', 'Permenantly (25 Years)');
        return view('housekeeping.moderation.remote.ban')->with('lengths', $lengths);
    }

    public function banPost(Request $request)
    {
        $request->validate([
            'id'        => 'required|numeric',
            'reason'    => 'required'
        ]);

        $ban = UserBan::find($request->id);
        if($ban)
            return redirect()->route('housekeeping.moderation.remote.ban')->with('message', 'User already banned!');

        $user = User::find($request->id);
        if(!$user)
            return redirect()->route('housekeeping.moderation.remote.ban')->with('message', 'User not found!');

        if($user->id == user()->id)
            return redirect()->route('housekeeping.moderation.remote.ban')->with('message', 'You can\'t ban yourself, you moron!');

        if($user->rank >= user()->rank)
            return redirect()->route('housekeeping.moderation.remote.ban')->with('message', 'You can\'t ban a user with a rank equal to or higher than yours!');

        // Lengths in seconds
        $lengths = array(7200, 14400, 43200, 86400, 172800, 604800, 1209600, 2678400, 16070400, 31536000, 788400000);

        UserBan::insert([
            'ban_type'      => 'USER_ID',
            'banned_value'  => $user->id,
            'message'       => $request->reason,
            'banned_until'  => time() + $lengths[$request->length]
        ]);

        return redirect()->route('housekeeping.moderation.remote.ban')->with('message', 'User banned!');
    }

    public function unban()
    {
        return view('housekeeping.moderation.remote.unban');
    }

    public function unbanPost(Request $request)
    {
        $ban = UserBan::find($request->input);
        if(!$ban)
            return redirect()->route('housekeeping.moderation.unban')->with('message', 'User not found!');

        $ban->delete();

        return redirect()->route('housekeeping.moderation.unban')->with('message', 'User unbanned!');
    }
}
