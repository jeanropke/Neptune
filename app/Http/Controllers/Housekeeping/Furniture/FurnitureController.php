<?php

namespace App\Http\Controllers\Housekeeping\Furniture;

use App\Http\Controllers\Controller;
use App\Models\Furni\Definition;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function items(Request $request)
    {
        abort_unless_permission('can_edit_items_definitions');

        $items = Definition::where('name', 'LIKE', "%{$request->value}%")->orWhere('sprite', 'LIKE', "%{$request->value}%")->paginate(25);
        return view('housekeeping.furniture.items.listing')->with('items', $items);
    }

    public function furnitureEdit(Request $request)
    {
        $item = Definition::find($request->id);
        if (!$item)
            return redirect()->route('housekeeping.furniture.items')->with('message', 'Item definition not found!');

        return view('housekeeping.furniture.items.edit')->with('item', $item);
    }

    public function furnitureSave(Request $request)
    {
        abort_unless_permission('can_edit_items_definitions');

        $item = Definition::find($request->id);
        if (!$item)
            return redirect()->route('housekeeping.furniture.items')->with('message', 'Item definition not found!');

        $request->validate([
            'sprite'        => 'required',
            'sprite_id'     => 'sometimes|numeric',
            'length'        => 'sometimes|numeric',
            'width'         => 'sometimes|numeric',
            'top_height'    => 'sometimes|numeric',
            'max_status'    => 'sometimes|numeric',
            'interactor'    => 'required',
            'is_tradable'   => 'required|in:0,1',
            'is_recyclable' => 'required|in:0,1'
        ]);

        $item->update([
            'sprite'        => $request->sprite,
            'sprite_id'     => $request->sprite_id ?? 0,
            'name'          => $request->name ?? '',
            'description'   => $request->description ?? '',
            'colour'        => $request->colour ?? '',
            'length'        => $request->length ?? 0,
            'width'         => $request->width ?? 0,
            'top_height'    => $request->top_height ?? 0,
            'max_status'    => $request->max_status ?? 0,
            'behaviour'     => $request->behaviour ?? '',
            'interactor'    => $request->interactor,
            'is_tradable'   => $request->is_tradable,
            'is_recyclable' => $request->is_recyclable,
            'drink_ids'     => $request->drink_ids ?? ''
        ]);

        create_staff_log('furniture.items.save', $request);

        return redirect()->route('housekeeping.furniture.items.edit', $item->id)->with('message', 'Item definition edited!');
    }

    public function furnitureAdd()
    {
        abort_unless_permission('can_edit_items_definitions');

        return view('housekeeping.furniture.items.add');
    }

    public function furnitureAddSave(Request $request)
    {
        abort_unless_permission('can_edit_items_definitions');

        $request->validate([
            'sprite'        => 'required',
            'sprite_id'     => 'sometimes|numeric',
            'length'        => 'sometimes|numeric',
            'width'         => 'sometimes|numeric',
            'top_height'    => 'sometimes|numeric',
            'max_status'    => 'sometimes|numeric',
            'interactor'    => 'required',
            'is_tradable'   => 'required|in:0,1',
            'is_recyclable' => 'required|in:0,1'
        ]);

        $item = Definition::create([
            'sprite'        => $request->sprite,
            'sprite_id'     => $request->sprite_id ?? 0,
            'name'          => $request->name ?? '',
            'description'   => $request->description ?? '',
            'colour'        => $request->colour ?? '',
            'length'        => $request->length ?? 0,
            'width'         => $request->width ?? 0,
            'top_height'    => $request->top_height ?? 0,
            'max_status'    => $request->max_status ?? 0,
            'behaviour'     => $request->behaviour ?? '',
            'interactor'    => $request->interactor,
            'is_tradable'   => $request->is_tradable,
            'is_recyclable' => $request->is_recyclable,
            'drink_ids'     => $request->drink_ids ?? ''
        ]);

        create_staff_log('furniture.items.add', $request);

        return redirect()->route('housekeeping.furniture.items.edit', $item->id)->with('message', 'Item Definition added!');
    }

    public function furnitureDelete(Request $request)
    {
        abort_unless_permission('can_delete_items_definitions');

        $item = Definition::find($request->id);

        if (!$item)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This item definition does not exist!']);

        $item->delete();

        create_staff_log('furniture.items.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Item definition deleted!']);
    }
}
