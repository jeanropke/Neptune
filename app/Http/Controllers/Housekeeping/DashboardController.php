<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Furni;
use App\Models\Group;
use App\Models\Neptune\Report;
use App\Models\Room;
use App\Models\Staff\Log;
use App\Models\User;
use App\Models\User\Ban;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (!user()->hasPermission('can_access_housekeeping'))
            return view('housekeeping.accessdenied');

        $thirtyDaysAgo = time() - (60 * 60 * 24 * 30);
        $today = time() - (60 * 60 * 24);

        $usersTotal     = User::count();
        $usersOnline    = User::where('is_online', 1)->count();
        $visitsMonth    = User::where('last_online', '>', $thirtyDaysAgo)->count();
        $visitsToday    = User::where('last_online', '>', $today)->count();
        $roomsUsers     = Room::count();
        $roomsPublic    = Room::where('owner_id', 0)->count();
        $furnis         = Furni::count();
        $stafflogs      = Log::count();
        $bans           = Ban::count();
        $groups         = Group::count();
        $reportsTotal   = Report::count();
        $reportsClosed  = Report::where('closed', 1)->count();
        $staffs         = User::where('rank', '>=', 3)->orderBy('rank', 'desc')->get();

        return view('housekeeping.index', compact(
            'usersTotal',
            'usersOnline',
            'visitsMonth',
            'visitsToday',
            'roomsUsers',
            'roomsPublic',
            'furnis',
            'stafflogs',
            'bans',
            'groups',
            'reportsTotal',
            'reportsClosed',
            'staffs'
        ));
    }

    public function saveNote(Request $request)
    {
        if (!user()->hasPermission('can_save_notes'))
            return view('housekeeping.accessdenied');

        set_cms_config('site.admin.notes', $request->notes ?? '');

        create_staff_log('dashboard.note.save', $request);

        return redirect()->route('housekeeping.index')->with('message', 'Housekeeping notes saved successfully.');
    }
}
