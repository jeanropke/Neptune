<?php

namespace App\Http\Controllers;

use App\Models\Catalogue\CatalogueItem;
use App\Models\Catalogue\Item;
use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Home\HomeItem;
use App\Models\Home\HomeSession;
use App\Models\Home\StoreItem;
use App\Models\Neptune\ItemOffer;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function group(Request $request)
    {
        $group = $request->id ? Group::with('items')->findOrFail($request->id) : Group::with('items')->where('alias', $request->alias)->firstOrFail();

        $group->ensureGroupHomeItems();

        $user = user();

        return view('groups.page')->with([
            'editing' => $user && $user->homeSession && $user->homeSession->group_id == $group->id,
            'owner'   => $group,
        ]);
    }

    public function joinAfterLogin(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) {
            return redirect()->route('auth.login');
        }

        $url = $group->getUrl();
        $query = http_build_query([
            'page' => "groups/$url?join=true",
        ]);

        return redirect()->to(route('auth.login') . '?' . $query);
    }

    public function join(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) {
            abort(404, 'Group not found.');
        }

        if ($group->owner_id == user()->id) {
            return view('groups.actions.join')->with('message', 'You are the owner of this group.');
        }

        if ($group->addMember(user()->id)) {
            return view('groups.actions.join')->with([
                'group'   => $group,
                'message' => 'You have now joined this group'
            ]);
        }

        return view('groups.actions.join')->with([
            'group'   => $group,
            'message' => 'You are already a member of this group'
        ]);
    }

    public function confirmLeave(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) {
            abort(404, 'Group not found.');
        }

        if ($group->owner_id == user()->id) {
            return view('groups.actions.confirm_leave')->with('message', 'Group owners cannot leave their own group.');
        }

        return view('groups.actions.confirm_leave')->with('group', $group);
    }

    public function leave(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) {
            abort(404, 'Group not found.');
        }

        if ($group->owner_id == user()->id) {
            return back()->with('message', 'Group owners cannot leave their own group.');
        }

        $group->removeMember(user()->id);

        return view('groups.actions.leave')->with('group', $group);
    }

    public function confirmSelectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) {
            abort(404, 'Group not found.');
        }

        return view('groups.actions.confirm_select_favorite')->with('group', $group);
    }

    public function selectFavorite(Request $request)
    {
        $user = user();
        $group = Group::find($request->groupId);

        if (!$group) {
            return response('Group not found.', 404);
        }

        if (!$user) {
            return response('Unauthorized.', 401);
        }

        $group->makeFavorite($user->id);

        return response('OK', 200);
    }

    public function confirmDeselectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) {
            abort(404, 'Group not found.');
        }

        return view('groups.actions.confirm_deselect_favorite')->with('group', $group);
    }

    public function deselectFavorite(Request $request)
    {
        $group = Group::find($request->groupId);
        $user = user();

        if (!$group) {
            return response('Group not found.', 404);
        }
        if (!$user) {
            return response('Unauthorized.', 401);
        }

        $group->removeFavorite($user->id);

        return response('OK', 200);
    }

    public function showBadgeEditor(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        return view('groups.actions.show_badge_editor')->with('group', $group);
    }

    public function updateGroupBadge(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'code' => 'required|string',
        ]);

        $group->update(['badge' => $validated['code']]);

        return redirect()->back()->with('success', 'Group badge updated successfully.');
    }

    public function groupSettings(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        return view('groups.actions.group_settings')->with('group', $group);
    }

    public function checkGroupUrl(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        if ($group->alias != null) {
            return response("ERROR You already edited the group URL.");
        }

        if (Group::where('alias', $request->url)->exists()) {
            return response("ERROR This URL is already in use.");
        }

        $url = url("/groups/$request->url");
        return response("Your group alias will be $url. You can not alter it later on.");
    }

    public function updateGroupSettings(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        if ($group->alias && $group->alias != $request->url) {
            return response("You already edited the group URL.");
        }

        $group->update([
            'name'              => $request->name,
            'description'       => $request->description,
            'group_type'        => $request->type,
            'forum_type'        => $request->forumType,
            'forum_premission'  => $request->newTopicPermission,
            'alias'             => $request->url
        ]);

        return view('groups.actions.update_group_settings', compact('group'));
    }

    public function confirmDeleteGroup(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        return view('groups.actions.confirm_delete_group', compact('group'));
    }

    public function deleteGroup(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group || !user() || $group->owner_id !== user()->id) {
            return abort(403, 'Unauthorized');
        }

        $group->delete();
        return response('deleteGroup');
    }

    public function startEditing(Request $request)
    {
        $user = user();

        if (!$user) {
            return abort(403, 'Unauthorized');
        }

        $group = Group::find($request->groupId);

        if (!$group || $group->owner_id !== $user->id) {
            return abort(403, 'Unauthorized');
        }

        $session = $user->homeSession;

        if ($session) {
            if ($session->group_id) {
                return redirect("groups/{$session->group_id}/id");
            }
            return redirect("home/{$session->home_id}/id");
        }

        HomeSession::create([
            'user_id'    => $user->id,
            'home_id'    => $request->homeId,
            'group_id'   => $request->groupId,
            'expires_at' => time() + 3600, // 1 hour
        ]);


        //we need to create some items in case this user does not have them
        //like some widgets
        $widgets = StoreItem::where('type', 'gw')->get();
        foreach ($widgets as $widget) {
            HomeItem::firstOrCreate(
                [
                    'item_id'  => $widget->id,
                    'owner_id' => $user->id,
                    'group_id' => $group->id,
                ],
                [
                    'skin' => 'defaultskin',
                ]
            );
        }
        return redirect()->back();
    }

    public function saveEditing(Request $request)
    {
        $session = user()->homeSession;
        if (!$session) return;

        $this->updatePositions($request->stickienotes);
        $this->updatePositions($request->widgets);
        $this->updatePositions($request->stickers);

        $background = explode(':', $request->background);
        if (!empty($background[1])) {
            $bg = str_replace('b_', '', $background[1]);

            $storeItem = StoreItem::where([['type', 'b'], ['class', $bg]])->first();
            if (!$storeItem) return;

            HomeItem::where([
                ['data', 'background'],
                ['group_id', $session->group_id]
            ])->update(['group_id' => null]);

            HomeItem::where([
                ['data', 'background'],
                ['owner_id', $session->user_id],
                ['item_id', $storeItem->id]
            ])->update(['group_id' => $session->group_id]);
        }

        $session->delete();
    }

    private function updatePositions(?string $input): void
    {
        if (empty($input)) return;

        foreach (explode('/', $input) as $raw) {
            if (empty($raw)) continue;

            $bits = explode(':', $raw);
            if (count($bits) < 2) continue;

            [$id, $data] = $bits;
            if (!is_numeric($id) || empty($data)) continue;

            $coords = explode(',', $data);
            if (count($coords) !== 3) continue;

            [$x, $y, $z] = $coords;
            if (!is_numeric($x) || !is_numeric($y) || !is_numeric($z)) continue;

            $home = HomeItem::find($id);
            if (!$home || $home->home_id) continue;

            $home->update([
                'x' => $x,
                'y' => $y,
                'z' => $z,
            ]);
        }
    }

    public function discussions(Request $request)
    {
        $group = $request->id ? Group::findOrFail($request->id) : Group::where('alias', $request->alias)->firstOrFail();
        $threads = $group->threads()
            ->whereHas('reply', function ($query) {
                $query->where('is_deleted', '0');
            })
            ->with(['reply', 'author'])
            ->paginate(10);

        return view('groups.discussions')->with(['group' => $group, 'threads' => $threads]);
    }

    #region Group purchase

    public function groupCreateForm(Request $request)
    {
        $user = user();

        if (!$user) {
            return response('Unauthorized', 401);
        }

        $groupProduct = ItemOffer::where('salecode', $request->product)->first();

        if (!$groupProduct) {
            return response('Product not found', 404);
        }

        if ($groupProduct->price > $user->credits) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with([
                'message' => 'You do not have enough Coins to purchase a Group'
            ]);
        }

        return view('habblet.ajax.grouppurchase.group_create_form')->with([
            'groupProduct' => $groupProduct
        ]);
    }

    public function groupPurchaseConfirmation(Request $request)
    {
        $user = user();

        if (!$user) {
            return response('Unauthorized', 401);
        }

        $groupProduct = ItemOffer::where('salecode', $request->product)->first();

        if (!$groupProduct) {
            return response('Product not found', 404);
        }

        if ($groupProduct->price > $user->credits) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with([
                'message' => 'You do not have enough Coins to purchase a Group'
            ]);
        }

        $name = trim($request->name);
        if (strlen($name) < 1) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with([
                'message' => 'The Group name is too short'
            ]);
        }

        if (strlen($name) > 30) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with([
                'message' => 'The Group name is too long'
            ]);
        }

        return view('habblet.ajax.grouppurchase.purchase_confirmation')->with([
            'name'        => $name,
            'description' => $request->description,
            'product'     => $groupProduct
        ]);
    }

    public function groupPurchaseAjax(Request $request)
    {
        $user = user();

        if (!$user) {
            return response('Unauthorized', 401);
        }

        $groupProduct = ItemOffer::where('salecode', $request->product)->first();
        if (!$groupProduct) {
            return response('Product not found', 404);
        }

        if ($groupProduct->price > $user->credits) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'You do not have enough Coins to purchase a Group');
        }

        $name = trim($request->name);
        if (strlen($name) < 1) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'The Group name is too short');
        }

        if (strlen($name) > 30) {
            return view('habblet.ajax.grouppurchase.purchase_result')->with('message', 'The Group name is too long');
        }

        $group = Group::create([
            'owner_id'    => $user->id,
            'name'        => $name,
            'description' => $request->description ?? ''
        ]);

        $user->updateCredits(-$groupProduct->price);

        return view('habblet.ajax.grouppurchase.purchase_ajax')->with([
            'group' => $group
        ]);
    }

    #endregion
}
