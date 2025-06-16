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
    public function storeMain(Request $request)
    {
        switch ($request->type) {
            case 'backgrounds':
                $categories = StoreCategory::where('type', 'b')->orderBy('order_num')->get();
                $items = $categories->first()->getItems();
                break;
            default:
            case 'stickers':
                $categories = StoreCategory::where('type', 's')->get();
                $items = $categories->first()->getItems();
                break;
        }

        $firstItem = $items->first();

        $data = [];
        if ($firstItem)
            $data = ['itemCount' => 1, 'previewCssClass' => "{$firstItem->type}_{$firstItem->class}_pre", 'titleKey' => ''];


        return response(view('home.store.main', [
            'categories'    => $categories,
            'items'         => $items
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode([$data]));
    }

    public function loadItems(Request $request)
    {
        return view('home.store.items')->with([
            'items' => StoreItem::where('category', $request->categoryId)->get()
        ]);
    }

    public function preview(Request $request)
    {
        $item = StoreItem::find($request->productId);
        if (!$item)
            return "Invalid item id: '{$request->productId}'";

        $data = [
            [
                'itemCount' => $item->amount,
                'previewCssClass' => "{$item->type}_{$item->class}_pre",
                'titleKey' => $item->caption
            ]
        ];

        if ($item->type == 'b')
            $data[0]['bgCssClass'] = "{$item->type}_{$item->class}";

        return response(view('home.store.preview', [
            'item' => $item
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }


    public function purchaseConfirm(Request $request)
    {
        return view('home.store.purchase_confirm')->with('item', StoreItem::find($request->productId));
    }

    public function purchaseStickers(Request $request)
    {
        $store = StoreItem::find($request->selectedId);
        if (!$store)
            return 'ERROR';

        HomeItem::create([
            'owner_id'  => user()->id,
            'type'      => $store->getFullType(),
            'amount'    => $store->amount,
            'item_id'   => $store->id
        ]);
        user()->updateCredits(-$store->price);
        return 'OK';
    }

    public function purchaseBackgrounds(Request $request)
    {
        $store = StoreItem::find($request->selectedId);
        if (!$store)
            return 'ERROR';

        HomeItem::create([
            'owner_id'  => user()->id,
            'type'      => $store->getFullType(),
            'amount'    => 1,
            'item_id'   => $store->id,
            'data'      => 'background'
        ]);
        user()->updateCredits(-$store->price);
        return 'OK';
    }

    public function backgroundWarning()
    {
        return view('home.store.background_warning');
    }
}
