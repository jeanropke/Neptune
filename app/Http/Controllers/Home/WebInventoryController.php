<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebInventoryController extends Controller
{
    public function loadInventory(Request $request)
    {
        switch ($request->type) {
            case 'backgrounds':
                $items = HomeItem::where([['owner_id', user()->id], ['type', 'b']])->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')->select('cms_homes.*', 'cms_homes_store_items.class')->get();
                break;
            case 'widgets':
                $widgets = HomeItem::where([['owner_id', user()->id], ['type', 'w'], ['class', '!=', 'profilewidget']])
                    ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                    ->select('cms_homes.*', 'cms_homes_store_items.class', 'cms_homes_store_items.caption', 'cms_homes_store_items.description')->get();
                return view('home.inventory.main')->with('widgets', $widgets);
                break;
            case 'stickers':
                $items = HomeItem::where([['owner_id', user()->id], ['home_id', null], ['group_id', null], ['type', 's']])
                    ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                    ->select('cms_homes.*', 'cms_homes_store_items.class', DB::raw('count(cms_homes.item_id) as amount'))->groupBy(['cms_homes.item_id'])->get();
                break;
            default:
                return $request->type;
                break;
        }

        $item = $items->first();
        $store = $item->getStoreItem();
        $data = ["{$store->type}_{$store->class}_pre", "{$store->type}_{$store->class}", "{$store->caption}", "{$item->getFullType()}", null, $item->amount];

        return response(view('home.inventory.main', [
            'items' => $items
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function preview(Request $request)
    {
        $item = HomeItem::find($request->itemId);
        if (!$item)
            return "Invalid item id: '{$request->itemId}'";

        $store = $item->getStoreItem();
        $data = ["{$store->type}_{$store->class}_pre", "{$store->type}_{$store->class}", "{$store->caption}", "{$item->getFullType()}", null, $item->amount];

        return response(view('home.inventory.preview', [
            'item' => $item
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function placeSticker(Request $request)
    {
        $item = HomeItem::find($request->selectedStickerId);
        if (!$item)
            return "Invalid item id: '{$request->itemId}'";

        $session = HomeSession::find(user()->id);
        if (!$session)
            return 'error: placeSticker > session expired';

        // maybe auto report to staffs on housekeeping???
        if ($item->owner_id != user()->id)
            return;

        $item->update([
            'home_id'   => $session->home_id,
            'x'         => 20,
            'y'         => 30,
            'z'         => $request->zindex,
        ]);

        return response(view('home.sticker', [
            'class'     => $item->getStoreItem()->class,
            'item'      => $item,
            'id'        => $item->id,
            'zindex'    => $request->zindex,
            'isEdit'    => true
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode(array($item->id)));
    }

    public function removeSticker(Request $request)
    {
        // possible exloit here
        // check for ownership
        $stickerId = $request->stickerId;
        $sticker = HomeItem::find($stickerId);
        if (!$sticker)
            return 'ERROR';

        if ($sticker->owner_id != user()->id)
            return 'ERROR';

        $sticker->update([
            'home_id'   => null,
            'group_id'  => null,
            'x'         => 0,
            'y'         => 0,
            'z'         => 0,
        ]);

        return response('SUCCESS', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($sticker->id));
    }


    public function inventoryItems(Request $request)
    {
        switch ($request->type) {
            case 'backgrounds':
                $items = HomeItem::where([['owner_id', user()->id], ['type', 'b']])->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')->select('cms_homes.*', 'cms_homes_store_items.class')->get();
                break;
            case 'stickers':
                $items = HomeItem::where([['owner_id', user()->id], ['home_id', null], ['group_id', null], ['type', 's']])
                    ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                    ->select('cms_homes.*', 'cms_homes_store_items.class', DB::raw('count(cms_homes.item_id) as amount'))->groupBy(['cms_homes.item_id'])->get();
                break;
            case 'widgets':
                $widgets = HomeItem::where([['owner_id', user()->id], ['type', 'w'], ['class', '!=', 'profilewidget']])
                    ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                    ->select('cms_homes.*', 'cms_homes_store_items.class', 'cms_homes_store_items.caption', 'cms_homes_store_items.description')->get();
                return view('home.inventory.widgets')->with('widgets', $widgets);
                break;
            default:
                return $request->type;
                break;
        }
        return view('home.inventory.items')->with([
            'items' => $items
        ]);
    }
}
