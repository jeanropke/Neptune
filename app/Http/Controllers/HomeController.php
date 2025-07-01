<?php

namespace App\Http\Controllers;

use App\Models\Home\HomeInventory;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\HomeUpdate;
use App\Models\Home\StoreCategory;
use App\Models\Home\StoreItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    public function homeTutorial()
    {
        return view('home.tutorial')->with('latests', HomeUpdate::orderBy('updated_at', 'DESC')->limit(10)->get());
    }

    public function homeUsername($username)
    {
        $owner = User::where('username', $username)->with('homeItems')->firstOrFail();

        $owner->ensureHomeItems();

        if (!$owner->cmsSettings->home_public)
            return view('home.private')->with(['user' => $owner]);

        $user = user();

        return view('home')->with([
            'editing' => $user && $user->homeSession && $user->homeSession->home_id == $owner->id,
            'owner'   => $owner
        ]);
    }

    public function homeId(Request $request)
    {
        $userinfo = User::findOrFail($request->id);

        return $this->homeUsername($userinfo->username);
    }

    public function startSession(Request $request)
    {
        if (!Auth::user()) {
            if ($request->groupId)
                return redirect("groups/{$request->groupId}/id");
            elseif ($request->homeId)
                return redirect("home/{$request->homeId}/id");
            return redirect("/");
        }

        $session = user()->homeSession;
        if ($session) {
            if ($session->group_id)
                return redirect("groups/{$session->group_id}/id");
            return redirect("home/{$session->home_id}/id");
        }

        HomeSession::create([
            'user_id'       => user()->id,
            'home_id'       => $request->homeId,
            'group_id'      => $request->groupId,
            'expires_at'    => time() + 60 * 60 //1 hour
        ]);

        //we need to create some items in case this user does not have them
        //like some widgets
        $widgets = StoreItem::where('type', 'w')->get();
        foreach ($widgets as $widget) {
            $item = HomeItem::where([['owner_id', user()->id], ['item_id', $widget->id]])->first();
            if (!$item) {
                HomeItem::insert(['owner_id' => user()->id, 'item_id' => $widget->id, 'skin' => 'defaultskin']);
            }
        }

        return redirect()->back();
    }

    public function saveHome($userId, Request $request)
    {
        $session = user()->homeSession;
        if (!$session) return;

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
                ['type', 'b'],
                ['class', $bg]
            ])->first();
            if (!$storeItem)
                return;

            $bgInUse = HomeItem::where([['data', 'background'], ['home_id', $session->user_id]])->first();
            if ($bgInUse) {
                $bgInUse->update([
                    'home_id'   => null,
                    'group_id'  => null
                ]);
            }
            $home = HomeItem::where([['data', 'background'], ['owner_id', $session->user_id], ['item_id', $storeItem->id]])->first();
            if ($home) {
                $home->update([
                    'home_id'   => $session->home_id,
                    'group_id'  => $session->group_id
                ]);
            }
        }

        HomeUpdate::updateOrCreate(
            ['user_id' =>  user()->id],
            ['updated_at' => Carbon::now()]
        );

        $session->delete();

        echo '<script language="JavaScript" type="text/javascript">waitAndGo("../../home/' . $userId . '/id");</script>';
    }

    public function cancelHome(Request $request)
    {
        $session = user()->homeSession;
        if (!$session) return;

        $session->delete();
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
            'items'         => StoreItem::where('category', $request->subCategoryId)->get()
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
            ['Inventory', 'Web Store']
        ];

        if ($firstSticker) {
            $item = StoreItem::find($firstSticker->item_id);
            if ($item) {
                array_push($data, ["s_{$item->class}_pre", "{$item->class}", "{$item->caption}", "Stickers", null, 1]);
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

        $session = user()->homeSession;
        if (!$session)
            return 'error: placeSticker > session expired';

        $item->update([
            'home_id'   => $session->home_id,
            'x'         => 20,
            'y'         => 30,
            'z'         => $request->zindex,
        ]);

        return response(view('home.sticker', [
            'item'      => $item->getStoreItem(),
            'id'        => $item->id,
            'zindex'    => $request->zindex,
            'editing'   => true
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($item->id));
    }

    public function removeSticker(Request $request)
    {
        $stickerId = $request->stickerId;
        $sticker = HomeItem::find($stickerId);
        if (!$sticker)
            return 'ERROR';

        if ($sticker->owner_id != user()->id)
            return 'ERROR';

        $sticker->update([
            'home_id'   => null,
            'group_id'  => null
        ]);

        return response('SUCCESS', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($sticker->id));
    }

    public function deleteStickie(Request $request)
    {
        $stickieId = $request->stickieId;
        $stickie = HomeItem::find($stickieId);
        if (!$stickie)
            return 'ERROR';

        if ($stickie->owner_id != user()->id)
            return 'ERROR';

        $stickie->update([
            'deleted_by' => user()->id
        ]);

        return response('SUCCESS', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($stickieId));
    }

    public function skinEdit(Request $request)
    {
        $itemId = null;
        $cssClass = null;
        $type = null;
        $skinId =  $request->skinId;

        if ($request->stickieId) {
            $itemId = $request->stickieId;
            $cssClass =  'n_skin_';
            $type = 'stickie';
        }

        if ($request->widgetId) {
            $itemId = $request->widgetId;
            $cssClass =  'w_skin_';
            $type = 'widget';
        }

        switch ($skinId) {
            case 1:
                $skin = 'defaultskin';
                break;
            case 2:
                $skin = 'speechbubbleskin';
                break;
            case 3:
                $skin = 'metalskin';
                break;
            case 4:
                $skin = 'noteitskin';
                break;
            case 5:
                $skin = 'notepadskin';
                break;
            case 6:
                $skin = 'goldenskin';
                break;
            case 7:
                $skin = 'hc_machineskin';
                break;
            case 8:
                $skin = 'hc_pillowskin';
                break;
            case 9:
                $skin = 'nakedskin';
                break;
            default:
                $skin = 'defaultskin';
                break;
        }
        HomeItem::find($itemId)->update(['skin' => $skin]);
        header('X-JSON: {"cssClass": "' . $cssClass . $skin . '", "type": "' . $type . '", "id": "' . $itemId . '"}');
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
}
