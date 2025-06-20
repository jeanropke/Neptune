<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\GroupMember;
use App\Models\Permission;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index()
    {
        return view('hotel.index');
    }

    public function pets()
    {
        return view('hotel.pets');
    }

    public function takingCareOfYourPet()
    {
        return view('hotel.pets.taking_care_of_your_pet');
    }

    public function room()
    {
        return view('hotel.room');
    }

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
        foreach (GroupMember::groupBy('group_id')->select('group_id', DB::raw('COUNT(group_id) AS total'))->take(10)->orderBy('total', 'DESC')->get() as $guild) {
            array_push($groups, Group::find($guild->group_id));
        }

        return view('hotel.groups')->with([
            'groups'      => $groups,
            'latest'      => Group::take(10)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function groupsInstructions()
    {
        return view('hotel.groups.group_instructions')->with([
            'latest' => Group::take(5)->orderBy('created_at', 'desc')->get()
        ]);
    }

    public function homes()
    {
        return view('hotel.homes');
    }

    public function web()
    {
        return view('hotel.web');
    }

    public function navigator()
    {
        return view('hotel.navigator');
    }

    public function welcomeStarted()
    {
        return view('hotel.welcome.started');
    }

    public function welcomeChatting()
    {
        return view('hotel.welcome.chatting');
    }

    public function welcomeNavigator()
    {
        return view('hotel.welcome.navigator');
    }

    public function welcomeRoom()
    {
        return view('hotel.welcome.room');
    }

    public function welcomeHelp()
    {
        return view('hotel.welcome.help');
    }
}
