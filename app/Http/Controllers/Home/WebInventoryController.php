<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
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
        $item = HomeItem::find($request->itemId);
        if (!$item || !$item->store) {
            return "Invalid item id: '{$request->itemId}'";
        }

        $store = $item->store;
        $data = [
            "{$store->type}_{$store->class}_pre",
            "{$store->type}_{$store->class}",
            $store->caption,
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
        $item = HomeItem::find($request->selectedStickerId);
        $session = user()->homeSession;

        if (!$item || !$session || $item->owner_id != user()->id) {
            return response('ERROR');
        }

        $item->update([
            'home_id'   => $session->home_id,
            'group_id'  => $session->group_id,
            'x'         => 20,
            'y'         => 30,
            'z'         => $request->zindex,
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
        $sticker = HomeItem::find($request->stickerId);
        if (!$sticker || $sticker->owner_id != user()->id) {
            return response('ERROR');
        }

        $sticker->update([
            'home_id'  => null,
            'group_id' => null,
            'x'        => null,
            'y'        => null,
            'z'        => null,
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
            'backgrounds' => HomeItem::where('owner_id', $userId)->where('type', 'b')->with('store')
                ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                ->select('cms_homes.*', 'cms_homes_store_items.class', DB::raw('count(cms_homes.item_id) as amount'))
                ->groupBy('cms_homes.item_id')->get(),

            'stickers' => HomeItem::where([
                ['owner_id', $userId],
                ['home_id', null],
                ['group_id', null],
                ['type', 's']
            ])
                ->with('store')
                ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                ->select('cms_homes.*', 'cms_homes_store_items.class', DB::raw('count(cms_homes.item_id) as amount'))
                ->groupBy('cms_homes.item_id')->get(),

            default => collect(),
        };
    }

    private function getWidgets()
    {
        $session = user()->homeSession;
        $groupId = $session?->group_id;
        $type = $groupId ? 'gw' : 'w';

        return HomeItem::where([
            ['owner_id', user()->id],
            ['type', $type],
            ['group_id', $groupId],
            ['class', '!=', 'profilewidget']
        ])
            ->with('store')
            ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
            ->select(
                'cms_homes.*',
                'cms_homes_store_items.class',
                'cms_homes_store_items.caption',
                'cms_homes_store_items.description'
            )
            ->get();
    }
}
