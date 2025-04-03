<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserBan;
use Illuminate\Http\Request;

class RemoteController extends Controller
{
    public function ban(Request $request)
    {
        if (!user()->hasPermission('can_user_ban'))
            return view('housekeeping.accessdenied');

        $user = User::where('username', $request->username)->first();

        return view('housekeeping.moderation.remote.ban')->with('user', $user);
    }

    public function banPost(Request $request)
    {
        if (!user()->hasPermission('can_user_ban'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'id'        => 'required|numeric',
            'reason'    => 'required',
            'length'    => 'required|numeric'
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

        UserBan::insert([
            'ban_type'      => 'USER_ID',
            'banned_value'  => $user->id,
            'message'       => $request->reason,
            'banned_until'  => time() + $request->length
        ]);

        create_staff_log('moderation.remote.ban', $request);

        return redirect()->route('housekeeping.moderation.remote.ban')->with('message', 'User banned!');
    }

    public function unban()
    {
        if (!user()->hasPermission('can_user_unban'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.moderation.remote.unban');
    }

    public function unbanPost(Request $request)
    {
        if (!user()->hasPermission('can_user_unban'))
            return view('housekeeping.accessdenied');

        $ban = UserBan::find($request->input);
        if(!$ban)
            return redirect()->route('housekeeping.moderation.unban')->with('message', 'User not found!');

        $ban->delete();

        create_staff_log('moderation.remote.unban', $request);

        return redirect()->route('housekeeping.moderation.unban')->with('message', 'User unbanned!');
    }
}
