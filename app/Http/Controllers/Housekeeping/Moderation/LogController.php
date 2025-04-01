<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\StaffLog;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function staff()
    {
        return view('housekeeping.moderation.logs.staff')->with('logs', StaffLog::orderBy('created_at', 'DESC')->paginate(15));
    }

    public function staffMessageDetails(Request $request)
    {
        //if (!user()->hasPermission('can_edit_users_guestroom'))
        //return view('housekeeping.ajax.accessdenied_dialog');

        $log = StaffLog::find($request->id);
        if(!$log)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This log does not exist!']);

        return view('housekeeping.ajax.logs_details')->with('log', $log);
    }
}
