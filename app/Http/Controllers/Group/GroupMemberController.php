<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Str;

class GroupMemberController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            function (Request $request, Closure $next) {
                $group = Group::findOrFail($request->groupId);
                abort_unless($group->owner->id == user()->id, 403);
                $request->merge(['group' => $group]);
                return $next($request);
            }
        ];
    }

    public function listing(Request $request)
    {
        $group = $request->group;
        $page = $request->pageNumber ?? 1;
        $perPage = 16;
        $isPending = (bool) $request->pending;

        $query = $isPending ? $group->pendingMembers($request->searchString) : $group->allMembers($request->searchString);

        $total = $query->count();
        $members = $query->skip(($page - 1) * $perPage)->take($perPage);

        $data = [
            'pending' => 'Pending members (' . $group->pendingMembers()->count() . ')',
            'members' => 'Members (' . $group->allMembers()->count() . ')',
        ];

        return response(
            view('groups.member.listing', compact('total', 'page', 'members', 'group', 'isPending') + [
                'totalPages' => ceil($total / $perPage),
                'myself' => $group->getMember(user()->id),
            ]),
            200
        )
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode($data));
    }

    public function avatarinfo(Request $request)
    {
        return view('groups.member.memberlist_avatarinfo', [
            'member' => User::findOrFail($request->theAccountId),
        ]);
    }

    protected function extractTargets(Request $request): array
    {
        $ids = $request->targetIds ?? $request->targetAccountId;
        return is_string($ids) ? explode(',', $ids) : (array) $ids;
    }

    protected function renderConfirmation(Group $group, array $targetIds, string $view)
    {
        $targets = $group->members->whereIn('user_id', $targetIds)->pluck('username')->implode(', ');
        return view("groups.member.$view", compact('targets'));
    }

    public function confirmGiveRights(Request $request)
    {
        return $this->renderConfirmation($request->group, $this->extractTargets($request), 'confirm_give_rights');
    }

    public function giveRights(Request $request)
    {
        $request->group->members()->whereIn('user_id', $this->extractTargets($request))->update(['member_rank' => '2']);
        return response('OK');
    }

    public function confirmRevokeRights(Request $request)
    {
        return $this->renderConfirmation($request->group, $this->extractTargets($request), 'confirm_remove_rights');
    }

    public function revokeRights(Request $request)
    {
        $request->group->members()->whereIn('user_id', $this->extractTargets($request))->update(['member_rank' => '3']);
        return response('OK');
    }

    public function confirmRemove(Request $request)
    {
        return $this->renderConfirmation($request->group, $this->extractTargets($request), 'confirm_remove');
    }

    public function remove(Request $request)
    {
        $ids = $this->extractTargets($request);
        $request->group->pendingMembers()->whereIn('user_id', $ids)->delete();
        User::whereIn('id', $ids)->where('favourite_group', $request->group->id)->update(['favourite_group' => 0]);
        return response('OK');
    }

    public function confirmAccept(Request $request)
    {
        $targets = $request->group->pendingMembers()->whereIn('user_id', $this->extractTargets($request))->pluck('user.username')->implode(', ');
        return view('groups.member.confirm_accept', compact('targets'));
    }

    public function accept(Request $request)
    {
        if($this->allMembers()->count() >= 500 && $this->group_type != 3) {
            return view('groups.actions.join')->with([
                'group'   => $this,
                'message' => 'This group is full'
            ]);
        }

        $request->group->pendingMembers()
            ->whereIn('user_id', $this->extractTargets($request))
            ->each(function ($member) {
                $member->update(['is_pending' => 0]);
            });

        return response('OK');
    }

    public function confirmDecline(Request $request)
    {
        $targets = $request->group->pendingMembers()->whereIn('user_id', $this->extractTargets($request))->pluck('user.username')->implode(', ');
        return view('groups.member.confirm_decline', compact('targets'));
    }

    public function decline(Request $request)
    {
        $request->group->pendingMembers()
            ->whereIn('user_id', $this->extractTargets($request))->each(function ($member) {
                $member->delete();
            });
        return response('OK');
    }
}
