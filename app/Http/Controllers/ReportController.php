<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ReportController extends Controller
{
    public function addDiscussionpostReport(Request $request)
    {
        if(!Auth::check())
            return;

        $request->validate([
            'objectId'  => 'required|numeric'
        ]);

        $alreadyReported = Report::where([['reported_by', '=', user()->id], ['object_id', '=', $request->objectId], ['type', '=', 'discussionpost']])->count() > 0;

        if($alreadyReported)
            return 'SPAM';

        $reportsByUser = Report::where([['reported_by', '=', user()->id], ['created_at', '>', Carbon::now()->subMinutes(5)->toDateTimeString()]])->count();

        if($reportsByUser > 3)
            return "SPAM";

        Report::create([
            'reported_by'   => user()->id,
            'object_id'     => $request->objectId,
            'type'          => 'discussionpost',
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        return "SUCCESS";

    }
}
