<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Group\GroupReply;
use App\Models\Home\Guestbook;
use App\Models\Home\HomeItem;
use App\Models\Neptune\Report;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReportController extends Controller
{
    private function createReport($objectId, $type, $message, $authorId)
    {
        $userId = user()->id;

        if (Report::where([
            ['reported_by', '=', $userId],
            ['object_id', '=', $objectId],
            ['type', '=', $type]
        ])->exists()) {
            return 'SPAM';
        }

        $recentReports = Report::where('reported_by', $userId)
            ->where('created_at', '>', now()->subMinutes(5))
            ->count();

        if ($recentReports > 3) {
            return 'SPAM';
        }

        Report::create([
            'reported_by' => $userId,
            'object_id'   => $objectId,
            'type'        => $type,
            'message'     => $message,
            'author_id'   => $authorId
        ]);

        return 'SUCCESS';
    }

    private function handleReport(Request $request, $type, $modelClass, $messageField, $authorField = 'user_id')
    {
        abort_unless(Auth::check(), 403);

        $validator = Validator::make($request->all(), [
            'objectId' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Invalid request.'], 422);
        }

        $item = $modelClass::find($request->objectId);

        if (!$item) {
            return response()->json(['error' => 'Object not found.'], 404);
        }

        $message = is_callable($messageField)
            ? call_user_func($messageField, $item)
            : data_get($item, $messageField, 0);

        $author = is_callable($authorField)
            ? call_user_func($authorField, $item)
            : data_get($item, $authorField, 0);

        return $this->createReport(
            $request->objectId,
            $type,
            $message,
            $author
        );
    }

    public function addDiscussionpostReport(Request $request)
    {
        return $this->handleReport($request, 'discussionpost', GroupReply::class, 'message');
    }

    public function addGroupdescReport(Request $request)
    {
        return $this->handleReport($request, 'groupdesc', Group::class, 'description');
    }

    public function addGroupnameReport(Request $request)
    {
        return $this->handleReport($request, 'groupname', Group::class, 'name');
    }

    public function addGuestbookReport(Request $request)
    {
        return $this->handleReport($request, 'guestbook', Guestbook::class, 'message');
    }

    public function addMottoReport(Request $request)
    {
        return $this->handleReport($request, 'motto', User::class, 'motto', 'id');
    }

    public function addNameReport(Request $request)
    {
        return $this->handleReport($request, 'name', User::class, 'username', 'id');
    }

    public function addRoomReport(Request $request)
    {
        return $this->handleReport($request, 'room', Room::class, fn($room) => "Name: {$room->name}\nDesc: {$room->description}", 'owner_id');
    }

    public function addStickieReport(Request $request)
    {
        return $this->handleReport($request, 'stickie', HomeItem::class, 'data', 'owner_id');
    }
}
