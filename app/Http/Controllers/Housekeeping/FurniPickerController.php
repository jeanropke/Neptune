<?php

namespace App\Http\Controllers\Housekeeping;

use App\Http\Controllers\Controller;
use App\Models\Catalogue\CatalogueItem;
use App\Models\Catalogue\CataloguePage;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FurniPickerController extends Controller
{
    public function listing()
    {
        return view('housekeeping.furnipicker.listing');
    }

    public function search(Request $request)
    {
        if(strlen($request->furni) < 3)
            return '<p>The furni must be at least 3 characters.</p>';

        $items = CatalogueItem::where([['sale_code', 'LIKE', "%{$request->furni}%"]])->orWhere([['name', 'LIKE', "%{$request->furni}%"]])->get();
        return view('housekeeping.furnipicker.search')->with('items', $items);
    }
}
