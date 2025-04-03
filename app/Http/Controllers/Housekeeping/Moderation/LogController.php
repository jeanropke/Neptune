<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\ConsoleMessage;
use App\Models\Room;
use App\Models\RoomChatLog;
use App\Models\StaffLog;
use App\Models\User;
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

    public function chats(Request $request)
    {
        $chats = [];
        switch ($request->type) {
            case 'username':
                $user = User::where('username', $request->value)->first();
                if (!$user)
                    return redirect()->route('housekeeping.logs.chats')->with('message', 'User not found!');
                $chats = RoomChatLog::where('user_id', $user->id);
                break;
            case 'roomname':
                $room = Room::where('name', $request->value)->first();
                if (!$room)
                    return redirect()->route('housekeeping.logs.chats')->with('message', 'Room not found!');
                $chats = RoomChatLog::where('room_id', $room->id);
                break;
            case 'room_id':
                $chats = RoomChatLog::where('room_id', $request->value);
                break;
            case 'user_id':
                $chats = RoomChatLog::where('user_id', $request->value);
                break;
            default:
                $chats = RoomChatLog::where([['message', 'LIKE', "%{$request->value}%"]]);
                break;
        }

        return view('housekeeping.moderation.logs.chats')->with('chats', $chats->orderBy('timestamp', 'DESC')->paginate(25));
    }

    public function console(Request $request)
    {
        $messages = [];

        switch ($request->type) {
            case 'username':
                $user = User::where('username', $request->value)->first();
                if (!$user)
                    return redirect()->route('housekeeping.logs.console')->with('message', 'User not found!');
                $messages = ConsoleMessage::where('sender_id', $user->id);
                break;
            case 'sender_id':
                $messages = ConsoleMessage::where('sender_id', $request->value);
                break;
            case 'receiver_id':
                $messages = ConsoleMessage::where('receiver_id', $request->value);
                break;
            default:
                if ($request->user_one && $request->user_two) {
                    $messages = ConsoleMessage::whereIn('sender_id', [$request->user_one, $request->user_two])->whereIn('receiver_id', [$request->user_one, $request->user_two]);
                } else {
                    $messages = ConsoleMessage::where([['body', 'LIKE', "%{$request->value}%"]]);
                }
                break;
        }
        return view('housekeeping.moderation.logs.console')->with('messages', $messages->orderBy('date', 'DESC')->paginate(25));
    }
}
