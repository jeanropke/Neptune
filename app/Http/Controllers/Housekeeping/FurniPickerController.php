<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\Item;
use Illuminate\Http\Request;

class FurniPickerController extends Controller
{
    public function listing()
    {
        return view('housekeeping.ajax.furnipicker.listing');
    }

    public function search(Request $request)
    {
        $search = trim($request->input('furni'));

        if (mb_strlen($search) < 3) {
            return '<p>The furni must be at least 3 characters.</p>';
        }

        $items = Item::where('sale_code', 'LIKE', "%{$search}%")
            ->orWhere('name', 'LIKE', "%{$search}%")
            ->limit(50)
            ->get();

        return view('housekeeping.ajax.furnipicker.search', compact('items'));
    }
}
