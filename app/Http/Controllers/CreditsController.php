<?php

namespace App\Http\Controllers;

use App\Models\Catalogue\Item;
use App\Models\Furni\Collectable;
use App\Models\Neptune\ItemOffer;
use App\Models\Voucher;
use App\Models\Voucher\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditsController extends Controller
{
    public function transactions()
    {
        if (!Auth::check())
            return redirect()->route('credits.index');

        return view('credits.transactions')->with(['transactions' => UserTransaction::where('user_id', Auth::user()->id)->orderBy('timestamp', 'DESC')->take(100)->get()]);
    }

    public function collectibles()
    {
        $tick = emu_config('rare.cycle.tick.time');
        $interval = emu_config('rare.cycle.refresh.interval');

        $tick     = $tick > 0 ? $tick : 0;
        $interval = $interval > 0 ? $interval : 1;

        $collectable = Collectable::with('item')->orderByDesc('reuse_time')->first();
        $time = ($interval * 86400) - $tick;

        return view('credits.collectibles', [
            'collectable' => $collectable,
            'time'        => $time,
        ]);
    }

    public function habbletAjaxCollectiblesConfirm()
    {
        $collectable = Collectable::with('item')
            ->latest('reuse_time')
            ->firstOrFail();

        return view('habblet.ajax.collectibles_confirm', compact('collectable'));
    }

    public function habbletAjaxCollectiblesPurchase()
    {
        $user = user();

        if (!$user) {
            return view('credits.ajax.purchase_login');
        }

        $collectable = Collectable::with('item')
            ->latest('reuse_time')
            ->firstOrFail();

        $price = $collectable->getPrice();

        if ($user->credits < $price) {
            return view('habblet.ajax.collectibles_success', [
                'collectable' => $collectable,
                'error'       => true
            ]);
        }

        $item = $collectable->item;
        $user->giveItem($item->definition_id, $item->item_specialspriteid);
        $user->refreshHand();

        $user->updateCredits(-$price);

        return view('habblet.ajax.collectibles_success', [
            'collectable' => $collectable
        ]);
    }

    public function redeemVoucher(Request $request)
    {
        $user = user();

        if (!$user) {
            return;
        }

        $user = user();
        $code = $request->code;

        $voucher = Voucher::where('voucher_code', $code)->first();

        if (!$voucher) {
            return view('habblet.ajax.redeem_voucher', [
                'status'  => 'Error',
                'message' => 'This voucher is invalid',
            ]);
        }

        if (now()->greaterThanOrEqualTo($voucher->expiry_date)) {
            return view('habblet.ajax.redeem_voucher', [
                'status'  => 'Error',
                'message' => 'This voucher is expired',
            ]);
        }

        $user->updateCredits($voucher->credits);

        $itemsRedeemed = [];

        foreach ($voucher->getItems() as $item) {
            $cataItem = Item::where('sale_code', $item->catalogue_sale_code)->first();
            if ($cataItem) {
                for ($i = 0; $i < $item->amount; $i++) {
                    $user->giveItem($cataItem->definition_id);
                }
                $itemsRedeemed[$item->catalogue_sale_code] = $item->amount;
            }
        }

        $user->refreshHand();

        $itemsString = collect($itemsRedeemed)
            ->map(fn($count, $code) => "{$count},{$code}")
            ->implode('|');


        $history = History::create([
            'voucher_code'      => $code,
            'user_id'           => $user->id,
            'used_at'           => now(),
            'credits_redeemed'  => $voucher->credits,
            'items_redeemed'    => $itemsString
        ]);

        if ($voucher->is_single_use > 0) {
            $voucher->deleteItems();
            $voucher->delete();
        }

        return view('habblet.ajax.redeem_voucher', [
            'status'  => 'Success',
            'message' => 'You redeemed a valid voucher!',
            'history' => $history
        ]);
    }

    public function purchaseConfirmation(Request $request)
    {
        if (!Auth::check()) {
            return view('credits.ajax.purchase_login');
        }

        $pack = ItemOffer::query()
            ->where('salecode', $request->product)
            ->where('enabled', '1')
            ->first();

        if (!$pack) {
            return $this->purchaseResult('Invalid starter pack.', 'error');
        }

        if ($pack->price > user()->credits) {
            return $this->purchaseResult('You don\'t have enough credits to purchase this pack.', 'error');
        }

        return view('credits.ajax.purchase_confirm', compact('pack'));
    }

    public function purchase(Request $request)
    {
        $user = user();

        if (!$user) {
            return view('credits.ajax.purchase_login');
        }

        $pack = ItemOffer::where([
            ['salecode', '=', $request->product],
            ['enabled', '=', '1']
        ])->first();

        if (!$pack)
            return $this->purchaseResult('Invalid starter pack.', 'error');

        if ($pack->price > user()->credits)
            return $this->purchaseResult('You don\'t have enough credits to purchase this pack.', 'error');


        if (!$pack->isValid())
            return $this->purchaseResult("Unable to purchase this pack.", 'error');

        $items = $pack->getItems();
        foreach ($items as $item) {
            user()->giveItem($item->definition_id, $item->item_specialspriteid);
        }

        $homeItems = $pack->getHomeItems();
        foreach ($homeItems as $homeItem) {
            user()->giveHomeItem($homeItem->id);
        }
        user()->updateCredits(-$pack->price);
        user()->refreshHand();

        return $this->purchaseResult('Purchase successful! Your items are on their way!', 'success');
    }

    protected function purchaseResult(string $message, string $status)
    {
        return view('credits.ajax.purchase_result', compact('message', 'status'));
    }
}
