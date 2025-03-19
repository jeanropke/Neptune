<?php

namespace App\Http\Controllers;

use App\Models\Home\HomeInventory;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\StoreCategory;
use App\Models\Home\StoreItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function startSession(Request $request)
    {
        $session = HomeSession::find(user()->id);
        if($session) {
            if($session->group_id)
                return redirect("groups/{$session->group_id}/id");
            return redirect("home/{$session->home_id}/id");
        }

        HomeSession::create([
            'user_id'       => user()->id,
            'home_id'       => $request->homeId,
            'group_id'      => $request->groupId,
            'expires_at'    => time() + 60 * 60 //1 hour
        ]);

        return redirect()->back();
    }

    public function home($username = null)
    {
        if (!$username)
            return 'show my home';

        $user = User::where('username', $username)->first();
        if (!$user)
            return 'home 404';

        if (!$user->getCmsSettings()->home_public) //habbo home disable
            return view('home.private')->with(['user' => $user]);

        $isEdit = false;

        if (Auth::check()) {
            $session = HomeSession::find(user()->id);
            $isEdit = $session && ((user()->rank > 5 && $session->home_id) || (user()->id == $user->id && $session->home_id));
        }

        return view('home')->with([
            'items'     => HomeItem::where('home_id', $user->id)->get(),
            'user'      => $user,
            'isEdit'    => $isEdit
        ]);
    }

    public function homeId($userId)
    {
        $userinfo = User::find($userId);
        if (!$userinfo)
            return 'home 404';

        return $this->home($userinfo->username);
    }

    public function saveHome($userId, Request $request)
    {
        $stickienotes = $request->stickienotes;
        $widgets = $request->widgets;
        $stickers = $request->stickers;
        $background = $request->background;

        $note = explode('/', $stickienotes);
        $widget = explode('/', $widgets);
        $sticker = explode('/', $stickers);
        $background = explode(':', $background);

        foreach ($note as $raw) {
            if (strlen($raw) == 0)
                continue;

            $bits = explode(':', $raw);
            $id = $bits[0];
            $data = $bits[1];

            if (!empty($data) && !empty($id) && is_numeric($id)) {
                $coordinates = explode(',', $data);
                $x = $coordinates[0];
                $y = $coordinates[1];
                $z = $coordinates[2];
                if (is_numeric($x) && is_numeric($y) && is_numeric($z)) {
                    $home = HomeItem::find($id);
                    if (!$home)
                        return;

                    $home->update([
                        'x' => $x,
                        'y' => $y,
                        'z' => $z,
                    ]);
                }
            }
        }

        foreach ($widget as $raw) {
            if (strlen($raw) == 0)
                continue;

            $bits = explode(':', $raw);
            $id = $bits[0];
            $data = $bits[1];
            if (!empty($data) && !empty($id) && is_numeric($id)) {
                $coordinates = explode(',', $data);
                $x = $coordinates[0];
                $y = $coordinates[1];
                $z = $coordinates[2];
                if (is_numeric($x) && is_numeric($y) && is_numeric($z)) {
                    $home = HomeItem::find($id);
                    if (!$home)
                        return;

                    $home->update([
                        'x' => $x,
                        'y' => $y,
                        'z' => $z,
                    ]);
                }
            }
        }

        foreach ($sticker as $raw) {
            if (strlen($raw) == 0)
                continue;

            $bits = explode(':', $raw);
            $id = $bits[0];
            $data = $bits[1];
            if (!empty($data) && !empty($id) && is_numeric($id)) {
                $coordinates = explode(',', $data);
                $x = $coordinates[0];
                $y = $coordinates[1];
                $z = $coordinates[2];
                if (is_numeric($x) && is_numeric($y) && is_numeric($z)) {
                    $home = HomeItem::find($id);
                    if (!$home)
                        return;

                    $home->update([
                        'x' => $x,
                        'y' => $y,
                        'z' => $z,
                    ]);
                }
            }
        }

        if (!empty($background[1])) {
            $bg = str_replace('b_', '', $background[1]);
            $storeItem = StoreItem::where([
                ['type', '=', 'b'],
                ['class', '=', $bg]
            ])->first();
            if (!$storeItem)
                return;

            $homeInventory = HomeInventory::where([['type', '=', 'background'], ['user_id', '=', $userId], ['item_id', '=', $storeItem->id]])->first();
            if ($homeInventory) {
                $home = HomeItem::where([['type', 'background'], ['user_id', $userId]])->first();
                $home->update([
                    'data' => $bg
                ]);
            }
        }

        echo '<script language="JavaScript" type="text/javascript">waitAndGo("../home/' . $userId . '/id");</script>';
    }

    /**
     * WEBSTORE & INVENTORY FUNCTIONS
     */
    public function storeMain()
    {
        $categories = StoreCategory::all();
        $items = $categories->first()->getChildrens()->first()->getItems();
        $firstItem = $items->first();
        return response(view('home.store.main', [
            'categories'    => $categories,
            'items'         => $items
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode([['Inventory', 'Web Store'], [['itemCount' => 1, 'previewCssClass' => "{$firstItem->type}_{$firstItem->class}_pre", 'titleKey' => '']]]));
    }

    public function getStoreItems(Request $request)
    {
        return view('home.store.items')->with([
            'items' => StoreItem::where('category', $request->subCategoryId)->get()
        ]);
    }

    public function previewItem(Request $request)
    {
        $store = StoreItem::find($request->productId);
        if (!$store)
            return 'ERROR';

        $data = [
            [
                'itemCount' => $store->amount,
                'previewCssClass' => "{$store->type}_{$store->class}_pre",
                'titleKey' => $store->caption
            ]
        ];

        if ($store->type == 'b')
            $data[0]['bgCssClass'] = "{$store->type}_{$store->class}";

        // multiple items
        //$data = [["itemCount"=>1,"previewCssClass"=>"b_bg_colour_03_pre","titleKey"=>"bg_colour_03"],["itemCount"=>1,"previewCssClass"=>"b_bg_colour_04_pre","titleKey"=>"bg_colour_04"]];

        return response(view('home.store.preview', [
            'item' => $store
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function backgroundWarning()
    {
        return view('home.store.background_warning');
    }

    public function inventoryMain()
    {
        $stickers = HomeItem::where([
            ['type', 'sticker'],
            ['owner_id', user()->id],
            ['group_id', null],
            ['home_id', null]
        ])->select('id', 'owner_id', 'item_id', 'data', 'type', DB::raw('count(item_id) as amount'))->groupBy(['item_id'])->get();

        $firstSticker = $stickers->first();

        $data = [
            ['Inventory','Web Store']
        ];

        if ($firstSticker) {
            $item = StoreItem::find($firstSticker->item_id);
            if($item) {
                array_push($data, ["s_{$item->class}_pre","{$item->class}","{$item->caption}","Stickers",null,1]);
            }
        }
        return response(view('home.store.main', [
            'categories' => StoreCategory::all(),
            'inventory' => $stickers
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function inventoryItems(Request $request)
    {
        $inventory = HomeItem::where([
            ['type', substr_replace($request->type, "", -1)], //remove last 's'
            ['owner_id', user()->id],
            ['group_id', null],
            ['home_id', null]
        ])->select('id', 'owner_id', 'item_id', 'data', 'type', DB::raw('count(item_id) as amount'))->groupBy(['item_id'])->get();

        return view('home.inventory.items')->with([
            'items' => $inventory
        ]);
    }

    public function inventoryPreview(Request $request)
    {
        $item = HomeItem::find($request->itemId);
        if (!$item)
            return "Invalid item id: '{$request->itemId}'";

        $store = $item->getStoreItem();
        $data = ["{$store->type}_{$store->class}_pre","{$store->type}_{$store->class}","{$store->caption}","{$item->getFullType()}",null,$item->amount];

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
        if(!$session)
            return 'error: placeSticker > session expired';

        $item->update([
            'home_id'   => $session->home_id,
            'x'         => 20,
            'y'         => 30,
            'z'         => $request->zindex,
        ]);

        return response(view('home.sticker', [
            'item'   => $item->getStoreItem(),
            'id'     => $item->id,
            'zindex' => $request->zindex,
            'isEdit' => true
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($item->id));
    }

    public function removeSticker(Request $request)
    {
        $stickerId = $request->stickerId;
        $sticker = HomeItem::find($stickerId);
        if(!$sticker)
            return 'ERROR';

        if($sticker->owner_id != user()->id)
            return 'ERROR';

        $sticker->update([
            'home_id'   => null,
            'group_id'  => null
        ]);

        return response('SUCCESS', 200)
                ->header('Content-Type', 'application/json')
                ->header('X-JSON', json_encode($sticker->id));
    }

    public function purchaseConfirm(Request $request)
    {
        return view('home.store.purchase_confirm')->with('item', StoreItem::find($request->productId));
    }

    public function purchaseDone(Request $request)
    {
        //"task":"purchase","selectedId":"3"
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

    public function noteEditor()
    {
        return view('home.inventory.editor');
    }
}
