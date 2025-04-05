<?php

namespace App\Http\Controllers;

use App\Models\Group\GroupReply;
use App\Models\Home\HomeItem;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    private function createReport($objectId, $type, $message, $author)
    {
        $alreadyReported = Report::where([['reported_by', '=', user()->id], ['object_id', '=', $objectId], ['type', '=', $type]])->count() > 0;

        if ($alreadyReported)
            return 'SPAM';

        $reportsByUser = Report::where([['reported_by', '=', user()->id], ['created_at', '>', Carbon::now()->subMinutes(5)->toDateTimeString()]])->count();

        if ($reportsByUser > 3)
            return "SPAM";

        Report::create([
            'reported_by'   => user()->id,
            'object_id'     => $objectId,
            'type'          => $type,
            'message'       => $message,
            'author_id'     => $author,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        return "SUCCESS";
    }

    public function addDiscussionpostReport(Request $request)
    {
        if (!Auth::check())
            return;

        $request->validate([
            'objectId'  => 'required|numeric'
        ]);

        $post = GroupReply::find($request->objectId);

        return $this->createReport($request->objectId, 'discussionpost', $post->message, $post->user_id);
    }

    public function addStickieReport(Request $request)
    {
        if (!Auth::check())
            return;

        $request->validate([
            'objectId'  => 'required|numeric'
        ]);

        $stickie = HomeItem::find($request->objectId);

        return $this->createReport($request->objectId, 'stickie', $stickie->data, $stickie->owner_id);
    }
}
