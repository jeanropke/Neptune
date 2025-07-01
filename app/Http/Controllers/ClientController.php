<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        return view('client.index', [
            'roomId'    => $request->roomId,
            'forwardId' => $request->forwardId,
            'shortcut'  => $request->shortcut,
        ]);
    }

    public function clientError(Request $request)
    {
        return response()->json($request->all());
    }

    public function updateHabboCount(): JsonResponse
    {
        return response()
            ->json(['habboCountText' => emu_config('players.online')])
            ->header('X-JSON', json_encode(['habboCountText' => emu_config('players.online')]));
    }

    public function roomNavigation(Request $request)
    {
        //$request->roomType - private or public?
        //$request->move - true
        $room = Room::find($request->roomId);

        if (!$room || !user()) {
            return response()->json(['error' => 'Invalid room or user.'], 404);
        }

        mus('enter_room', [
            'userId' => user()->id,
            'roomId' => $room->id,
        ]);

        return response()->json(['status' => 'ok']);
    }
}
