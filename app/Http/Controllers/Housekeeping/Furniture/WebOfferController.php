<?php

namespace App\Http\Controllers\Housekeeping\Furniture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Housekeeping\WebOfferRequest;
use App\Models\Neptune\ItemOffer;
use Illuminate\Http\Request;

class WebOfferController extends Controller
{
    public function webOffers(Request $request)
    {
        $search = $request->input('value');

        $offers = ItemOffer::query()->when($search, function ($query, $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('salecode', 'LIKE', "%{$search}%");
        })->paginate(25);

        return view('housekeeping.furniture.weboffers.listing', compact('offers'));
    }

    public function webOffersEdit(Request $request)
    {
        $offer = ItemOffer::find($request->id);

        if (!$offer) {
            return redirect()->route('housekeeping.furniture.weboffers')->with('message', 'Web offer not found!');
        }

        return view('housekeeping.furniture.weboffers.edit', compact('offer'));
    }

    public function webOffersSave(WebOfferRequest $request)
    {
        $offer = ItemOffer::find($request->id);

        if (!$offer) {
            return redirect()->route('housekeeping.furniture.weboffers')->with('message', 'Web offer not found!');
        }

        $validated = $request->validated();

        $offer->update($validated);

        create_staff_log('furniture.weboffers.save', $request);

        return redirect()->route('housekeeping.furniture.weboffers.edit', $offer->id)->with('message', 'Web offer edited!');
    }

    public function webOffersAdd()
    {
        return view('housekeeping.furniture.weboffers.add');
    }

    public function webOffersAddSave(WebOfferRequest $request)
    {
        $validated = $request->validated();

        $offer = ItemOffer::create($validated);

        create_staff_log('furniture.weboffers.add', $request);

        return redirect()->route('housekeeping.furniture.weboffers.edit', $offer->id)->with('message', 'Web offer added!');
    }

    public function webOffersDelete(Request $request)
    {
        $offer = ItemOffer::find($request->id);

        if (!$offer) {
            return view('housekeeping.ajax.dialog_result', [
                'status' => 'error',
                'message' => 'This web offer does not exist!',
            ]);
        }

        $offer->delete();

        create_staff_log('furniture.weboffers.delete', $request);

        return view('housekeeping.ajax.dialog_result', [
            'status' => 'success',
            'message' => 'Web offer deleted!',
        ]);
    }
}
