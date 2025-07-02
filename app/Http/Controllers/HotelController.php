<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Group\Member;
use App\Models\Neptune\Permission;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function staff()
    {
        return view('hotel.staff')->with([
            'ranks'     => Permission::select('id', 'name')->where('id', '>', '3')->orderBy('id', 'DESC')->get(),
            'staffs'    => User::where('rank', '>', 3)->orderBy('rank', 'DESC')->orderBy('id', 'ASC')->get()
        ]);
    }

    public function groups()
    {
        $groups = [];
        foreach (Member::groupBy('group_id')->select('group_id', DB::raw('COUNT(group_id) AS total'))->take(10)->orderBy('total', 'DESC')->get() as $guild) {
            array_push($groups, Group::find($guild->group_id));
        }

        return view('hotel.groups')->with([
            'groups'      => $groups,
            'latest'      => Group::take(10)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function groupsInstructions()
    {
        return view('hotel.groups.group_instructions')->with([
            'latest' => Group::take(5)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function groupsDirectory()
    {
        //TODO: most active members & most active habbo homes
        return view('hotel.groups.directory')->with([
            'active'    => Group::take(10)->orderBy('created_at', 'DESC')->get(),
            'hotel'     => Group::take(20)->orderBy('created_at', 'DESC')->get(),
            'recent'    => Group::take(10)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function groupsActive()
    {
        return view('hotel.groups.directory.active')->with([
            'active'    => Group::take(50)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function groupsHotel()
    {
        return view('hotel.groups.directory.hotel')->with([
            'hotel'     => Group::take(50)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function groupsRecent()
    {
        return view('hotel.groups.directory.recent')->with([
            'recent'    => Group::take(50)->orderBy('created_at', 'DESC')->get(),
        ]);
    }

    public function catalogue(Request $request)
    {
        $allowedViews = ['1', '2', '4'];

        if (!in_array($request->id, $allowedViews)) {
            abort(404);
        }
        return view('hotel.furniture.catalogue' . ($request->id ? '_' . $request->id : ''));
    }
}
