<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeItem;
use App\Models\Home\StoreCategory;
use App\Models\Home\StoreItem;
use Illuminate\Http\Request;

class WebStoreController extends Controller
{
    public function storeMain(Request $request)
    {
        $type = $request->type === 'backgrounds' ? 'b' : 's';
        $categories = StoreCategory::where('type', $type)->with('items')->orderBy('order_num')->get();
        $items = $categories->first()?->items ?? collect();

        $data = [];
        if ($items->isNotEmpty()) {
            $first = $items->first();
            $data = [
                'itemCount'       => 1,
                'previewCssClass' => "{$first->type}_{$first->class}_pre",
                'titleKey'        => ''
            ];
        }

        return response(
            view('home.store.main', compact('categories', 'items')),
            200
        )
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode([$data]));
    }

    public function loadItems(Request $request)
    {
        $items = StoreItem::where('category', $request->categoryId)->get();
        return view('home.store.items', compact('items'));
    }

    public function preview(Request $request)
    {
        $item = StoreItem::find($request->productId);
        if (!$item) {
            return "Invalid item id: '{$request->productId}'";
        }

        $data = [[
            'itemCount'       => $item->amount,
            'previewCssClass' => "{$item->type}_{$item->class}_pre",
            'titleKey'        => $item->caption,
        ]];

        if ($item->type === 'b') {
            $data[0]['bgCssClass'] = "{$item->type}_{$item->class}";
        }

        return response(
            view('home.store.preview', compact('item')),
            200
        )
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function purchaseConfirm(Request $request)
    {
        $item = StoreItem::find($request->productId);
        return view('home.store.purchase_confirm', compact('item'));
    }

    public function purchaseStickers(Request $request)
    {
        return $this->handlePurchase($request->selectedId);
    }

    public function purchaseBackgrounds(Request $request)
    {
        return $this->handlePurchase($request->selectedId, true);
    }

    public function backgroundWarning()
    {
        return view('home.store.background_warning');
    }

    private function handlePurchase($itemId, bool $isBackground = false)
    {
        $store = StoreItem::find($itemId);
        if (!$store) {
            return response('ERROR');
        }

        HomeItem::create([
            'owner_id' => user()->id,
            'type'     => $store->getFullType(),
            'amount'   => $isBackground ? 1 : $store->amount,
            'item_id'  => $store->id,
            'data'     => $isBackground ? 'background' : null,
        ]);

        user()->updateCredits(-$store->price);

        return response('OK');
    }
}
