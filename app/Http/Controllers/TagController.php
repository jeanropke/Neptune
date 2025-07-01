<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function search(Request $request)
    {
        $request->validate([
            'tag' => 'required|string|max:255'
        ]);

        $related = Tag::select('tag', DB::raw('COUNT(tag) AS count'))
            ->inRandomOrder()
            ->groupBy('tag')
            ->take(20)
            ->get();

        $minFontSize = 12;
        $maxFontSize = 26;

        $minCount = $related->min('count');
        $maxCount = $related->max('count');
        $spread = max($maxCount - $minCount, 1);

        $related->transform(function ($tag) use ($minFontSize, $maxFontSize, $minCount, $spread) {
            $tag->size = floor(
                $minFontSize + (($tag->count - $minCount) * ($maxFontSize - $minFontSize)) / $spread
            );
            return $tag;
        });

        $result = Tag::where('tag', $request->tag)
            ->with('holder.tags')
            ->paginate(10);

        return view('tag.search', compact('related', 'result'));
    }

    public function addTag(Request $request)
    {
        $user = user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        return $user->addTag($request->tagName);
    }

    public function removeTag(Request $request)
    {
        $user = user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $user->removeTag($request->tagName);

        return view('home.widgets.ajax.profiletags', [
            'owner' => $user,
        ]);
    }

    public function listTag()
    {
        $user = user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        return view('home.widgets.ajax.profiletags', [
            'owner' => $user,
        ]);
    }

    public function addTagGroup(Request $request)
    {
        $user = user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $group = Group::find($request->groupId);

        if ($group->owner_id !== $user->id) {
            abort(403, 'You are not the owner of this group.');
        }

        return $group->addTag($request->tagName);
    }

    public function removeTagGroup(Request $request)
    {
        $user = user();
        if (!$user) {
            abort(403, 'Unauthorized');
        }

        $group = Group::findOrFail($request->groupId);

        if ($group->owner_id !== $user->id) {
            abort(403, 'You are not the owner of this group.');
        }

        $group->removeTag($request->tagName);

        return view('home.widgets.ajax.profiletags', [
            'owner' => $group,
        ]);
    }

    public function listTagGroup(Request $request)
    {
        $group = Group::findOrFail($request->groupId);

        return view('home.widgets.ajax.profiletags', [
            'owner' => $group,
        ]);
    }
}
