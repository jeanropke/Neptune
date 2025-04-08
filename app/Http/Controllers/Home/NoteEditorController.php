<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use Illuminate\Http\Request;

class NoteEditorController extends Controller
{
    public function editor(Request $request)
    {
        $item = (object) [
            'skin'  => $request->skin,
            'data'  => $request->noteText
        ];

        return view('home.noteeditor.editor')->with('item', $item);
    }

    public function preview(Request $request)
    {
        switch ($request->skin) {
            case 1:
                $skin = 'defaultskin';
                break;
            case 2:
                $skin = 'speechbubbleskin';
                break;
            case 3:
                $skin = 'metalskin';
                break;
            case 4:
                $skin = 'noteitskin';
                break;
            case 5:
                $skin = 'notepadskin';
                break;
            case 6:
                $skin = 'goldenskin';
                break;
            case 7:
                $skin = 'hc_machineskin';
                break;
            case 8:
                $skin = 'hc_pillowskin';
                break;
            case 9:
                $skin = 'nakedskin';
                break;
            default:
                $skin = 'defaultskin';
                break;
        }

        $item = (object) [
            'x'     => 0,
            'y'     => 0,
            'z'     => 0,
            'skin'  => $skin,
            'id'    => -1,
            'data'  => $request->noteText
        ];

        return view('home.noteeditor.preview')->with('item', $item);
    }

    public function place(Request $request)
    {
        $item = HomeItem::where([['owner_id', user()->id], ['item_id', 4], ['home_id', null], ['group_id', null]])->first();
        //Does not have aa unused note
        if (!$item)
            return 'BACK';

        $session = HomeSession::find(user()->id);
        if (!$session)
            return 'BACK';

        switch ($request->skin) {
            case 1:
                $skin = 'defaultskin';
                break;
            case 2:
                $skin = 'speechbubbleskin';
                break;
            case 3:
                $skin = 'metalskin';
                break;
            case 4:
                $skin = 'noteitskin';
                break;
            case 5:
                $skin = 'notepadskin';
                break;
            case 6:
                $skin = 'goldenskin';
                break;
            case 7:
                $skin = 'hc_machineskin';
                break;
            case 8:
                $skin = 'hc_pillowskin';
                break;
            case 9:
                $skin = 'nakedskin';
                break;
            default:
                $skin = 'defaultskin';
                break;
        }

        $item->update([
            'home_id'   => $session->home_id,
            'group_id'  => $session->group_id,
            'data'      => $request->noteText,
            'skin'      => $skin,
            'x'         => 20,
            'y'         => 30,
            'z'         => 40,
        ]);

        return response(view('home.stickie', [
            'item'   => $item,
            'zindex' => $request->zindex,
            'isEdit' => true
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($item->id));
    }

    public function purchase()
    {
        return view('home.noteeditor.purchase');
    }
}
