<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\StaffLog;
use App\Models\User;
use App\Models\UserBadge;
use App\Models\UserIPLog;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function usersListing(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $users = [];
        switch ($request->type) {
            case 'ip':
                $users = User::join('users_ip_logs', 'users.id', '=', 'users_ip_logs.user_id')->where('ip_address', $request->value)->select(['users_ip_logs.created_at AS ip_created_at', 'users.*']);
                break;
            case 'username':
                $users = User::where('username', 'like', '%' . $request->value . '%');
                break;
            default:
                $users = User::orderby('id', 'DESC');
            break;
        }

        return view('housekeeping.users.listing')->with([
            'users' => $users->paginate(15)
        ]);
    }

    public function usersEdit(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $user = User::find($request->id);
        if (!$user)
            return redirect()->route('housekeeping.users.listing')->with('message',  'User not found!');

        return view('housekeeping.users.edit')->with([
            'user' => $user
        ]);
    }

    public function usersEditSave(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $user = User::find($request->id);
        if (!$user)
            return redirect()->route('housekeeping.users.listing')->with('message',  'User not found!');

        $request->validate([
            'username'      => 'required|max:255|unique:users,username,' . $user->id,
            'email'         => 'required|max:255',
            'motto'         => 'max:100',
            'console_motto' => 'max:100',
            'figure'        => 'required|max:100',
            'sex'           => 'required|in:F,M',
            'rank'          => 'required|in:1,7',
            'credits'       => 'required|numeric'
        ]);


        $user->update([
            'username'      => $request->username,
            'email'         => $request->email,
            'motto'         => $request->motto ?? '',
            'console_motto' => $request->console_motto ?? '',
            'figure'        => $request->figure,
            'sex'           => $request->sex,
            'rank'          => $request->rank,
            'credits'       => $request->credits
        ]);

        mus("refresh_looks", ['userId' => $user->id]);
        mus("refresh_credits", ['userId' => $user->id]);

        unset($request['_token']);
        StaffLog::createLog('user_edit', json_encode($request->post()));

        return redirect()->route('housekeeping.users.edit', $user->id)->with('message', 'User changed!');
    }

    public function usersIPs(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $user = User::find($request->value);
        if (!$user)
            return redirect()->route('housekeeping.users.listing')->with('message', 'User not found');

        return view('housekeeping.users.listingip')->with([
            'ips'   => UserIPLog::where('user_id', $user->id)->paginate(15),
            'user'  => $user
        ]);
    }

    public function toolsBadge(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        if (!$request->id)
            return view('housekeeping.users.badges');

        $user = User::find($request->id);
        if (!$user)
            return view('housekeeping.users.badges')->with('message', 'User not found');

        return view('housekeeping.users.badges')->with('user', $user);
    }

    public function toolsBadgeGive(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'badge'     => 'required|alpha_num|max:3',
            'username'  => 'required'
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user)
            return redirect()->back()->with('message', 'User no found!');

        $result = $user->giveBadge($request->badge);

        if (!$result)
            return redirect()->back()->with('message', 'User already have this badge!');

        return redirect()->route('housekeeping.users.badges', $user->id)->with('message', 'Badge given to user!');
    }

    public function toolsBadgeRemove(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $user = User::find($request->id);

        if (!$user)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This user does not exist!']);

        $badge = UserBadge::where([['badge', '=', $request->code], ['user_id', '=', $user->id]])->get();
        if ($badge->count() == '0')
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This user does not have this badge!']);

        UserBadge::where([['badge', '=', $request->code], ['user_id', '=', $user->id]])->delete();

        unset($request['_token']);
        StaffLog::createLog('users.badges.remove', json_encode($request->post()));
        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Badge removed!']);
    }

    public function toolsMass()
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied');

        return view('housekeeping.users.mass');
    }

    public function toolsMassPost(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied_dialog');

        return redirect()->back()->with('message', 'Not implemented yet! Kepler does not save on database which user is online.');
    }
}
