<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CmsSetting;
use App\Models\Group;
use App\Models\Room;
use App\Models\StaffLog;
use App\Models\UserBan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        if (!user()->hasPermission('can_access_housekeeping'))
            return view('housekeeping.accessdenied');

        return view('housekeeping.index')->with([
            'users_total'   => User::count(),
            'visits_month'  => User::where('last_online', '>', time() - (60 * 60 * 24 * 30))->count(),
            'visits_today'  => User::where('last_online', '>', time() - (60 * 60 * 24))->count(),
            'rooms_users'   => Room::count(),
            'rooms_public'  => Room::where('owner_id', '0')->count(),
            'furnis'        => DB::table('items')->select(DB::raw('COUNT(*)'))->count(),
            'stafflogs'     => StaffLog::count(),
            'bans'          => UserBan::count(),
            'groups'        => Group::count(),
            'staffs'        => User::where('rank', '>=', '3')->orderby('rank', 'DESC')->get()
        ]);;
    }

    public function saveNote(Request $request)
    {
        if (!user()->hasPermission('can_save_notes'))
            return view('housekeeping.accessdenied');

        set_cms_config('site.admin.notes', $request->notes ?? '');

        return redirect()->route('housekeeping.index')->with('message', 'Housekeeping notes saved successfully.');
    }

    public function updates()
    {
        if (!user()->hasPermission('can_check_updates'))
            return view('housekeeping.accessdenied');

        return view('admin.updates');
    }

    public function logs()
    {
        if (!user()->hasPermission('can_check_logs'))
            return view('housekeeping.accessdenied');

        return view('admin.logs');
    }

    public function about()
    {
        return view('admin.about');
    }
}
