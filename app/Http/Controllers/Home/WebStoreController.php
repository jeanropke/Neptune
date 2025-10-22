<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\Sticker;
use App\Models\Home\StickerCategory;
use App\Models\Home\StickerStore;
use Illuminate\Http\Request;

class WebStoreController extends Controller
{
    public function storeMain(Request $request)
    {
        $type = $request->type === 'stickers' ? '1' : '2';
        $categories = StickerCategory::where('category_type', $type)->orderBy('name')->with('items')->get();
        $items = $categories->first()?->items ?? collect();

        $data = [];
        if ($items->isNotEmpty()) {
            $first = $items->first();
            $data = [
                'itemCount'       => 1,
                'previewCssClass' => "{$first->shortType}_{$first->data}_pre",
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
        $items = StickerStore::where('category_id', $request->categoryId)->get();
        return view('home.store.items', compact('items'));
    }

    public function preview(Request $request)
    {
        $item = StickerStore::find($request->productId);
        if (!$item) {
            return "Invalid item id: '{$request->productId}'";
        }

        $data = [[
            'itemCount'       => $item->amount,
            'previewCssClass' => "{$item->shortType}_{$item->data}_pre",
            'titleKey'        => $item->name,
        ]];

        if ($item->type == '4') {
            $data[0]['bgCssClass'] = "{$item->shortType}_{$item->data}";
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
        $item = StickerStore::find($request->productId);
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
        $store = StickerStore::find($itemId);
        if (!$store) {
            return response('ERROR');
        }

        //background check
        if ($store->type == 4) {
            $sticker = Sticker::where([['user_id', user()->id], ['sticker_id', $store->id]]);
            if ($sticker->count() > 0)
                return view('home.store.error')->with('message', 'You can\'t purchase an already owned background!');
        }

        for ($i = 0; $i < $store->amount; $i++) {
            Sticker::create([
                'user_id'       => user()->id,
                'sticker_id'    => $store->id
            ]);
        }

        user()->updateCredits(-$store->price);

        return response('OK');
    }
}
