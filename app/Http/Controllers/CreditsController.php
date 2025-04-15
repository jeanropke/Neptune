<?php

namespace App\Http\Controllers;

use App\Models\Catalogue\CatalogueItem;
use App\Models\Collectable;
use App\Models\ItemOffer;
use App\Models\UserTransaction;
use App\Models\Voucher;
use App\Models\VoucherHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditsController extends Controller
{
    public function index()
    {
        return view('credits.index');
    }

    public function transactions()
    {
        if (!Auth::check())
            return redirect()->route('credits.index');

        return view('credits.transactions')->with(['transactions' => UserTransaction::where('user_id', Auth::user()->id)->orderBy('timestamp', 'DESC')->take(100)->get()]);
    }

    public function furniture()
    {
        return view('credits.furniture.index');
    }

    public function catalogue(Request $request)
    {
        return view('credits.furniture.catalogue' . ($request->id ? '_' . $request->id : ''));
    }

    public function decorationExamples()
    {
        return view('credits.furniture.decorationexamples');
    }

    public function starterPacks()
    {
        return view('credits.furniture.starterpacks');
    }

    public function trading()
    {
        return view('credits.furniture.trading');
    }

    public function exchange()
    {
        return view('credits.furniture.exchange');
    }

    public function cameras()
    {
        return view('credits.furniture.cameras');
    }

    public function ecotronfaq()
    {
        return view('credits.furniture.ecotronfaq');
    }

    public function collectibles()
    {
        $tick = emu_config('rare.cycle.tick.time');
        $interval = emu_config('rare.cycle.refresh.interval');

        if (!$tick || !is_numeric($tick))
            $tick = 0;

        if (!$interval || !is_numeric($interval))
            $interval = 1;

        $collectable = Collectable::orderBy('reuse_time', 'DESC')->first();
        $time = ($interval * 24 * 60 * 60) - $tick;

        return view('credits.collectibles')->with([
            'collectable' => $collectable,
            'time' => $time
        ]);
    }

    public function habbletAjaxCollectiblesConfirm()
    {
        $collectable = Collectable::orderBy('reuse_time', 'DESC')->first();

        return view('habblet.ajax.collectibles_confirm')->with([
            'collectable' => $collectable
        ]);
    }

    public function habbletAjaxCollectiblesPurchase()
    {
        if (!Auth::check())
            return;

        $collectable = Collectable::orderBy('reuse_time', 'DESC')->first();

        if (user()->credits >= $collectable->getPrice()) {
            user()->updateCredits(-$collectable->getPrice());

            $cataItem = $collectable->getCatalogueItem();
            user()->giveItem($cataItem->definition_id, $cataItem->item_specialspriteid);
            user()->refreshHand();

            return view('habblet.ajax.collectibles_success')->with([
                'collectable'   => $collectable
            ]);
        } else {
            return view('habblet.ajax.collectibles_success')->with([
                'collectable'   => $collectable,
                'error' => true
            ]);
        }
    }

    public function redeemVoucher(Request $request)
    {
        if (!Auth::check())
            return;

        $voucher = Voucher::where('voucher_code', $request->code)->first();

        if (!$voucher)
            return view('habblet.ajax.redeem_voucher')->with(['status' => 'Error', 'message' => 'This vouches is invalid']);

        if (Carbon::now() >= $voucher->expiry_date)
            return view('habblet.ajax.redeem_voucher')->with(['status' => 'Error', 'message' => 'This voucher is expired']);

        user()->updateCredits($voucher->credits);

        $itemsRedeemed = [];
        foreach ($voucher->getItems() as $item) {
            $cataItem = CatalogueItem::where('sale_code', $item->catalogue_sale_code)->first();
            user()->giveItem($cataItem->definition_id);
            if (isset($itemsRedeemed[$item->catalogue_sale_code])) {
                $itemsRedeemed[$item->catalogue_sale_code] += 1;
            } else {
                $itemsRedeemed[$item->catalogue_sale_code] = 1;
            }
        }

        user()->refreshHand();

        $itemsRedeemedString = "";
        foreach ($itemsRedeemed as $key => $value) {
            $itemsRedeemedString .= "{$value},{$key}|";
        }

        $itemsRedeemedString = rtrim($itemsRedeemedString, '|');

        $history = VoucherHistory::create([
            'voucher_code'      => $request->code,
            'user_id'           => user()->id,
            'used_at'           => Carbon::now(),
            'credits_redeemed'  => $voucher->credits,
            'items_redeemed'    => $itemsRedeemedString
        ]);

        if ($voucher->is_single_use > 0) {
            $voucher->deleteItems();
            Voucher::where('voucher_code', $request->code)->delete();
        }

        return view('habblet.ajax.redeem_voucher')->with(['status' => 'Success', 'message' => 'You redeemed a valid voucher!', 'history' => $history]);
    }

    public function purchaseConfirmation(Request $request)
    {
        if (!Auth::check())
            return view('credits.ajax.purchase_result')->with(['message' => 'In order to purchase a starter pack you need to log in first.', 'status' => 'error']);

        $pack = ItemOffer::where([['salecode', '=', $request->product], ['enabled', '=', '1']])->first();

        if (!$pack)
            return view('credits.ajax.purchase_result')->with(['message' => 'Invalid starter pack.', 'status' => 'error']);

        if (!$pack->price > user()->credits)
            return view('credits.ajax.purchase_result')->with(['message' => 'You don\'t have enough credits to purchase this pack.', 'status' => 'error']);

        return view('credits.ajax.purchase_confirm')->with('pack', $pack);
    }

    public function purchase(Request $request)
    {
        if (!Auth::check())
            return view('credits.ajax.purchase_result')->with(['message' => 'In order to purchase a starter pack you need to log in first.', 'status' => 'error']);

        $pack = ItemOffer::where([['salecode', '=', $request->product], ['enabled', '=', '1']])->first();

        if (!$pack)
            return view('credits.ajax.purchase_result')->with(['message' => 'Invalid starter pack.', 'status' => 'error']);

        if (!$pack->price > user()->credits)
            return view('credits.ajax.purchase_result')->with(['message' => 'You don\'t have enough credits to purchase this pack.', 'status' => 'error']);


        if (!$pack->isValid())
            return view('credits.ajax.purchase_result')->with(['message' => "Unable to purchase this pack.", 'status' => 'error']);

        $items = $pack->getItems();
        foreach ($items as $item) {
            user()->giveItem($item->definition_id, $item->item_specialspriteid);
        }
        user()->updateCredits(-$pack->price);
        user()->refreshHand();

        return view('credits.ajax.purchase_result')->with(['message' => 'Purchase successful! Your items are on their way!']);
    }
}
