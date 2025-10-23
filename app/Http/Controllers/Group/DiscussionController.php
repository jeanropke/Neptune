<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Group\Reply;
use App\Models\Group\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DiscussionController extends Controller
{
    protected function authorizeUser()
    {
        abort_unless(user(), 403, 'Unauthorized');
    }

    protected function validateGroupAndTopic(Request $request): array
    {

        if ($request->groupId)
            $group = Group::findOrFail($request->groupId);
        else
            $group = Group::where('alias', $request->alias)->first();

        $topic = Thread::findOrFail($request->topicId);
        abort_if(($topic->group_id !== $group->id || $topic->reply->is_deleted), 404);
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
        //$validated = $request->validate([
        //    'topicName' => 'required|string|max:100',
        //    'message'   => 'required|string|max:5000',
        //]);

        //$validator = Validator::make($request->all(), [
        //    'topicName' => 'required|string|max:100',
        //    'message'   => 'required|string|max:5000',
        //]);

        //if ($validator->fails()) {
        //    return view('groups.discussions.includes.error', [
        //        'message' => 'Please supply a valid message.'
        //    ]);
        //}

        $topic = (object) [
            'subject'       => 'topicName',
            'message'       => 'message',
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

        abort_if(!$group->canForumPost(), 404);

        $thread = Thread::create([
            'poster_id'     => user()->id,
            'group_id'      => $group->id,
            'topic_title'   => $validated['topicName']
        ]);

        Reply::create([
            'thread_id' => $thread->id,
            'poster_id' => user()->id,
            'message'   => $validated['message']
        ]);

        return response(route('groups.topic.view', [
            'groupId' => $group->id,
            'topicId' => $thread->id
        ]));
    }

    public function viewTopic(Request $request)
    {
        [$group, $topic] = $this->validateGroupAndTopic($request);

        if ($group->canViewForum()) {
            if (!session('hasViewedDiscussion' . $topic->id)) {
                session(['hasViewedDiscussion' . $topic->id => true]);
                $topic->increment('views');
            }
        }

        return view('groups.discussions.viewtopic', [
            'topic'   => $topic,
            'group'   => $group,
            'replies' => $topic->visibleRepliesPaginated()
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

    public function updatePost(Request $request)
    {
        $this->authorizeUser();
        $validated = $request->validate([
            'groupId'   => 'required|integer',
            'topicId'   => 'required|integer',
            'message'   => 'required|string|max:5000',
            'postId'    => 'required|integer|exists:cms_forum_replies,id'
        ]);

        [$group, $topic] = $this->validateGroupAndTopic($request);

        abort_if(!$group->canReplyForum(), 404);

        $reply = Reply::find($request->postId);
        $reply->update([
            'message'       => $request->message,
            'is_edited'     => 1
        ]);

        return view('groups.discussions.includes.viewtopic', [
            'topic'   => $topic->refresh(),
            'group'   => $group,
            'replies' => $topic->replies()->with('author')->paginate(10)
        ]);
    }

    public function savePost(Request $request)
    {
        $this->authorizeUser();

        $validator = Validator::make($request->all(), [
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            return view('groups.discussions.includes.error', [
                'message' => 'Please supply a valid message.'
            ]);
        }

        [$group, $topic] = $this->validateGroupAndTopic($request);


        abort_if(!$group->canReplyForum(), 404);

        Reply::create([
            'thread_id' => $topic->id,
            'poster_id' => user()->id,
            'message'   => $request->message
        ]);

        return view('groups.discussions.includes.viewtopic', [
            'topic'   => $topic->refresh(),
            'group'   => $group,
            'replies' => $topic->replies()->with('author')->paginate(10)
        ]);
    }

    public function deletePost(Request $request)
    {
        $this->authorizeUser();

        [$group, $topic] = $this->validateGroupAndTopic($request);
        $reply = Reply::findOrFail($request->postId);

        abort_if($reply->thread_id !== $topic->id, 404);

        abort_unless($group->isAdmin(), 404);

        $reply->markAsDeleted();

        return response()->json([
            'success' => true,
            'postId'  => $reply->id,
        ]);
    }

    public function openTopicSettings(Request $request)
    {
        $this->authorizeUser();

        [$group, $topic] = $this->validateGroupAndTopic($request);
        $topic = Thread::findOrFail($request->topicId);

        abort_if($group->id !== $topic->group_id, 404);

        return view('groups.discussions.ajax.topicsettings')->with('topic', $topic);
    }

    public function saveTopicSettings(Request $request)
    {
        $this->authorizeUser();

        [$group, $topic] = $this->validateGroupAndTopic($request);
        $topic = Thread::findOrFail($request->topicId);

        abort_if($group->id !== $topic->group_id, 404);

        if ($group->isAdmin() || user()->hasPermission('can_manage_forums')) {
            $topic->update([
                'is_open'       => !$request->topicClosed,
                'is_stickied'   => $request->topicSticky,
                'topic_title'   => $request->topicName ?? $topic->topic_title
            ]);
        }

        return view('groups.discussions.includes.viewtopic', [
            'topic'   => $topic,
            'group'   => $group,
            'replies' => $topic->visibleRepliesPaginated()
        ]);
    }

    public function confirmDeleteTopic()
    {
        return view('groups.discussions.ajax.confirmdeletetopic');
    }

    public function deleteTopic(Request $request)
    {
        $this->authorizeUser();

        [$group, $topic] = $this->validateGroupAndTopic($request);

        abort_unless($group->isAdmin(), 404);

        $topic->markAsDeleted();

        return response('SUCCESS');
    }
}
