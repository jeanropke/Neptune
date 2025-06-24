<?php

namespace App\Http\Controllers;

use App\Models\Catalogue\CatalogueItem;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Home\HomeItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    public function groupUrl($url)
    {
        $group = Group::where('url', $url)->first();

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

    public function groupId($id)
    {
        $group = Group::find($id);

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
            'owner'     => Group::find($id)
        ]);
    }

    public function joinAfterLogin(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return redirect()->route('auth.login');

        $url = $group->getUrl();

        return redirect()->route('auth.login', ['page' => "groups/$url?join"]);
    }

    public function join(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

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

        return view('groups.actions.confirm_leave')->with('group', $group);
    }

    public function leave(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        $group->removeMember();

        return view('groups.actions.leave')->with('group', $group);
    }

    public function showBadgeEditor(Request $request)
    {
        if(!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if($group->owner_id != user()->id) return;

        return view('groups.actions.show_badge_editor')->with('group', $group);
    }

    public function updateGroupBadge(Request $request)
    {
        if(!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if($group->owner_id != user()->id) return;

        $group->update(['badge' => $request->code]);

        return redirect()->back();
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

        return view('habblet.ajax.grouppurchase.purchase_ajax')->with([
            'group' => $group
        ]);
    }
    #endregion
}
