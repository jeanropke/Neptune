<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Home\Guestbook;
use App\Models\Home\Sticker;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function guestbook(Request $request)
    {
        abort_unless_permission('can_manage_guestbook');

        $messages = Guestbook::where('message', 'LIKE', "%$request->q%")->with(['author', 'user', 'group'])->orderBy('created_at', 'DESC');
        return view('housekeeping.moderation.home.guestbook')->with([
            'messages' => $messages->paginate(20)
        ]);
    }

    public function guestbookDelete(Request $request)
    {
        if (!user()->hasPermission('can_manage_guestbook'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $message = Guestbook::find($request->id);

        if (!$message)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This message does not exist!']);

        $message->update([
            'deleted_by' => user()->id
        ]);

        create_staff_log('moderation.guestbook.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'Message deleted!']);
    }

    public function guestbookRestore(Request $request)
    {
        if (!user()->hasPermission('can_manage_guestbook'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $message = Guestbook::find($request->id);

        if (!$message)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This message does not exist!']);

        $message->update([
            'deleted_by' => null
        ]);

        create_staff_log('moderation.guestbook.restore', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'Message restored!']);
    }

    public function stickies(Request $request)
    {
        abort_unless_permission('can_manage_stickies');

        $stickies = Sticker::where([['text', 'LIKE', "%$request->q%"], ['sticker_id', '13']])->with(['owner']);

        return view('housekeeping.moderation.home.stickies')->with([
            'stickies' => $stickies->paginate(20)
        ]);
    }

    public function stickiesDelete(Request $request)
    {
        if (!user()->hasPermission('can_manage_stickies'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $stickie = HomeItem::find($request->id);

        if (!$stickie)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This stickie does not exist!']);

        $stickie->update([
            'deleted_by' => user()->id
        ]);

        create_staff_log('moderation.guestbook.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'Stickie deleted!']);
    }

    public function stickiesRestore(Request $request)
    {
        if (!user()->hasPermission('can_manage_stickies'))
            return view('housekeeping.ajax.accessdenied_dialog');

        $stickie = HomeItem::find($request->id);

        if (!$stickie)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This stickie does not exist!']);

        $stickie->update([
            'deleted_by' => null
        ]);
        create_staff_log('moderation.guestbook.restore', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'Stickie restored!']);
    }
}
