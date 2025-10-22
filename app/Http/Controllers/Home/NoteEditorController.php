<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Sticker;
use App\Models\Home\StickerStore;
use Illuminate\Http\Request;

class NoteEditorController extends Controller
{
    public function editor(Request $request)
    {
        $item = (object) [
            'skin' => $request->skin,
            'data' => $request->noteText,
        ];

        return view('home.noteeditor.editor', compact('item'));
    }

    public function preview(Request $request)
    {
        $item = (object) [
            'x'         => 0,
            'y'         => 0,
            'z'         => 0,
            'skinName' => $this->resolveSkin($request->skin),
            'id'        => -1,
            'text'      => $request->noteText,
        ];

        return view('home.noteeditor.preview', compact('item'));
    }

    public function place(Request $request)
    {
        $stickie = Sticker::where([['sticker_id', '13'], ['is_placed', '0'], ['text', '']])->first();
        if (!$stickie/* || !user()->homeSession*/) {
            return response('BACK');
        }

        $stickie->update([
            //'group_id'  => user()->homeSession->group_id,
            'text'      => $request->noteText,
            'skin_id'   => $request->skin,
            'x'         => 20,
            'y'         => 30,
            'z'         => 40,
            'is_placed' => 1
        ]);

        return response(view('home.stickie', [
            'item'    => $stickie,
            'zindex'  => $request->zindex,
            'editing' => true,
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($stickie->id));
    }

    public function purchase()
    {
        return view('home.noteeditor.purchase');
    }

    public function purchaseDone()
    {
        $stickie = StickerStore::find(13);

        if (!$stickie) {
            return response('ERROR');
        }

        for ($i = 0; $i <= $stickie->amount; $i++) {
            Sticker::create([
                'user_id'       => user()->id,
                'sticker_id'    => $stickie->id,
            ]);
        }

        user()->updateCredits(-$stickie->price);

        return response('OK');
    }

    private function resolveSkin($skinId): string
    {
        return match ((int) $skinId) {
            2 => 'speechbubbleskin',
            3 => 'metalskin',
            4 => 'noteitskin',
            5 => 'notepadskin',
            6 => 'goldenskin',
            7 => 'hc_machineskin',
            8 => 'hc_pillowskin',
            9 => 'nakedskin',
            default => 'defaultskin',
        };
    }
}
