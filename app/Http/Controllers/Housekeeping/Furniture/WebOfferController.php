<?php

namespace App\Http\Controllers\Housekeeping\Furniture;

use App\Http\Controllers\Controller;
use App\Models\ItemOffer;
use Illuminate\Http\Request;

class WebOfferController extends Controller
{
    public function webOffers(Request $request)
    {
        $offers = ItemOffer::where('name', 'LIKE', "%{$request->value}%")->orWhere('salecode', 'LIKE', "%{$request->value}%")->paginate(25);
        return view('housekeeping.furniture.weboffers.listing')->with('offers', $offers);
    }

    public function webOffersEdit(Request $request)
    {
        $offer = ItemOffer::find($request->id);
        if (!$offer)
            return redirect()->route('housekeeping.furniture.weboffers')->with('message', 'Web offer not found!');

        return view('housekeeping.furniture.weboffers.edit')->with('offer', $offer);
    }

    public function webOffersSave(Request $request)
    {
        $offer = ItemOffer::find($request->id);
        if (!$offer)
            return redirect()->route('housekeeping.furniture.weboffers')->with('message', 'Web offer not found!');

        $request->validate([
            'salecode'  => 'required',
            'name'      => 'required',
            'items'     => 'required',
            'price'     => 'required|numeric',
            'enabled'   => 'required|in:0,1'
        ]);

        $offer->update([
            'salecode'  => $request->salecode,
            'name'      => $request->name,
            'items'     => $request->items,
            'price'     => $request->price,
            'enabled'   => $request->enabled
        ]);

        create_staff_log('furniture.weboffers.save', $request);

        return redirect()->route('housekeeping.furniture.weboffers.edit', $offer->id)->with('message', 'Web offer edited!');
    }

    public function webOffersAdd()
    {
        return view('housekeeping.furniture.weboffers.add');
    }

    public function webOffersAddSave(Request $request)
    {
        $request->validate([
            'salecode'  => 'required',
            'name'      => 'required',
            'items'     => 'required',
            'price'     => 'required|numeric',
            'enabled'   => 'required|in:0,1'
        ]);

        $offer = ItemOffer::create([
            'salecode'  => $request->salecode,
            'name'      => $request->name,
            'items'     => $request->items,
            'price'     => $request->price,
            'enabled'   => $request->enabled
        ]);

        create_staff_log('furniture.weboffers.add', $request);

        return redirect()->route('housekeeping.furniture.weboffers.edit', $offer->id)->with('message', 'Web offer added!');
    }

    public function webOffersDelete(Request $request)
    {
        $offer = ItemOffer::find($request->id);

        if (!$offer)
            return view('housekeeping.ajax.dialog_result')->with(['status' => 'error', 'message' => 'This web offer does not exist!']);

        $offer->delete();

        create_staff_log('furniture.weboffers.delete', $request);

        return view('housekeeping.ajax.dialog_result')->with(['status' => 'success', 'message' => 'Web offer deleted!']);
    }
}
