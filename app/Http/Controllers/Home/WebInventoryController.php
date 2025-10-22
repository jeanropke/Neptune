<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Group\GroupSession;
use App\Models\Home\HomeSession;
use App\Models\Home\Sticker;
use App\Models\Home\StickerStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebInventoryController extends Controller
{
    public function loadInventory(Request $request)
    {
        $type = $request->type;

        if ($type === 'widgets') {
            $widgets = $this->getWidgets();
            return view('home.inventory.main', compact('widgets'));
        }

        $items = $this->loadItemsQuery($type);
        $first = $items->first();

        $data = null;
        if ($first && $first->store) {
            $store = $first->store;
            $data = [
                "{$store->type}_{$store->class}_pre",
                "{$store->type}_{$store->class}",
                $store->caption,
                $first->getFullType(),
                null,
                $first->amount,
            ];
        }

        return response(view('home.inventory.main', compact('items')), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function preview(Request $request)
    {
        $item = Sticker::find($request->itemId);
        if (!$item || !$item->store) {
            return "Invalid item id: '{$request->itemId}'";
        }

        $store = $item->store;
        $data = [
            "{$store->shortType}_{$store->data}_pre",
            "{$store->shortType}_{$store->data}",
            $store->name,
            $item->getFullType(),
            null,
            $item->amount,
        ];

        return response(view('home.inventory.preview', compact('item')), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function placeSticker(Request $request)
    {
        $item = Sticker::find($request->selectedStickerId);
        $session = GroupSession::where('user_id', user()->id)->first();
        if (!$session)
            $session = HomeSession::where('user_id', user()->id)->first();

        if (!$item || !$session || $item->user_id != user()->id) {
            return response('ERROR');
        }

        $item->update([
            'group_id'  => $session?->group_id ?? '0',
            'x'         => 20,
            'y'         => 30,
            'z'         => $request->zindex,
            'is_placed' => '1'
        ]);

        return response(view('home.sticker', [
            'class'   => $item->store->class,
            'item'    => $item,
            'id'      => $item->id,
            'zindex'  => $request->zindex,
            'editing' => true,
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode([$item->id]));
    }

    public function removeSticker(Request $request)
    {
        $sticker = Sticker::find($request->stickerId);
        if (!$sticker || $sticker->user_id != user()->id) {
            return response('ERROR');
        }

        $sticker->update([
            'x'         => 0,
            'y'         => 0,
            'z'         => 0,
            'is_placed' => 0
        ]);

        return response('SUCCESS', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($sticker->id));
    }

    public function inventoryItems(Request $request)
    {
        $type = $request->type;

        if ($type === 'widgets') {
            $widgets = $this->getWidgets();
            return view('home.inventory.widgets', compact('widgets'));
        }

        $items = $this->loadItemsQuery($type);
        return view('home.inventory.items', compact('items'));
    }

    private function loadItemsQuery(string $type)
    {
        $userId = user()->id;

        return match ($type) {
            'backgrounds' => Sticker::where('user_id', $userId)->where('type', '4')->with('store')
                ->join('cms_stickers_catalogue', 'cms_stickers_catalogue.id', 'cms_stickers.sticker_id')
                ->select('cms_stickers.*', 'cms_stickers_catalogue.data', DB::raw('count(cms_stickers.sticker_id) as amount'))
                ->groupBy('cms_stickers.sticker_id')->get(),

            'stickers' => Sticker::where([
                ['user_id', $userId],
                ['is_placed', '0'],
                ['type', '1']
            ])
                ->with('store')
                ->join('cms_stickers_catalogue', 'cms_stickers_catalogue.id', 'cms_stickers.sticker_id')
                ->select('cms_stickers.*', 'cms_stickers_catalogue.data', DB::raw('count(cms_stickers.sticker_id) as amount'))
                ->groupBy('cms_stickers.sticker_id')
                ->get(),

            default => collect(),
        };
    }

    private function getWidgets()
    {
        $session = GroupSession::where('user_id', user()->id)->first();
        if (!$session)
            $session = HomeSession::where('user_id', user()->id)->first();

        $groupId = $session?->group_id;

        if($session?->group_id) {
            return StickerStore::where([['type', 5], ['data', '!=', 'groupinfowidget']])
            ->leftJoin('cms_stickers', 'cms_stickers.sticker_id', 'cms_stickers_catalogue.id')
            ->where([['user_id', user()->id], ['group_id', $session?->group_id]])->get();
        }

        return StickerStore::where([['type', 2], ['data', '!=', 'profilewidget']])
            ->leftJoin('cms_stickers', 'cms_stickers.sticker_id', 'cms_stickers_catalogue.id')
            ->where([['user_id', user()->id]])->get();
    }
}
