<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\StoreItem;
use Illuminate\Http\Request;

class WebStoreController extends Controller
{
    public function loadStore(Request $request)
    {
        switch ($request->type) {

            case 'backgrounds':
                $items = StoreItem::where([['owner_id', user()->id], ['type', 'b']])->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')->select('cms_homes.*', 'cms_homes_store_items.class')->get();
                break;
            case 'widgets':
                $widgets = HomeItem::where([['owner_id', user()->id], ['type', 'w'], ['class', '!=', 'profilewidget']])
                    ->join('cms_homes_store_items', 'cms_homes_store_items.id', 'cms_homes.item_id')
                    ->select('cms_homes.*', 'cms_homes_store_items.class', 'cms_homes_store_items.caption', 'cms_homes_store_items.description')->get();
                return view('home.inventory.widgets')->with('widgets', $widgets);
                break;
            default:
            case 'stickers':
                $items = StoreItem::where('type', 's')->get();
                break;
        }
        return view('home.store.items')->with('items', $items);
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
}
