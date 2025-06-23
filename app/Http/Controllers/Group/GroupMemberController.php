<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\CmsUserSettings;
use App\Models\Group;
use App\Models\Group\GroupReply;
use App\Models\Group\GroupTopic;
use App\Models\GroupMember;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupMemberController extends Controller
{
    public function listing(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group)
            return;

        $members = $group->getMembers($request->searchString);
        $page = $request->pageNumber;

        $pending = $group->getPendingMembers()->count();
        $count = $members->count();

        $data = array(
            'pending'   => "Pending members ($pending)",
            'members'   => "Members ($count)"
        );

        if ($request->pending) {
            return response(view('groups.member.listing')->with([
                'totalPages'    => ceil($pending / 16),
                'page'          => $page,
                'members'       => $group->getPendingMembers(),
                'myself'        => $group->getMember(user()->id),
                'group'         => $group,
                'pending'       => true
            ]), 200)
                ->header('Content-Type', 'application/json')
                ->header('X-JSON', json_encode($data));
        }

        return response(view('groups.member.listing')->with([
            'totalPages'    => ceil($members->count() / 16),
            'page'          => $page,
            'members'       => $members,
            'myself'        => $group->getMember(user()->id),
            'group'         => $group
        ]), 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function avatarinfo(Request $request)
    {
        return view('groups.member.memberlist_avatarinfo')->with([
            'member'    => User::find($request->theAccountId)
        ]);
    }

    public function confirmGiveRights(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        $targetIds = explode(',', $request->targetIds);
        $targets = User::find($targetIds)->pluck('username')->implode(', ');

        return view('groups.member.confirm_give_rights')->with('targets', $targets);
    }

    public function giveRights(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        GroupMember::where('group_id', $group->id)
            ->whereIn('user_id', explode(',', $request->targetIds))
            ->update(['member_rank' => '2']);

        return "OK";
    }

    public function confirmRevokeRights(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        $targets = $group->getMembers()->whereIn('user_id', explode(',', $request->targetIds))->pluck('username')->implode(', ');

        return view('groups.member.confirm_remove_rights')->with('targets', $targets);
    }

    public function revokeRights(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        GroupMember::where('group_id', $group->id)
            ->whereIn('user_id', explode(',', $request->targetIds))
            ->update(['member_rank' => '1']);

        return "OK";
    }

    public function confirmRemove(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        $targets = $group->getMembers()->whereIn('user_id', explode(',', $request->targetIds))->pluck('username')->implode(', ');

        return view('groups.member.confirm_remove')->with('targets', $targets);
    }

    public function remove(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        GroupMember::where('group_id', $group->id)
            ->whereIn('user_id', explode(',', $request->targetIds))
            ->delete();

        CmsUserSettings::whereIn('user_id', explode(',', $request->targetIds))
            ->where('favorite_group', $group->id)
            ->update(['favorite_group' => null]);

        return "OK";
    }

    public function confirmAccept(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        $targets = $group->getPendingMembers()->whereIn('user_id', explode(',', $request->targetIds))->pluck('username')->implode(', ');

        return view('groups.member.confirm_accept')->with('targets', $targets);
    }

    public function accept(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        GroupMember::where('group_id', $group->id)
            ->whereIn('user_id', explode(',', $request->targetIds))
            ->update(['is_pending' => 0]);

        return "OK";
    }

    public function confirmDecline(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        $targets = $group->getPendingMembers()->whereIn('user_id', explode(',', $request->targetIds))->pluck('username')->implode(', ');

        return view('groups.member.confirm_decline')->with('targets', $targets);
    }

    public function decline(Request $request)
    {
        $group = Group::find($request->groupId);
        if (!$group) return;

        GroupMember::where('group_id', $group->id)
            ->whereIn('user_id', explode(',', $request->targetIds))
            ->delete();

        return "OK";
    }
}
