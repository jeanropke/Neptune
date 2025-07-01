<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
use App\Models\Home\StoreItem;
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
            'x'    => 0,
            'y'    => 0,
            'z'    => 0,
            'skin' => $this->resolveSkin($request->skin),
            'id'   => -1,
            'data' => $request->noteText,
        ];

        return view('home.noteeditor.preview', compact('item'));
    }

    public function place(Request $request)
    {
        $store = StoreItem::where('type', 'commodity')->first();
        $item = HomeItem::where([
            ['owner_id', user()->id],
            ['item_id', $store->id],
            ['home_id', null],
            ['group_id', null],
        ])->first();

        if (!$item || !user()->homeSession) {
            return response('BACK');
        }

        $item->update([
            'home_id'  => user()->homeSession->home_id,
            'group_id' => user()->homeSession->group_id,
            'data'     => $request->noteText,
            'skin'     => $this->resolveSkin($request->skin),
            'x'        => 20,
            'y'        => 30,
            'z'        => 40,
        ]);

        return response(view('home.stickie', [
            'item'    => $item,
            'zindex'  => $request->zindex,
            'editing' => true,
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($item->id));
    }

    public function purchase()
    {
        return view('home.noteeditor.purchase');
    }

    public function purchaseDone()
    {
        $store = StoreItem::where('type', 'commodity')->first();

        if (!$store) {
            return response('ERROR');
        }

        for ($i = 0; $i <= $store->amount; $i++) {
            HomeItem::create([
                'owner_id' => user()->id,
                'item_id'  => $store->id,
            ]);
        }

        user()->updateCredits(-$store->price);

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
