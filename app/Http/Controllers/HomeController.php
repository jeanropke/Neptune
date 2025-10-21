<?php

namespace App\Http\Controllers;

use App\Models\GameHistory;
use App\Models\Home\HomeInventory;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\HomeUpdate;
use App\Models\Home\Sticker;
use App\Models\Home\StickerStore;
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

        if ($owner->cmsSettings && !$owner->cmsSettings->home_public)
            return view('home.private')->with(['user' => $owner]);

        return view('home')->with([
            'editing' => session('editing'),
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

        session(['editing' => true]);

         //we need to create some items in case this user does not have them
        //like some widgets
        $widgets = StickerStore::where('type', '2')->get();
        foreach ($widgets as $widget) {
            $item = Sticker::where([['user_id', user()->id], ['sticker_id', $widget->id]])->first();
            if (!$item) {
                Sticker::insert(['user_id' => user()->id, 'sticker_id' => $widget->id]);
            }
        }

        return redirect()->back();
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
                    $home = Sticker::find($id);
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
                    $home = Sticker::find($id);
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
                    $home = Sticker::find($id);
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

        //if (!empty($background[1])) {
        //    $bg = str_replace('b_', '', $background[1]);
        //    $storeItem = StoreItem::where([
        //        ['type', 'b'],
        //        ['class', $bg]
        //    ])->first();
        //    if (!$storeItem)
        //        return;
//
        //    $bgInUse = HomeItem::where([['data', 'background'], ['home_id', $session->user_id]])->first();
        //    if ($bgInUse) {
        //        $bgInUse->update([
        //            'home_id'   => null,
        //            'group_id'  => null
        //        ]);
        //    }
        //    $home = HomeItem::where([['data', 'background'], ['owner_id', $session->user_id], ['item_id', $storeItem->id]])->first();
        //    if ($home) {
        //        $home->update([
        //            'home_id'   => $session->home_id,
        //            'group_id'  => $session->group_id
        //        ]);
        //    }
        //}

        session(['editing' => false]);

        //HomeUpdate::updateOrCreate(
        //    ['user_id' =>  user()->id],
        //    ['updated_at' => Carbon::now()]
        //);

        echo '<script language="JavaScript" type="text/javascript">waitAndGo("../../home/' . $userId . '/id");</script>';
    }

    public function cancelHome(Request $request)
    {
        session(['editing' => false]);
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
        Sticker::find($itemId)->update(['skin_id' => $skinId]);
        header('X-JSON: {"cssClass": "' . $cssClass . $skin . '", "type": "' . $type . '", "id": "' . $itemId . '"}');
    }
}
