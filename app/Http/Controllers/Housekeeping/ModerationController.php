<?php

namespace App\Http\Controllers\Housekeeping;

use App\Helpers\Hotel;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\StaffLog;
use App\Models\User;
use App\Models\UserBadge;
use App\Models\UserIPLog;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModerationController extends Controller
{

    public function usersClient($user)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $user = User::find($user);

        if (!$user)
            return redirect()->back();

        if ($user->rank >= user()->rank && user()->id != 1)
            return redirect()->back();

        return view('admin.users.client')->with([
            'user' => $user
        ]);
    }

    public function usersEditSearch(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'username' => 'required'
        ]);

        return view('admin.users.index')->with([
            'users' => User::where('username', 'like', '%' . $request->username . '%')->paginate(15)
        ]);
    }

    public function usersIp()
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        return view('admin.users.searchip');
    }


    public function userBadge()
    {
        if (!user()->hasPermission('can_give_users_badge'))
            return view('housekeeping.accessdenied');

        return view('admin.users.badge');
    }

    public function userGiveBadge(Request $request)
    {
        if (!user()->hasPermission('can_edit_users'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'username'  => 'required',
            'badge'     => 'required'
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user)
            return redirect()->route('admin.users.badgetool')->withErrors(['User not found!']);


        $badge = UserBadge::where([['user_id', $user->id], ['badge_code', $request->badge]])->first();

        if ($badge)
            return redirect()->route('admin.users.badgetool')->withErrors([$request->username . ' already owns ' . $request->badge]);

        $message = user()->username . ' given \'' . $request->badge . '\' to \'' . $request->username . '\'';
        StaffLog::createLog('givebadge', $message);

        if ($user->isOnline()) {
            Hotel::sendRconMessage('givebadge', ['user_id' => $user->id, 'badge' => $request->badge]);
        } else {
            UserBadge::create([
                'user_id' => $user->id,
                'badge_code' => $request->badge
            ]);
        }
        return redirect()->route('admin.users.badgetool')->with('message', 'Given ' . $request->badge . ' to ' . $request->username . '!');
    }

    public function userRemoveBadge(Request $request)
    {
        if (!user()->hasPermission('can_give_users_mass'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'code'      => 'required',
            'username'  => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user)
            return redirect()->route('admin.users.badgetool')->withErrors(['User not found!']);

        $badge = UserBadge::where([['user_id', $user->id], ['badge_code', $request->code]])->first();
        if (!$badge)
            return redirect()->route('admin.users.badgetool')->withErrors(['Badge not found in this user!']);

        if ($user->isOnline()) {
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':takebadge ' . $request->username . ' ' . $request->code]);
        } else {
            $badge->delete();
        }

        $message = user()->username . ' removed badge \'' . $request->code . '\' from \'' . $request->username . '\'';
        StaffLog::createLog('badgetool', $message);

        return redirect()->route('admin.users.badgetool')->with('message', 'Removed badge \'' . $request->code . '\' from \'' . $request->username . '\'');
    }

    public function userMass()
    {
        if (!user()->hasPermission('can_give_users_mass'))
            return view('housekeeping.accessdenied');

        return view('admin.users.mass');
    }

    public function userMassCredits(Request $request)
    {
        if (!user()->hasPermission('can_give_users_mass'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'credits'   => 'required|numeric'
        ]);

        $count = 0;
        if ($request->online == 1) {
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':masscredits ' . $request->credits]);
            $count = User::where('online', '1')->count();
        } else {
            $users = User::select(['id', 'credits'])->where('online', '0')->get();
            foreach ($users as $user) {
                //Give credits only for offline users
                $user->increment('credits', $request->credits);
            }
            //Give credits only for online users
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':masscredits ' . $request->credits]);
            $count = User::count();
        }

        $message = user()->username . ' given \'' . $request->credits . '\' credits to \'' . $count . '\' users';
        StaffLog::createLog('masscredits', $message);

        return redirect()->route('admin.users.massstuff')->with('message', 'Given \'' . $request->credits . '\' credits to \'' . $count . '\' users!');
    }

    public function userMassPoints(Request $request)
    {
        if (!user()->hasPermission('can_give_users_mass'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'points'    => 'required|numeric'
        ]);

        $count = 0;
        if ($request->online == 1) {
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':masspoints ' . $request->points . ' ' . $request->type]);
            $count = User::where('online', '1')->count();
        } else {
            $users = User::select(['id'])->where('online', '0')->get();
            foreach ($users as $user) {
                //Give points only for offline users
                $user->setPoints($request->points, $request->type);
            }
            //Give points only for online users
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':masspoints ' . $request->points . ' ' . $request->type]);
            $count = User::count();
        }

        $message = user()->username . ' given \'' . $request->points . '\' points of type ' . $request->type . ' to \'' . $count . '\' users';
        StaffLog::createLog('masspoints', $message);

        return redirect()->route('admin.users.massstuff')->with('message', 'Given \'' . $request->points . '\' points of type ' . $request->type . ' to \'' . $count . '\' users!');
    }

    public function userMassBadge(Request $request)
    {
        if (!user()->hasPermission('can_give_users_mass'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'code'    => 'required'
        ]);

        $count = 0;
        if ($request->online == 1) {
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':massbadge ' . $request->code]);
            $count = User::where('online', '1')->count();
        } else {
            $users = User::select(['id'])->where('online', '0')->get();
            foreach ($users as $user) {
                $badge = UserBadge::where([['user_id', $user->id], ['badge_code', $request->code]])->first();
                if ($badge == null) {
                    //Give badge only for offline users
                    UserBadge::create([
                        'user_id' => $user->id,
                        'badge_code' => $request->code
                    ]);
                    $count++;
                }
            }
            //Give badge only for online users
            Hotel::sendRconMessage('executecommand', ['user_id' => user()->id, 'command' => ':massbadge ' . $request->code]);
            $count = User::where('online', '1')->count() + $count;
        }

        $message = user()->username . ' given badge \'' . $request->code . '\'  to \'' . $count . '\' users';
        StaffLog::createLog('massbadge', $message);

        return redirect()->route('admin.users.massstuff')->with('message', 'Given badge \'' . $request->code . '\'  to \'' . $count . '\' users!');
    }

    public function userMassRemoveBadge(Request $request)
    {
        if (!user()->hasPermission('can_give_users_mass'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'code'      => 'required',
        ]);

        $usersBadges = UserBadge::select('user_id')->where('badge_code', $request->code)->get();

        if ($usersBadges->count() == 0)
            return redirect()->route('admin.users.massstuff')->withErrors(['Badge not found!']);

        foreach ($usersBadges as $userBadge) {
            $user = User::find($userBadge->user_id);
            if ($user->isOnline())
                Hotel::sendRconMessage('executecommand', ['user_id' => $userBadge->user_id, 'badge', 'command' => ':takebadge ' . $user->username . ' ' . $request->code]);
            else
                $userBadge->delete();
        }



        $message = user()->username . ' removed badge \'' . $request->code . '\' from \'' . $usersBadges->count() . '\' users';
        StaffLog::createLog('massbadge', $message);

        return redirect()->route('admin.users.massstuff')->with('message', 'Removed badge \'' . $request->code . '\' from \'' . $usersBadges->count() . '\' users');
    }

    public function userEditorGuestroom($roomId = null)
    {
        if (!user()->hasPermission('can_edit_users_guestroom'))
            return view('housekeeping.accessdenied');

        return view('admin.users.editor.guestroom')->with([
            'room'  => Room::find($roomId),
            'rooms' => Room::where('is_public', '0')->get()
        ]);
    }

    public function userEditorGuestroomSave($roomId, Request $request)
    {
        if (!user()->hasPermission('can_edit_users_guestroom'))
            return view('housekeeping.accessdenied');

        $request->validate([
            'owner'         => 'required|exists:users,username',
            'name'          => 'required',
            'state'         => 'required',
            'visitors_now'  => 'numeric',
            'visitors_max'  => 'numeric'
        ]);

        $room = Room::find($roomId);

        $room->update([
            'owner_id'      => User::where('username', $request->owner)->first()->id,
            'owner_name'    => $request->owner,
            'name'          => $request->name,
            'state'         => $request->state,
            'description'   => $request->description ? $request->description : '',
            'password'      => $request->password,
            'users'         => $request->visitors_now,
            'users_max'     => $request->visitors_max
        ]);

        $message = user()->username . ' edited room ID \'' . $roomId . '\'';
        StaffLog::createLog('massbadge', $message);

        return redirect()->route('admin.users.editor.guestroom', false)->with('message', 'Room edited!');
    }

    public function creditsTransactions()
    {
        if (!user()->hasPermission('can_check_transactions'))
            return view('housekeeping.accessdenied');

        return view('admin.credits.transactions');
    }

    public function getCreditsTransactions(Request $request)
    {
        if (!user()->hasPermission('can_check_transactions'))
            return view('housekeeping.accessdenied');

        $user = User::where('id', $request->user_id)->first();

        if (!$user)
            return redirect()->route('admin.credits.transactions', false)->with('message', 'User not found!');

        return view('admin.credits.transactions')->with(
            [
                'results' => DB::table('cms_transactions')->limit(100)->orderby('timestamp', 'desc')->get(),
                'user'    => $user
            ]
        );
    }

    public function creditsVoucher()
    {
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.accessdenied');

        return view('admin.credits.vouchers')->with([
            'rnd_voucher' => Str::lower(Str::random(8)),
            'vouchers' => Voucher::all()
        ]);
    }

    public function createCreditsVoucher(Request $request)
    {
        if (!user()->hasPermission('can_create_vouchers'))
            return view('housekeeping.accessdenied');


        $request->validate([
            'voucher'     => 'required|min:5|max:55',
            'credits'     => 'required|numeric|max:7',
            'points'      => 'required|numeric|max:7',
            'points_type' => 'required',
            'catalog_id'  => 'required|max:55',
        ]);

        $voucher = Voucher::where('code', $request->voucher)->first();

        if ($voucher)
            return redirect()->route('admin.credits.vouchers', false)->with('message', 'Voucher already exists!');



        Voucher::create([
            'code'            => $request->voucher,
            'credits'         => $request->credits,
            'points'          => $request->points,
            'points_type'     => $request->points_type,
            'catalog_item_id' => $request->catalog_id
        ]);

        return redirect()->route('admin.credits.vouchers', false)->with('message', 'Voucher created!');
    }

    public function usersOnline()
    {
        return view('admin.users.online')->with('users', User::where('online', '1')->get());
    }
}
