<?php

namespace App\Http\Controllers\Housekeeping\Moderation;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Room\Category;
use App\Models\User;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function guestroomListing(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $rooms = [];
        switch ($request->type) {
            case 'owner':
                $owner = User::where('username', $request->value)->first();
                if (!$owner)
                    return redirect()->route('housekeeping.editor.guestroom.listing')->with('message', 'User not found!');
                $rooms = Room::where('owner_id', $owner->id);
                break;
            case 'roomname':
                $rooms = Room::where([['name', 'LIKE', "%{$request->value}%"], ['owner_id', '>', 0]]);
                break;
            default:
                $rooms = Room::where('owner_id', '>', 0);
                break;
        }

        return view('housekeeping.moderation.editor.guestroom.listing')->with([
            'rooms' => $rooms->with('user')->paginate(15)
        ]);
    }

    public function guestroomEdit(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $room = Room::find($request->id);
        if (!$room)
            return redirect()->route('housekeeping.editor.guestroom.listing')->with('message', 'Room not found!');

        return view('housekeeping.moderation.editor.guestroom.edit')->with([
            'room'          => $room,
            'categories'    => Category::where('public_spaces', '0')->get()
        ]);
    }

    public function guestroomSave(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $request->validate([
            'id'            => 'required|numeric',
            'owner_id'      => 'required|numeric',
            'name'          => 'required|max:128',
            'description'   => 'max:255',
            'accesstype'    => 'required|in:0,1,2',
            'visitors_now'  => 'required|numeric',
            'visitors_max'  => 'required|numeric',
            'is_hidden'     => 'required|in:0,1',
            'rating'        => 'required|numeric',
            'category'      => 'required|numeric'
        ]);

        $room = Room::find($request->id);

        if (!$room)
            return redirect()->route('housekeeping.editor.guestroom.listing')->with('message', 'Room not found!');

        $room->update([
            'owner_id'      => $request->owner_id,
            'name'          => $request->name,
            'description'   => $request->description ?? '',
            'accesstype'    => $request->accesstype,
            'password'      => $request->password,
            'visitors_now'  => $request->visitors_now,
            'visitors_max'  => $request->visitors_max,
            'rating'        => $request->rating,
            'is_hidden'     => $request->is_hidden,
            'category'      => $request->category
        ]);

        create_staff_log('editor.guestroom.save', $request);

        return redirect()->route('housekeeping.editor.guestroom.edit', $room->id)->with('message', 'Room edited!');
    }

    public function publicroomListing(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $rooms = [];
        if ($request->value) {
            $rooms = Room::where([['name', 'LIKE', "%{$request->value}%"], ['owner_id', '=', 0]]);
        } else {
            $rooms = Room::where('owner_id', 0);
        }

        return view('housekeeping.moderation.editor.publicroom.listing')->with([
            'rooms' => $rooms->paginate(15)
        ]);
    }

    public function publicroomEdit(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $room = Room::find($request->id);
        if (!$room)
            return redirect()->route('housekeeping.editor.publicroom.listing')->with('message', 'Public room not found!');

        return view('housekeeping.moderation.editor.publicroom.edit')->with([
            'room'          => $room,
            'categories'    => Category::where('public_spaces', '1')->get()
        ]);
    }

    public function publicroomSave(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $request->validate([
            'id'            => 'required|numeric',
            'name'          => 'required|max:128',
            'model'         => 'required|max:128',
            'ccts'          => 'required|max:128',
            'description'   => 'max:255',
            'visitors_now'  => 'required|numeric',
            'visitors_max'  => 'required|numeric',
            'is_hidden'     => 'required|in:0,1',
            'category'      => 'required|numeric'
        ]);

        $room = Room::find($request->id);

        if (!$room)
            return redirect()->route('housekeeping.editor.publicroom.listing')->with('message', 'Public room not found!');

        $room->update([
            'name'          => $request->name,
            'model'         => $request->model,
            'ccts'          => $request->ccts,
            'description'   => $request->description ?? '',
            'visitors_now'  => $request->visitors_now,
            'visitors_max'  => $request->visitors_max,
            'is_hidden'     => $request->is_hidden,
            'category'      => $request->category
        ]);

        create_staff_log('editor.publicroom.save', $request);

        return redirect()->route('housekeeping.editor.publicroom.edit', $room->id)->with('message', 'Public room edited!');
    }

    public function publicroomAdd()
    {
        abort_unless_permission('can_edit_users_guestroom');

        return view('housekeeping.moderation.editor.publicroom.add')->with([
            'categories'    => Category::where('public_spaces', '1')->get()
        ]);
    }

    public function publicroomAddSave(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $request->validate([
            'name'          => 'required|max:128',
            'model'         => 'required|max:128',
            'ccts'          => 'required|max:128',
            'description'   => 'max:255',
            'visitors_now'  => 'required|numeric',
            'visitors_max'  => 'required|numeric',
            'is_hidden'     => 'required|in:0,1',
            'category'      => 'required|numeric'
        ]);

        $room = Room::create([
            'name'          => $request->name,
            'owner_id'      => '0',
            'model'         => $request->model,
            'ccts'          => $request->ccts,
            'description'   => $request->description ?? '',
            'visitors_now'  => $request->visitors_now,
            'visitors_max'  => $request->visitors_max,
            'is_hidden'     => $request->is_hidden,
            'category'      => $request->category
        ]);

        create_staff_log('editor.publicroom.add', $request);

        return redirect()->route('housekeeping.editor.publicroom.edit', $room->id)->with('message', 'Public room added!');
    }

    public function publicroomDelete(Request $request)
    {
        abort_unless_permission('can_edit_users_guestroom');

        $room = Room::find($request->id);

        if (!$room)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This public room does not exist!']);

        if ($room->owner_id > 0)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This room is not a public room!']);

        $room->delete();

        create_staff_log('editor.publicroom.delete', $request);
        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Public room deleted!']);
    }
}
