<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        return view('client.index')->with([
            'roomId'        => $request->roomId,
            'forwardId'     => $request->forwardId,
            'shortcut'      => $request->shortcut
        ]);
    }

    public function clientError(Request $request)
    {
        return $request->all();
    }

    public function disconnected()
    {
        return view('client.disconnected');
    }

    public function updateHabboCount()
    {
        return response('', 200)
            ->header('Content-Type', 'application/json')
            ->header('X-JSON', json_encode(['habboCountText' => emu_config('players.online')]));
    }

    public function topbarCredits()
    {
        return view('includes.topbar.credits');
    }

    public function topbarHabboclub()
    {
        return view('includes.topbar.habboclub');
    }

    public function roomNavigation(Request $request)
    {
        //$request->roomType - private or public?
        //$request->move - true
        $room = Room::find($request->roomId);
        if(!$room) return;

        mus("enter_room", ['userId' => user()->id, 'roomId' => $room->id]);
    }
}
