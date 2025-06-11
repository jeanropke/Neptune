<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\StoreCategory;
use App\Models\Home\StoreItem;
use Illuminate\Http\Request;

class WebStoreController extends Controller
{
    public function loadStore(Request $request)
    {
        switch ($request->type) {

            case 'backgrounds':
                $items = StoreItem::where('type', 'b')->get();
                break;
            default:
            case 'stickers':
                $items = StoreItem::where('type', 's')->get();
                break;
        }
        return view('home.store.main')->with([
            'items'         =>  $items,
            'categories'    => StoreCategory::where('type', 's')->get(),
        ]);
    }

    public function loadItems(Request $request)
    {
        $items = StoreItem::where('category', $request->subCategoryId)->get();
        return view('home.store.items')->with([
            'items' =>  $items
        ]);
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
