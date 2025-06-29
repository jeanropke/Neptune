<?php

namespace App\Http\Controllers;

use App\Models\Catalogue\CatalogueItem;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\StoreItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /*
    public function groupUrl($url)
    {
        $group = Group::where('alias', $url)->first();

        if (!$group)
            return abort(404);

        if ($group->getItems()->count() == 0) {
            //guestbookwidget - gw
            HomeItem::insert(['owner_id' => $group->owner_id, 'group_id' => $group->id, 'x' => '40',     'y' => '34',    'z' => '6', 'item_id' => '12',   'skin' => 'defaultskin']);
            //groupinfowidget
            HomeItem::insert(['owner_id' => $group->owner_id, 'group_id' => $group->id, 'x' => '433',    'y' => '40',    'z' => '3', 'item_id' => '13',  'skin' => 'defaultskin']);
            //bg_pattern_abstract2
            HomeItem::insert(['owner_id' => $group->owner_id, 'group_id' => $group->id, 'x' => '0',      'y' => '0',     'z' => '0', 'item_id' => '28',  'data' => 'background']);
        }

        return view('groups.page')->with([
            'isEdit'    => false,
            'owner'     => $group
        ]);
    }
    */

    public function group(Request $request)
    {
        $group = Group::find($request->id);

        if (!$group)
            return abort(404);

        if ($group->getItems()->count() == 0) {
            //guestbookwidget - gw
            HomeItem::insert(['owner_id' => $group->owner_id, 'group_id' => $group->id, 'x' => '40',     'y' => '34',    'z' => '6', 'item_id' => '12',   'skin' => 'defaultskin']);
            //groupinfowidget
            HomeItem::insert(['owner_id' => $group->owner_id, 'group_id' => $group->id, 'x' => '433',    'y' => '40',    'z' => '3', 'item_id' => '13',  'skin' => 'defaultskin']);
            //bg_pattern_abstract2
            HomeItem::insert(['owner_id' => $group->owner_id, 'group_id' => $group->id, 'x' => '0',      'y' => '0',     'z' => '0', 'item_id' => '28',  'data' => 'background']);
        }

        return view('groups.page')->with([
            'editing'   => user() && user()->homeSession && user()->homeSession->group_id == $group->id,
            'owner'     => $group
        ]);
    }

    public function joinAfterLogin(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return redirect()->route('auth.login');

        $url = $group->getUrl();

        return redirect()->route('auth.login', ['page' => "groups/$url?join=true"]);
    }

    public function join(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id == user()->id) return;

        if ($group->addMember(user()->id)) {
            return view('groups.actions.join')->with([
                'group'     => $group,
                'message'   => 'You have now joined this group'
            ]);
        }

        return view('groups.actions.join')->with([
            'group'     => $group,
            'message'   => 'You are already a member of this group'
        ]);
    }

    public function confirmLeave(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id == user()->id) return;

        return view('groups.actions.confirm_leave')->with('group', $group);
    }

    public function leave(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id == user()->id) return;

        $group->removeMember();

        return view('groups.actions.leave')->with('group', $group);
    }

    public function confirmSelectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        return view('groups.actions.confirm_select_favorite')->with('group', $group);
    }

    public function selectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        $group->makeFavorite();

        return 'OK';
    }

    public function confirmDeselectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        return view('groups.actions.confirm_deselect_favorite')->with('group', $group);
    }

    public function deselectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        $group->removeFavorite();

        return 'OK';
    }

    public function showBadgeEditor(Request $request)
    {
        if (!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id != user()->id) return;

        return view('groups.actions.show_badge_editor')->with('group', $group);
    }

    public function updateGroupBadge(Request $request)
    {
        if (!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id != user()->id) return;

        $group->update(['badge' => $request->code]);

        return redirect()->back();
    }

    public function groupSettings(Request $request)
    {
        if (!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id != user()->id) return;

        return view('groups.actions.group_settings')->with('group', $group);
    }

    public function startEditing(Request $request)
    {
        if (!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id != user()->id) return;

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
        $widgets = StoreItem::where('type', 'gw')->get();
        foreach ($widgets as $widget) {
            $item = HomeItem::where([['owner_id', user()->id], ['group_id', $group->id], ['item_id', $widget->id]])->first();
            if (!$item) {
                HomeItem::insert(['owner_id' => user()->id, 'item_id' => $widget->id, 'group_id' => $group->id, 'skin' => 'defaultskin']);
            }
        }
        return redirect()->back();
    }

    public function saveEditing(Request $request)
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
                    if (!$home || $home->home_id)
                        continue;

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
                    if (!$home || $home->home_id)
                        continue;

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
                    if (!$home || $home->home_id)
                        continue;

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
            $storeItem = StoreItem::where([['type', 'b'], ['class', $bg] ])->first();
            if (!$storeItem)
                return;

            $bgInUse = HomeItem::where([['data', 'background'], ['group_id', $session->group_id]])->first();
            if ($bgInUse) {
                $bgInUse->update([
                    'group_id'  => null
                ]);
            }
            $home = HomeItem::where([['data', 'background'], ['owner_id', $session->user_id], ['item_id', $storeItem->id]])->first();
            if ($home) {
                $home->update([
                    'group_id'  => $session->group_id
                ]);
            }
        }

        $session->delete();
    }

    public function discussions($id)
    {
        return view('groups.discussions')->with([
            'group' => Group::find($id)
        ]);
    }



    #region Group purchase
    public function groupCreateForm(Request $request)
    {
        if (!Auth::check())
            return;

        $groupProduct = CatalogueItem::where('sale_code', $request->product)->first();
        if (!$groupProduct)
            return;

        if ($groupProduct->price > user()->credits)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'You do not have enough Coins to purchase a Group');

        return view('habblet.ajax.grouppurchase.group_create_form')->with('groupProduct', $groupProduct);
    }

    public function groupPurchaseConfirmation(Request $request)
    {
        $groupProduct = CatalogueItem::where('sale_code', $request->product)->first();
        if (!$groupProduct)
            return;

        if ($groupProduct->price > user()->credits)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'You do not have enough Coins to purchase a Group');

        if (strlen($request->name) < 1)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'The Group name is too short');

        if (strlen($request->name) > 30)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'The Group name is too long');

        return view('habblet.ajax.grouppurchase.purchase_confirmation')->with([
            'name'          => $request->name,
            'description'   => $request->description,
            'product'       => $groupProduct
        ]);
    }

    public function groupPurchaseAjax(Request $request)
    {
        $groupProduct = CatalogueItem::where('sale_code', $request->product)->first();
        if (!$groupProduct)
            return;


        if ($groupProduct->price > user()->credits)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'You do not have enough Coins to purchase a Group');

        if (strlen($request->name) < 1)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'The Group name is too short');

        if (strlen($request->name) > 30)
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'The Group name is too long');

        $group = Group::create([
            'owner_id'      => user()->id,
            'name'          => $request->name,
            'description'   => $request->description ?? ''
        ]);

        GroupMember::create([
            'group_id'      => $group->id,
            'user_id'       => user()->id,
            'member_rank'   => 3
        ]);

        return view('habblet.ajax.grouppurchase.purchase_ajax')->with([
            'group' => $group
        ]);
    }
    #endregion
}
