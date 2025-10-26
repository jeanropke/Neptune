<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function listing(Request $request)
    {
        abort_unless_permission('can_manage_tags');

        $tags = Tag::when(!$request->filled('tag'), function ($query) {
            $query->select('tag', 'user_id', 'room_id', 'group_id', DB::raw('COUNT(*) as amount'))
                ->groupBy('tag');
        })
            ->when($request->filled('tag'), function ($query) use ($request) {
                $query->where('tag', $request->tag);
            })->with(['room', 'user', 'group'])
            ->paginate(25);


        return view('housekeeping.moderation.tags.listing')->with('tags', $tags);
    }

    public function delete(Request $request)
    {
        if (!user()->hasPermission('can_manage_tags'))
            return view('housekeeping.ajax.accessdenied_dialog');

        Tag::where('tag', $request->id)->delete();

        create_staff_log('tags.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Tags deleted!']);
    }
}
