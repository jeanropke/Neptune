<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\CatalogueItem;
use Illuminate\Http\Request;

class FurniPickerController extends Controller
{
    public function listing()
    {
        return view('housekeeping.ajax.furnipicker.listing');
    }

    public function search(Request $request)
    {
        if(strlen($request->furni) < 3)
            return '<p>The furni must be at least 3 characters.</p>';

        $items = CatalogueItem::where([['sale_code', 'LIKE', "%{$request->furni}%"]])->orWhere([['name', 'LIKE', "%{$request->furni}%"]])->get();
        return view('housekeeping.ajax.furnipicker.search')->with('items', $items);
    }
}
