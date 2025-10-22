<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Furni;
use App\Models\User;
use App\Models\User\Badge;
use App\Models\User\IPLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function usersListing(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $users = [];
        switch ($request->type) {
            case 'ip':
                $users = User::with('ipAddresses')->join('users_ip_logs', 'users.id', '=', 'users_ip_logs.user_id')->where('ip_address', $request->value)->select(['users_ip_logs.created_at AS ip_created_at', 'users.*']);
                break;
            case 'username':
                $users = User::with('ipAddresses')->where('username', 'like', '%' . $request->value . '%');
                break;
            default:
                $users = User::with('ipAddresses')->orderBy('id', 'DESC');
                break;
        }

        return view('housekeeping.moderation.users.listing')->with([
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

        return view('housekeeping.moderation.users.edit')->with([
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

        if (is_hotel_online()) {
            rcon("refresh_looks", ['userId' => $user->id]);
            rcon("refresh_credits", ['userId' => $user->id]);
        }

        create_staff_log('users.edit.save', $request);

        return redirect()->route('housekeeping.users.edit', $user->id)->with('message', 'User changed!');
    }

    public function usersIPs(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $user = User::find($request->value);
        if (!$user)
            return redirect()->route('housekeeping.users.listing')->with('message', 'User not found');

        return view('housekeeping.moderation.users.listingip')->with([
            'ips'   => IPLog::where('user_id', $user->id)->paginate(15),
            'user'  => $user
        ]);
    }

    public function toolsBadge(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        if (!$request->id)
            return view('housekeeping.moderation.users.badges');

        $user = User::find($request->id);
        if (!$user)
            return view('housekeeping.moderation.users.badges')->with('message', 'User not found');

        return view('housekeeping.moderation.users.badges')->with('user', $user);
    }

    public function toolsBadgeGive(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'badge'     => 'required|alpha_num|max:3',
            'username'  => 'required'
        ]);

        $badgeCode = strtoupper($request->badge);

        $user = User::where('username', $request->username)->first();
        if (!$user)
            return redirect()->back()->with('message', 'User no found!');

        $rankBadge = DB::table('rank_badges')->where('badge', $badgeCode)->first();
        if ($rankBadge)
            return redirect()->back()->with('message', 'Cannot give a rank badge!');

        $result = $user->giveBadge($badgeCode);

        if (!$result)
            return redirect()->back()->with('message', 'User already have this badge!');

        create_staff_log('users.badge.give', $request);

        return redirect()->route('housekeeping.users.badges', $user->id)->with('message', 'Badge given to user!');
    }

    public function toolsBadgeRemove(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $user = User::find($request->id);

        if (!$user)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This user does not exist!']);

        $badge = Badge::where([['badge', '=', $request->code], ['user_id', '=', $user->id]])->get();
        if ($badge->count() == '0')
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This user does not have this badge!']);

        Badge::where([['badge', '=', $request->code], ['user_id', '=', $user->id]])->delete();

        create_staff_log('users.badge.remove', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Badge removed!']);
    }

    public function toolsMass()
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied');

        return view('housekeeping.moderation.users.mass');
    }

    public function toolsMassPost(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied_dialog');

        return redirect()->back()->with('message', 'Not implemented yet! Kepler does not save on database which user is online.');
    }

    public function toolsFurniture(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied');

        $user = User::find($request->id);
        if (!$user)
            return redirect()->back()->with('message', 'User not found');

        return view('housekeeping.moderation.users.furniture')->with(['user' => $user]);
    }

    public function toolsFurnitureGive(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied');

        $user = User::where('username', $request->username)->first();
        if (!$user)
            return redirect()->back()->with('message', 'User not found!');

        if ($request->items) {
            foreach (explode(';', $request->items) as $item) {
                $cataItem = CatalogueItem::where('sale_code', $item)->first();
                if ($cataItem)
                    $user->giveItem($cataItem->definition_id, $cataItem->item_specialspriteid);
            }
            $user->refreshHand();
        }

        create_staff_log('users.furniture.give', $request);

        return redirect()->back()->with('message', 'Items delivered!');
    }

    public function toolsFurnitureRemove(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $furni = Furni::find($request->id);

        if (!$furni)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This furni does not exist!']);

        create_staff_log('users.furniture.remove', $request);

        $furni->delete();

        $furni->user->refreshHand();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Furni removed!']);
    }

    public function toolsEmptyHand(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $user = User::find($request->id);

        if (!$user)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This user does not exist!']);

        create_staff_log('users.empty.hand', $request);

        Furni::where([['user_id', $request->id], ['room_id', '0']])->delete();
        $user->refreshHand();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Hand has been cleared!']);
    }

    public function online(Request $request)
    {
        if (!user()->hasPermission('can_access_housekeeping'))
            return view('housekeeping.accessdenied');

        $online = User::where('is_online', 1)->paginate(25);

        return view('housekeeping.moderation.users.online', compact('online'));
    }
}
