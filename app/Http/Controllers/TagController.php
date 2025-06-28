<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function search(Request $request)
    {
        $related = Tag::inRandomOrder()->select('tag', DB::raw('COUNT(tag) AS count'))->groupBy('tag')->take(20)->get();

        $minFontSize = 12;
        $maxFontSize = 26;

        $minCount = $related->min('count');
        $maxCount = $related->max('count');

        $spread = max($maxCount - $minCount, 1);

        $related = $related->map(function ($tag) use ($minFontSize, $maxFontSize, $minCount, $spread) {
            $tag->size = floor($minFontSize + (($tag->count - $minCount) * ($maxFontSize - $minFontSize)) / $spread);
            return $tag;
        });

        return view('tag.search')->with([
            'related'   => $related,
            'result'    => Tag::where('tag', $request->tag)->paginate(10)
        ]);
    }

    public function addTag(Request $request)
    {
        if (!user()) return;

        return user()->addTag($request->tagName);
    }

    public function removeTag(Request $request)
    {
        if (!user()) return;

        user()->removeTag($request->tagName);

        return view('home.widgets.ajax.profiletags')->with('owner', user());
    }

    public function listTag(Request $request)
    {
        return view('home.widgets.ajax.profiletags')->with('owner', user());
    }

    public function addTagGroup(Request $request)
    {
        if (!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id != user()->id) return;

        return $group->addTag($request->tagName);
    }

    public function listTagGroup(Request $request)
    {
        $group = Group::find($request->groupId);

        if (!$group) return;

        return view('home.widgets.ajax.profiletags')->with('owner', $group);
    }

    public function removeTagGroup(Request $request)
    {
        if (!user()) return;

        $group = Group::find($request->groupId);

        if (!$group) return;

        if ($group->owner_id != user()->id) return;

        $group->removeTag($request->tagName);

        return view('home.widgets.ajax.profiletags')->with('owner', $group);
    }
}
