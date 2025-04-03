<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\StaffLog;
use App\Models\UserBan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function staff()
    {
        if (!user()->hasPermission('can_view_stafflogs'))
            return view('housekeeping.accessdenied');
        return view('housekeeping.moderation.logs.staff')->with('logs', StaffLog::orderBy('created_at', 'DESC')->paginate(15));
    }

    public function staffMessageDetails(Request $request)
    {
        if (!user()->hasPermission('can_view_stafflogs'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $log = StaffLog::find($request->id);
        if (!$log)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This log does not exist!']);

        return view('housekeeping.ajax.logs_details')->with('log', $log);
    }

    public function staffClear()
    {
        if (cms_config('clear.staff_logs.user_id') != user()->id)
            return view('housekeeping.ajax.accessdenied_dialog');

        StaffLog::truncate();

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Staff logs cleared!']);
    }

    public function bans()
    {
        return view('housekeeping.moderation.logs.bans')->with('bans', UserBan::paginate(25));
    }

    public function alerts()
    {
        $alerts = DB::table('housekeeping_audit_log')->paginate(25);
        return view('housekeeping.moderation.logs.alerts')->with('alerts', $alerts);
    }
}
