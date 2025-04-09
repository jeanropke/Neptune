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

        if($group->getItems()->count() == 0)
        {
            HomeItem::insert(['owner_id' => $group->user_id, 'group_id' => $group->id, 'x' => '40',     'y' => '34',    'z' => '6', 'item_id' => '38',   'skin' => 'defaultskin']);
            HomeItem::insert(['owner_id' => $group->user_id, 'group_id' => $group->id, 'x' => '433',    'y' => '40',    'z' => '3', 'item_id' => '18',  'skin' => 'defaultskin']);
            HomeItem::insert(['owner_id' => $group->user_id, 'group_id' => $group->id, 'x' => '0',      'y' => '0',     'z' => '0', 'item_id' => '17',  'data' => 'background']);
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

        if($group->getItems()->count() == 0)
        {
            HomeItem::insert(['owner_id' => $group->user_id, 'group_id' => $group->id, 'x' => '40',     'y' => '34',    'z' => '6', 'item_id' => '38',   'skin' => 'defaultskin']);
            HomeItem::insert(['owner_id' => $group->user_id, 'group_id' => $group->id, 'x' => '433',    'y' => '40',    'z' => '3', 'item_id' => '18',  'skin' => 'defaultskin']);
            HomeItem::insert(['owner_id' => $group->user_id, 'group_id' => $group->id, 'x' => '0',      'y' => '0',     'z' => '0', 'item_id' => '17',  'data' => 'background']);
        }

        return view('groups.page')->with([
            'isEdit'    => false,
            'owner'     => Group::find($id)
        ]);
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
            'user_id'       => user()->id,
            'name'          => $request->name,
            'description'   => $request->description,
            'badge'         => 'b0503Xs09114s05013s05015',
            'date_created'  => time()
        ]);

        GroupMember::insert([
            'guild_id'      => $group->id,
            'user_id'       => user()->id,
            'level_id'      => 1,
            'member_since'  => time()
        ]);

        return view('habblet.ajax.grouppurchase.purchase_ajax')->with([
            'group' => Group::find(1)
        ]);
    }
    #endregion
}
