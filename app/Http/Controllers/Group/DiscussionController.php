<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Reply;
use App\Models\Group\Topic;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    protected function authorizeUser()
    {
        abort_unless(user(), 403, 'Unauthorized');
    }

    protected function validateGroupAndTopic(Request $request): array
    {
        $group = Group::findOrFail($request->groupId);
        $topic = Topic::findOrFail($request->topicId);
        abort_if($topic->group_id !== $group->id, 404);
        return [$group, $topic];
    }

    public function newTopic()
    {
        $this->authorizeUser();
        return view('groups.discussions.newtopic');
    }

    public function previewTopic(Request $request)
    {
        $this->authorizeUser();
        $validated = $request->validate([
            'topicName' => 'required|string|max:100',
            'message'   => 'required|string|max:5000',
        ]);

        $topic = (object) [
            'subject'       => $validated['topicName'],
            'message'       => $validated['message'],
            'created_at'    => now()
        ];

        return view('groups.discussions.previewtopic', compact('topic'));
    }

    public function saveTopic(Request $request)
    {
        $this->authorizeUser();
        $validated = $request->validate([
            'groupId'   => 'required|integer|exists:groups_details,id',
            'topicName' => 'required|string|max:100',
            'message'   => 'required|string|max:5000',
        ]);

        $group = Group::find($validated['groupId']);
        $now = now();

        $topic = Topic::create([
            'user_id'        => user()->id,
            'group_id'       => $group->id,
            'subject'        => $validated['topicName'],
            'latest_comment' => $now
        ]);

        Reply::create([
            'topic_id'   => $topic->id,
            'user_id'    => user()->id,
            'message'    => $validated['message'],
            'created_at' => $now,
            'updated_at' => $now
        ]);

        user()->cmsSettings->increment('discussions_posts');

        return response(route('groups.topic.view', [
            'groupId' => $group->id,
            'topicId' => $topic->id
        ]));
    }

    public function viewTopic(Request $request)
    {
        [$group, $topic] = $this->validateGroupAndTopic($request);

        return view('groups.discussions.viewtopic', [
            'topic'   => $topic,
            'group'   => $group,
            'replies' => $topic->replies()->paginate(10)
        ]);
    }

    public function previewPost(Request $request)
    {
        $this->authorizeUser();
        [$group, $topic] = $this->validateGroupAndTopic($request);

        $post = (object) [
            'message'    => $request->message,
            'created_at' => now()
        ];

        return view('groups.discussions.previewpost', compact('topic', 'post'));
    }

    public function savePost(Request $request)
    {
        $this->authorizeUser();

        $request->validate([
            'topicId' => 'required|integer|exists:cms_groups_topics,id',
            'groupId' => 'required|integer|exists:groups_details,id',
            'message' => 'required|string|max:5000',
        ]);

        [$group, $topic] = $this->validateGroupAndTopic($request);

        $topic->update(['latest_comment' => now()]);
        $topic->increment('replies');

        Reply::create([
            'topic_id' => $topic->id,
            'user_id'  => user()->id,
            'message'  => $request->message
        ]);

        user()->cmsSettings->increment('discussions_posts');

        return view('groups.discussions.includes.viewtopic', [
            'topic'   => $topic->refresh(),
            'group'   => $group,
            'replies' => $topic->replies()->paginate(10)
        ]);
    }

    public function deletePost(Request $request)
    {
        $this->authorizeUser();

        [$group, $topic] = $this->validateGroupAndTopic($request);
        $reply = Reply::findOrFail($request->postId);

        abort_if($reply->topic_id !== $topic->id, 404);

        $isAdmin = $group->admins()->where('user_id', user()->id)->exists();
        abort_unless($isAdmin, 403);

        $reply->markAsDeleted();
        $topic->decrement('replies');

        $latest = $topic->latestReply();
        $topic->update([
            'latest_comment' => $latest?->created_at ?? $topic->created_at
        ]);

        return response()->json([
            'success' => true,
            'postId'  => $reply->id,
        ]);
    }

    public function openTopicSettings()
    {
        return view('groups.discussions.ajax.topicsettings');
    }

    public function confirmDeleteTopic()
    {
        return view('groups.discussions.ajax.confirmdeletetopic');
    }

    public function deleteTopic(Request $request)
    {
        $this->authorizeUser();

        [$group, $topic] = $this->validateGroupAndTopic($request);

        $isAdmin = $group->admins()->where('user_id', user()->id)->exists();
        abort_unless($isAdmin, 403);

        $topic->markAsDeleted();

        return response('SUCCESS');
    }
}
