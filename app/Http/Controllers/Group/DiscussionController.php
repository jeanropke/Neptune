<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\GroupReply;
use App\Models\Group\GroupTopic;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function newTopic()
    {
        if (!Auth::check())
            return;

        return view('groups.discussions.newtopic');
    }

    public function previewTopic(Request $request)
    {
        if (!Auth::check())
            return;

        $topic = (object)[
            'subject'       => $request->topicName,
            'message'       => $request->message,
            'created_at'    => Carbon::now(),
        ];
        return view('groups.discussions.previewtopic')->with('topic', $topic);
    }

    public function saveTopic(Request $request)
    {
        if (!Auth::check())
            return;

        if (!$request->topicName)
            return;
        if (!$request->message)
            return;

        $group = Group::find($request->groupId);
        if (!$group) return;

        $now = Carbon::now();

        $topic = GroupTopic::create([
            'user_id'           => user()->id,
            'group_id'          => $group->id,
            'subject'           => $request->topicName,
            'latest_comment'    => $now,
            'created_at'        => $now,
            'updated_at'        => $now
        ]);

        GroupReply::create([
            'topic_id'      => $topic->id,
            'user_id'       => user()->id,
            'message'       => $request->message,
            'created_at'    => $now,
            'updated_at'    => $now
        ]);

        user()->getCmsSettings()->increment('discussions_posts');

        echo "/groups/{$group->id}/id/discussions/{$topic->id}/id";
    }

    public function viewTopic(Request $request)
    {
        $topic = GroupTopic::find($request->topicId);
        $group = Group::find($request->groupId);

        if (!$topic || !$group)
            return abort(404);

        if ($topic->group_id != $group->id)
            return abort(404);

        return view('groups.discussions.viewtopic')->with([
            'topic'     => $topic,
            'group'     => $group,
            'replies'   => $topic->getReplies()
        ]);
    }

    public function previewPost(Request $request)
    {
        if (!Auth::check())
            return;

        $topic = GroupTopic::find($request->topicId);
        $group = Group::find($request->groupId);

        if (!$topic || !$group)
            return abort(404);

        if ($topic->group_id != $group->id)
            return abort(404);

        $post = (object)[
            'message'       => $request->message,
            'created_at'    => Carbon::now(),
        ];
        return view('groups.discussions.previewpost')->with([
            'topic' => $topic,
            'post'  => $post
        ]);
    }

    public function savePost(Request $request)
    {
        if (!Auth::check())
            return;

        $topic = GroupTopic::find($request->topicId);
        $group = Group::find($request->groupId);

        if (!$topic || !$group)
            return abort(404);

        if ($topic->group_id != $group->id)
            return abort(404);

        $now = Carbon::now();

        $topic->update([
            'latest_comment'    => $now,
        ]);

        $topic->increment('replies');

        GroupReply::create([
            'topic_id'      => $topic->id,
            'user_id'       => user()->id,
            'message'       => $request->message,
            'created_at'    => $now,
            'updated_at'    => $now
        ]);

        user()->getCmsSettings()->increment('discussions_posts');

        return view('groups.discussions.includes.viewtopic')->with([
            'topic'     => $topic,
            'group'     => $group,
            'replies'   => $topic->getReplies()
        ]);
    }

    public function deletePost(Request $request)
    {
        if (!Auth::check())
            return;

        $group = Group::find($request->groupId);
        if (!$group)
            return;

        $topic = GroupTopic::find($request->topicId);
        if (!$topic)
            return;

        $reply = GroupReply::find($request->postId);
        if (!$reply)
            return;

        if ($topic->group_id != $group->id)
            return;

        if ($reply->topic_id != $topic->id)
            return;


        if ($group->getOwner()->id != user()->id || $group->getAdmins()->where('user_id', user()->id)->first())
            return;

        $topic->decrement('replies');
        $topic->update(['latest_comment' => $topic->getLatestPost()->created_at]);
        $reply->markAsDeleted();

        return $request->all();
    }

    public function openTopicSettings(Request $request)
    {
        return view('groups.discussions.ajax.topicsettings');
    }

    public function confirmDeleteTopic(Request $request)
    {
        return view('groups.discussions.ajax.confirmdeletetopic');
    }

    public function deleteTopic(Request $request)
    {
        if (!Auth::check())
            return;

        $group = Group::find($request->groupId);
        if (!$group) return;

        $topic = GroupTopic::find($request->topicId);
        if (!$topic) return;

        if ($topic->group_id != $group->id)
            return;

        if ($topic->user_id != user()->id)
            if (!$group->getAdmins()->where('user_id', user()->id)->first()) return;

        $topic->markAsDeleted();

        return 'SUCCESS';
    }
}
