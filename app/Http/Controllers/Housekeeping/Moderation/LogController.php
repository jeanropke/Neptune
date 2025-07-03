<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\ConsoleMessage;
use App\Models\Room;
use App\Models\Room\ChatLog;
use App\Models\Staff\Log;
use App\Models\User;
use App\Models\User\Ban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function staff()
    {
        abort_unless_permission('can_view_stafflogs');

        $logs = Log::with('user')->orderByDesc('created_at')->paginate(15);

        return view('housekeeping.moderation.logs.staff', compact('logs'));
    }

    public function staffMessageDetails(Request $request)
    {
        abort_unless_permission('can_view_stafflogs', 'housekeeping.ajax.accessdenied_dialog');

        $log = Log::find($request->id);

        if (!$log) {
            return view('housekeeping.ajax.dialog_result', [
                'status' => 'error',
                'message' => 'This log does not exist!',
            ]);
        }

        return view('housekeeping.ajax.logs_details', compact('log'));
    }

    public function staffClear()
    {
        if (cms_config('clear.staff_logs.user_id') != user()->id)
            return view('housekeeping.ajax.accessdenied_dialog');

        Log::truncate();

        return view('housekeeping.ajax.dialog_result')->with([
            'status' => 'success',
            'message' => 'Staff logs cleared!'
        ]);
    }

    public function bans()
    {
        abort_unless_permission('can_view_bans');

        $bans = Ban::paginate(25);

        return view('housekeeping.moderation.logs.bans', compact('bans'));
    }

    public function alerts()
    {
        abort_unless_permission('can_view_bans');

        $alerts = DB::table('housekeeping_audit_log')->orderBy('created_at', 'desc')->paginate(25);

        return view('housekeeping.moderation.logs.alerts', compact('alerts'));
    }

    public function chats(Request $request)
    {
        abort_unless_permission('can_view_chatlogs');

        $query = ChatLog::query()->with(['user', 'room']);

        switch ($request->type) {
            case 'username':
                $user = User::where('username', $request->value)->first();
                if (!$user) {
                    return redirect()->route('housekeeping.logs.chats')->with('message', 'User not found!');
                }
                $query->where('user_id', $user->id);
                break;

            case 'roomname':
                $room = Room::where('name', $request->value)->first();
                if (!$room) {
                    return redirect()->route('housekeeping.logs.chats')->with('message', 'Room not found!');
                }
                $query->where('room_id', $room->id);
                break;

            case 'room_id':
                $query->where('room_id', $request->value);
                break;

            case 'user_id':
                $query->where('user_id', $request->value);
                break;

            default:
                $query->where('message', 'LIKE', "%{$request->value}%");
                break;
        }

        $chats = $query->orderByDesc('timestamp')->paginate(25);

        return view('housekeeping.moderation.logs.chats', compact('chats'));
    }

    public function console(Request $request)
    {
        abort_unless_permission('can_view_consolelogs');

        $messages = ConsoleMessage::with(['sender', 'receiver']);

        switch ($request->type) {
            case 'username':
                $user = User::where('username', $request->value)->first();
                if (!$user) {
                    return redirect()->route('housekeeping.logs.console')
                        ->with('message', 'User not found!');
                }
                $messages->where('sender_id', $user->id);
                break;

            case 'sender_id':
                $messages->where('sender_id', $request->value);
                break;

            case 'receiver_id':
                $messages->where('receiver_id', $request->value);
                break;

            default:
                if ($request->user_one && $request->user_two) {
                    $ids = [$request->user_one, $request->user_two];
                    $messages->whereIn('sender_id', $ids)
                        ->whereIn('receiver_id', $ids);
                } else {
                    $messages->where('body', 'LIKE', "%{$request->value}%");
                }
                break;
        }

        return view('housekeeping.moderation.logs.console')->with([
            'messages' => $messages->orderByDesc('date')->paginate(25)
        ]);
    }
}
